<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AgenciesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index(AgenciesDataTable $dataTable) {
        return $dataTable->render('admin.pages.agency.index');
    }

    public function show($id) {
        return view('admin.pages.agency.show', ['agency' => Agency::where('id', '=', $id)->first()]);
    }
}
