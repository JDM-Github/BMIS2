<?php

namespace App\DataTables;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HouseDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('user.name', fn(House $house) => $house->user->name . ' ' . $house->user->middle_name . ' ' . $house->user->last_name)
            ->addColumn('action', fn(House $house) => view('house.components.action', compact('house')))
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(House $model): QueryBuilder
    {
        return $model->newQuery()
            ->whereHas('user', function ($query) {
                $query->where('status', true);
            })
            ->select('houses.*');
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('house_dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('user.name'),
            Column::make('address'),
            Column::make('barangay'),
            Column::make('municipality'),
            Column::make('province'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'House_' . date('YmdHis');
    }
}
