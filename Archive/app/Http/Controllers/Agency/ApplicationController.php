<?php

namespace App\Http\Controllers\Agency;

use App\DataTables\ApplicationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(ApplicationsDataTable $dataTable) {
        return $dataTable->render('agency.pages.applications');
    }

    public function showForm() {
        return view('agency.pages.application_form');
    }

    public function store(StorePackageRequest $request) {

        /*$package = new Submission($request->validated());
        $package->agency_code = $request->input('agency_code');
        $package->save();*/
        $package = Submission::create(array_merge($request->validated(), [
            'agency_id' => Auth::user()->id
        ]));

        if($package->wasRecentlyCreated == true) {
            return redirect()->back()->with(['message' => 'Successfully Created']);
        }
        return redirect()->back()->with(['message' => 'Something is wrong.']);
    }
}
