<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
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
    public function documents_index()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        return view('documents',['documents'=>$documents]);
    }
    public function overdue_documents()
    {
        $startDate = Carbon::today();
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id)->where('renewal_date','<=',$startDate);

        return view('welcome',['documents'=>$documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create_document()
    {
        return view('document-form');
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

    /*            $document->name = time() . '_' . $request->file->getClientOriginalName();*/
            $document->name= $fileName;
            $document->display_name=$request->name;
            $document->file_location = '/storage/' . $filePath;
            $document->type = $request->type;
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
}
