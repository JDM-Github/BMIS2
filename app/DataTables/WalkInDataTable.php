<?php

namespace App\DataTables;

use App\Models\House;
use App\Models\User;
use App\Models\WalkIn;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WalkInDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('full_name', fn(WalkIn $walkIn) => $walkIn->full_name)
            ->addColumn('contact_number', fn(WalkIn $walkIn) => $walkIn->contact_number)
            ->addColumn('document_type', fn(WalkIn $walkIn) => $walkIn->document_type)
            ->addColumn('purpose_of_request', fn(WalkIn $walkIn) => $walkIn->purpose_of_request)
            ->addColumn('created_at', fn(WalkIn $walkIn) => $walkIn->created_at->format('Y-m-d H:i:s'))
            ->addColumn('action', fn(WalkIn $walkIn) => view('walkin.components.action', compact('walkIn')))
            ->rawColumns(['action']);
        // ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @param WalkIn $model
     * @return QueryBuilder
     */
    public function query(WalkIn $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (request('archivedStatus') != 2)
            $query->where('isArchived', request('archivedStatus'));
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('walk_in_table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                // Button::make('create')->action('window.location.href="' . route('walk_in.create') . '";'),
                // Button::make('export'),
                // Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->hidden(),
            Column::make('full_name')->title('Full Name'),
            Column::make('contact_number')->title('Contact Number'),
            Column::make('document_type')->title('Document Type'),
            Column::make('purpose_of_request')->title('Purpose of Request'),
            Column::make('created_at')->title('Date & Time'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'WalkIns_' . date('YmdHis');
    }
}
