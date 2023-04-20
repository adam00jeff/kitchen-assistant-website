<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateIncidentReportRequest;
use App\Models\Allergen;
use App\Models\Document;
use App\Models\IncidentReport;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class IncidentReportController extends Controller
{
    /**
     * gets incident reports from db
     * @return Factory|View|Application
     */
    public function incident_reports(): Factory|View|Application
    {
        $busid = Auth::user()->business_id;
        $incidentreports = IncidentReport::all()->where('business_id', $busid);
        return view('compliance', ['incidentreports' => $incidentreports]);
    }

    /**
     * returns view to creat report
     * @return Application|Factory|View
     */
    public function create_incidentreport(): View|Factory|Application
    {
        return view('incidentreport-form');
    }

    /**
     * Adds a new incident report to storage
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store_incidentreport(Request $request): View|Factory|Application
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $busid = Auth::user()->business_id;
        $incidentreport = new IncidentReport();
        $incidentreport->date_of_report = Carbon::today();
        $incidentreport->date_of_incident = $request->report_date;
        $incidentreport->time_of_incident = $request->report_time;
        $incidentreport->incident_type = $request->incident_type;
        $incidentreport->severity = $request->severity;
        $incidentreport->location = $request->incident_location;
        $incidentreport->description = $request->incident_description;
        $incidentreport->action_taken = $request->action_taken;
        $incidentreport->reported_by = $name;
        $incidentreport->user_id = $id;
        $incidentreport->business_id = $busid;
        $incidentreport->save();
        return view('compliance');
    }

    /**
     * delete an incident report
     * @param IncidentReport $incidentreport
     * @return Application|Factory|View
     */
    public function destroy_incidentreport(incidentreport $incidentreport): View|Factory|Application
    {
        $incidentreport->delete();
        $busid = Auth::user()->business_id;
        $incidentreports = IncidentReport::all()->where('business_id', $busid);
        return view('compliance', ['incidentreports' => $incidentreports]);
    }

    /**
     * get recent incidents from db
     * @return Application|Factory|View
     */
    public function recent_incidents(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $stocks = Stock::all()->where('business_id', $id);
        $recipes = $recipes = Recipe::all()->where('business_id', $id);
        $suppliers = Supplier::all();
        $overduedocuments = $this->get_overdue();
        $upcomingdocuments = $this->get_upcoming();
        $recent = $this->get_recentincidents();
        return view('welcome', ['recipes'=>$recipes,'suppliers'=>$suppliers,'stocks'=>$stocks,'allergens'=>$allergens,'incidentreports' => $recent, 'upcomingdocuments' => $upcomingdocuments, 'overduedocuments' => $overduedocuments]);
    }

    /**
     * method to find recent incidents
     * @return Collection
     */
    function get_recentincidents()
    {
        $recent = Carbon::today()->subWeeks(2);
        $id = Auth::user()->business_id;
        $recentincidents = IncidentReport::all()
            ->where('business_id', $id)
            ->where('date_of_incident', '>=', $recent);
        return $recentincidents;
    }

    /**
     * method to get upcoming documents
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
     * method to get overdue documents
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
}
