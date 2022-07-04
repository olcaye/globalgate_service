<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(SubmissionsDataTable $dataTable) {
        return $dataTable->render('admin.pages.index');
    }

    public function show($id) {
        return view('admin.pages.show', ['submission' => Submission::where('id', '=', $id)->first()]);
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
