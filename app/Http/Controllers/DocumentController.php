<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Allergen;
use App\Models\Document;
use App\Models\IncidentReport;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
    /**
     * Display a listing of documents for the welcome view
     *
     * @return Application|Factory|View
     */
    public function welcome(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id', $id);
        $allergens = Allergen::all();
        $stocks = Stock::all()->where('business_id', $id);
        $suppliers = Supplier::all();
        $recipes = $recipes = Recipe::all()->where('business_id', $id);
        $upcomingdocuments = $this->get_upcoming();
        $overduedocuments = $this->get_overdue();
        $recentincidents = $this->get_recentincidents();
        $incidentreports = IncidentReport::all()->where('business_id', $id);
        return view('welcome', ['recipes'=>$recipes,'suppliers'=>$suppliers,'stocks'=>$stocks,'allergens'=>$allergens,'incidentreports' => $incidentreports, 'documents' => $documents, 'overduedocuments' => $overduedocuments, 'upcomingdocuments' => $upcomingdocuments, 'incidentreports' => $recentincidents]);
    }
    /**
     * Display a listing of documents for the documents view
     *
     * @return Application|Factory|View
     */
    public function documents_index(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id', $id);
        return view('documents', ['documents' => $documents]);
    }
    /**
     * Display a listing of documents for the overdue documents view
     *
     * @return Application|Factory|View
     */
    public function overdue_documents(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $stocks = Stock::all()->where('business_id', $id);
        $recipes = $recipes = Recipe::all()->where('business_id', $id);
        $suppliers = Supplier::all();
        $startDate = Carbon::today()->addWeeks(2);
        $overduedocuments = $this->get_overdue();
        $upcomingdocuments = $this->get_upcoming();
        $incidentreports = IncidentReport::all()->where('business_id', $id);
        return view('welcome', ['recipes'=>$recipes,'suppliers'=>$suppliers,'stocks'=>$stocks,'allergens'=>$allergens,'upcomingdocuments' => $upcomingdocuments, 'incidentreports' => $incidentreports, 'overduedocuments' => $overduedocuments]);
    }
    /**
     * Display a listing of documents for the upcomming documents view
     *
     * @return Application|Factory|View
     */
    public function upcoming_documents(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $stocks = Stock::all()->where('business_id', $id);
        $recipes = $recipes = Recipe::all()->where('business_id', $id);
        $suppliers = Supplier::all();
        $id = Auth::user()->business_id;
        $overduedocuments = $this->get_overdue();
        $upcomingdocuments = $this->get_upcoming();
        $incidentreports = IncidentReport::all()->where('business_id', $id);
        return view('welcome', ['recipes'=>$recipes,'suppliers'=>$suppliers,'stocks'=>$stocks,'allergens'=>$allergens,'upcomingdocuments' => $upcomingdocuments, 'incidentreports' => $incidentreports, 'overduedocuments' => $overduedocuments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create_document(): View|Factory|Application
    {
        $busid = Auth::user()->business_id;
        $users = User::where('business_id', '=', $busid)->pluck('name', 'id')->toArray();
        return view('document-form', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDocumentRequest $request
     * @return RedirectResponse|void
     */
    public function store_document(Request $request)
    {
//        this line can be used to restrict file types if required
        $request->validate([
            /*  'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'*/
        ]);
        $busid = Auth::user()->business_id;
        $id = Auth::id();
        $document = new Document;
        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $document->name = $fileName;
            $document->display_name = $request->name;
            $document->file_location = '/storage/' . $filePath;
            $intcheck = $request->type;
            if (is_numeric($intcheck)) {
                $doctype = User::all()->where('id', '=', $request->type)->pluck('name')->toArray();
                $doctype = implode("", $doctype);
                $document->type = "Training: " . $doctype;
            } else {
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
     * @return void
     */
    public function show(Document $document): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return Void
     */
    public function edit(Document $document): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDocumentRequest $request
     * @param Document $document
     * @return Void
     */
    public function update(UpdateDocumentRequest $request, Document $document): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return RedirectResponse
     */
    public function destroy_document(Document $document): RedirectResponse
    {
        $path = "/uploads/" . $document->name;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        } else {
            dd('File does not exist.');
        }
        $document->delete();
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id', $id);
        return back()
            ->with('success', $document->name . ' has been removed')
            ->with('documents', ['documents' => $documents]);
    }

    /**
     * method for getting documents with due dates <14 days
     * @return Collection
     */
    function get_upcoming(): Collection
    {
        $startDate = Carbon::today();
        $upcoming = Carbon::today()->addWeeks(2);
        $id = Auth::user()->business_id;
        $upcomingdocuments = Document::all()
            ->where('business_id', $id)
            ->where('renewal_date', '>=', $startDate)
            ->where('renewal_date', '<=', $upcoming);
        return $upcomingdocuments;
    }

    /**
     * method for getting documents over their due dates
     * @return Collection
     */
    function get_overdue(): Collection
    {
        $startDate = Carbon::today();
        $id = Auth::user()->business_id;
        $overduedocuments = Document::all()
            ->where('business_id', $id)
            ->where('renewal_date', '<=', $startDate);
        return $overduedocuments;
    }

    /**
     * method for getting incidents in the last 14 days
     * @return Collection
     */
    function get_recentincidents(): Collection
    {
        $recent = Carbon::today()->subWeeks(2);
        $id = Auth::user()->business_id;
        $recentincidents = IncidentReport::all()
            ->where('business_id', $id)
            ->where('date_of_incident', '>=', $recent);
        return $recentincidents;
    }
}
