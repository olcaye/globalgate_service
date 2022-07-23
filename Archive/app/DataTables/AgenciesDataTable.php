<?php

namespace App\DataTables;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Services\DataTable;

class AgenciesDataTable extends DataTable
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
            ->addColumn('action', 'agency.datatable.agency_action');
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return Builder|\Illuminate\Database\Query\Builder|Collection
     */
    public function query()
    {
        $submission = Agency::query()->orderBy('created_at','desc');
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
            ->setTableId('agency-table')
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
                'title' => 'Agency Name',
                'className' => 'col-md-4',
                'orderable' => true,
            ],
            [
                'data' => 'phone',
                'title' => 'Phone Number',
                'className' => 'col-md-3'
            ],
            [
                'data' => 'email',
                'title' => 'Email',
                'className' => 'col-md-3'
            ],
            [
                'data' => 'action',
                'title' => 'Action',
                'orderable' => false,
                'searchable' => false,
                'className' => 'col-md-2'

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
        return 'agencies_' . time();
    }
}

