<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\IncidentReport;
use App\Http\Requests\StoreIncidentReportRequest;
use App\Http\Requests\UpdateIncidentReportRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IncidentReportController extends Controller
{
    public function incident_reports()
    {
        $busid = Auth::user()->business_id;
        $incidentreports = IncidentReport::all()->where('business_id',$busid);
        return view('compliance',['incidentreports'=>$incidentreports]);
    }
    public function create_incidentreport()
    {
        return view('incidentreport-form');
    }
    public function store_incidentreport(Request $request)
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $busid = Auth::user()->business_id;
        $incidentreport = new IncidentReport();
        $incidentreport->date_of_report = Carbon::today();
        $incidentreport->date_of_incident = $request->report_date;
        $incidentreport->time_of_incident = $request->report_time;
        $incidentreport->incident_type = $request->incident_type;
        $incidentreport->severity= $request->severity;
        $incidentreport->location=$request->incident_location;
        $incidentreport->description=$request->incident_description;
        $incidentreport->action_taken=$request->action_taken;
        $incidentreport->reported_by= $name;
        $incidentreport->user_id = $id;
        $incidentreport->business_id = $busid;
        $incidentreport->save();
        /*        $contacts = DB::table('contacts')->where('business_id', $id)->latest('created_at')->first();*/
        return view('compliance');
    }
    /**
     * Display the specified resource.
     *
     * @param IncidentReport $incidentReport
     * @return Response
     */
    public function show(IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param IncidentReport $incidentReport
     * @return Response
     */
    public function edit(IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateIncidentReportRequest $request
     * @param IncidentReport $incidentReport
     * @return Response
     */
    public function update(UpdateIncidentReportRequest $request, IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param IncidentReport $incidentReport
     * @return Response
     */
    public function destroy_incidentreport(incidentreport $incidentreport)
    {
        $incidentreport->delete();
        $busid = Auth::user()->business_id;
        $incidentreports = IncidentReport::all()->where('business_id',$busid);
        return view('compliance',['incidentreports'=>$incidentreports]);
    }
    public function recent_incidents()
    {
        $overduedocuments = $this->get_overdue();
        $upcomingdocuments = $this->get_upcoming();
        $recent = $this->get_recentincidents();
        return view('welcome',['incidentreports'=>$recent,'upcomingdocuments'=>$upcomingdocuments,'overduedocuments'=>$overduedocuments]);
    }
    function get_recentincidents(){
        $recent = Carbon::today()->subWeeks(2);
        $id = Auth::user()->business_id;
        $recentincidents = IncidentReport::all()
            ->where('business_id',$id)
            ->where('date_of_incident','>=',$recent);
        return $recentincidents;
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
