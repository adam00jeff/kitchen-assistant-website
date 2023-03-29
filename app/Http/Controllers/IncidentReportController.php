<?php

namespace App\Http\Controllers;

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
        return view('compliance');
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
     * @param  \App\Models\IncidentReport  $incidentReport
     * @return \Illuminate\Http\Response
     */
    public function show(IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncidentReport  $incidentReport
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncidentReportRequest  $request
     * @param  \App\Models\IncidentReport  $incidentReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncidentReportRequest $request, IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidentReport  $incidentReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidentReport $incidentReport)
    {
        //
    }
}
