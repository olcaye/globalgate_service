<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    public function index() {
        return view('admin.pages.plans.index', ['plans' => Plan::where('is_active', 1)->orderBy('price')->get()]);
    }

    public function show($id) {
        return view('admin.pages.plans.show', ['plan' => Plan::where('id', '=', $id)->first()]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id) {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|max:100',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'credits' => 'required',
            'duration' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $plan = Plan::find($id);
        $plan->update($validator->validated());
        return back()->with('message', 'Successfully Updated.');

    }
}
