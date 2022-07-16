<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(SubmissionsDataTable $dataTable, Request $request) {
        return $dataTable->with('agency_id', $request->query('agency'))->render('admin.pages.index');
    }

    public function show($id) {
        $submission = Submission::with('agency')->firstWhere('id', $id);
        $agency = $submission->agency;
        return view('admin.pages.show', ['submission' => $submission, 'agency' => $agency]);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $status = $request->input('status');
        $affected = Submission::where('id', $id)->limit(1)->update([ 'status' => $status]);
            /*$agent = Agent::find($id);*/
            /*Mail::to($agent->email)->send(new AccountApproved($agent));*/
        if($affected > 0) {
            $request->session()->flash('message', 'The process is successful!');
            return response()->json(['data' => 'success', 'affected' => $affected]);
        }
        $request->session()->flash('message', 'The process is failed.');
        return response()->json(['data' => 'failed']);
    }
}
