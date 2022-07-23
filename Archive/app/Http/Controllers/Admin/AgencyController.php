<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AgenciesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Notifications\AgencyIsApproved;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class AgencyController extends Controller
{
    public function index(AgenciesDataTable $dataTable) {
        return $dataTable->render('admin.pages.agency.index');
    }

    public function show($id) {
        return view('admin.pages.agency.show', ['agency' => Agency::where('id', '=', $id)->first()]);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $status = $request->input('status');
        $affected = Agency::where('id', $id)->limit(1)->update(['is_verified' => $status,'verified_at' => Carbon::now()]);
        $user = Agency::where('id', $id)->first();
        Notification::send($user, new AgencyIsApproved($user));
        if($affected > 0) {
            $request->session()->flash('message', 'The process is successful!');
            return response()->json(['data' => 'success', 'affected' => $affected]);
        }
        $request->session()->flash('message', 'The process is failed.');
        return response()->json(['data' => 'failed']);
    }
}
