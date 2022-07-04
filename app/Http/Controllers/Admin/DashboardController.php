<?php

namespace App\Http\Controllers\admin;

use App\DataTables\SubmissionsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(SubmissionsDataTable $dataTable) {
        return $dataTable->render('admin.pages.index');
    }
}
