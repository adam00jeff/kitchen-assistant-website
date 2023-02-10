<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function documents_index()
    {
        $id = Auth::id();
        $documents = Document::all()->where('user_id',$id);
        return view('documents',['documents'=>$documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_document()
    {
        return view('document-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store_document(StoreDocumentRequest $request)
    {
        $id = Auth::id();
        /*        $validated = $request->validate([
                    'name' => 'required|max:255',
                    'type' => 'required|max:255',//supplier ID for now, to be replaced with plain text entry
                    'file'=>'required|max:255',
                    'date'=>'required|max:255'
                ]);*/

        $document = new Document;
        $document->name = $request->name;
        $document->type = $request->type;
        $document->file_location= $request->file_location;
        $document->doc_date = $request->doc_date;
        $document->renewal_period = $request->renewal_period;
        $document->user_id = $id;
        $document->save();
        return response()->json(["msg" => "success"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
