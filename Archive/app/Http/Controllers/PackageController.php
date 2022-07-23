<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Mail\FormSubmitted;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    public function store(StorePackageRequest $request) {
        $package = Submission::create($request->validated());
        if($package->wasRecentlyCreated == true) {
            $package->sendNotificationEmail();
            return redirect()->back()->with(['success' => 'Successfully Created']);
        }
        return redirect()->back()->with(['message' => 'Something is wrong.']);
    }

}
