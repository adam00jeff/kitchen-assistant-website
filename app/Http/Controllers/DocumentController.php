<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function welcome()
    {
        $startDate = Carbon::today();
        $upcoming = Carbon::today()->addWeeks(2);
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $upcomingdocuments = $this->get_upcoming();
        $overduedocuments = $this->get_overdue();
        return view('welcome',['documents'=>$documents, 'overduedocuments'=>$overduedocuments, 'upcomingdocuments'=>$upcomingdocuments]);
    }
    public function documents_index()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        return view('documents',['documents'=>$documents]);
    }
    public function overdue_documents()
    {
        $startDate = Carbon::today()->addWeeks(2);
        $id = Auth::user()->business_id;
        $overduedocuments = $this->get_overdue();
        $upcomingdocuments = $this->get_upcoming();
        return view('welcome',['upcomingdocuments'=>$upcomingdocuments,'overduedocuments'=>$overduedocuments]);
    }
    public function upcoming_documents()
    {
        $overduedocuments = $this->get_overdue();
        $upcomingdocuments = $this->get_upcoming();
        return view('welcome',['upcomingdocuments'=>$upcomingdocuments,'overduedocuments'=>$overduedocuments]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create_document()
    {
        $busid = Auth::user()->business_id;
        $users = User::where('business_id','=',$busid)->pluck('name','id')->toArray();
        return view('document-form',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDocumentRequest $request
     * @return Response
     */
    public function store_document(Request $request)
    {
        $request->validate([
          /*  'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'*/
        ]);
        $busid = Auth::user()->business_id;
        $id = Auth::id();
        $document = new Document;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $document->name= $fileName;
            $document->display_name=$request->name;
            $document->file_location = '/storage/' . $filePath;
            $intcheck = $request->type;
            if (is_numeric($intcheck)){
                $doctype = User::all()->where('id','=',$request->type)->pluck('name')->toArray();
                $doctype = implode("",$doctype);
                $document->type = "Training: ".$doctype;
            }else{
                $document->type = $request->type;
            }
            $document->doc_date = $request->doc_date;
            $document->renewal_date = $request->renewal_date;
            $document->user_id = $id;
            $document->business_id = $busid;
            $document->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDocumentRequest $request
     * @param Document $document
     * @return Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return Response
     */
    public function destroy_document(Document $document)
    {
        $path = "/uploads/".$document->name;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        } else {
            dd('File does not exist.');
        }
        $document->delete();
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        return back()
        ->with('success', $document->name.' has been removed')
            ->with('documents',['documents'=>$documents]);
    }
    function get_upcoming(){
        $startDate = Carbon::today();
        $upcoming = Carbon::today()->addWeeks(2);
        $id = Auth::user()->business_id;
        $upcomingdocuments = Document::all()
            ->where('business_id',$id)
            ->where('renewal_date','>=',$startDate)
            ->where('renewal_date','<=',$upcoming);
        return $upcomingdocuments;
    }
    function get_overdue(){
        $startDate = Carbon::today();
        $id = Auth::user()->business_id;
        $overduedocuments = Document::all()
        ->where('business_id',$id)
        ->where('renewal_date','<=',$startDate);
        return $overduedocuments;
}
}
