<?php

namespace App\DataTables;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Services\DataTable;

class ApplicationsDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', 'agency.datatable.submission_action');
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return Builder|\Illuminate\Database\Query\Builder|Collection
     */
    public function query()
    {
        $submission = Submission::query()->where('agency_id', Auth::user()->id)->orderBy('created_at','desc');
        return $this->applyScopes($submission);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('applications-table')
            ->addTableClass('table-hover')
            ->columns($this->getColumns())
            ->ajax()
            ->parameters($this->getBuilderParameters());
    }

    protected function columnDef(): array {
        return [
            [
                'targets' => '_all',
                'className' => 'align-middle',
            ],

        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => 'name',
                'title' => 'Name',
                'className' => 'col-md-2',
                'orderable' => true,
            ],
            [
                'data' => 'surname',
                'title' => 'Surname',
                'className' => 'col-md-2'
            ],
            [
                'data' => 'package',
                'title' => 'Package',
                'className' => 'col-md-3'
            ],
            [
                'data' => 'status',
                'title' => 'Status',
                'className' => 'col-md-2'
            ],
            [
                'data' => 'created_at',
                'title' => 'Created At',
                'className' => 'col-md-1'
            ],
            [
                'data' => 'action',
                'title' => 'Action',
                'orderable' => false,
                'searchable' => false,
                'className' => 'col-md-1'

            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'applications_' . time();
    }
}

