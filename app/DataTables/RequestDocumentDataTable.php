<?php

namespace App\DataTables;

use App\Enums\UserTypeEnum;
use App\Models\Notification;
use App\Models\RequestDocument;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RequestDocumentDataTable extends DataTable
{
   

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function query(RequestDocument $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (auth()->user()->isAdmin()) {
            $query->where('status', '!=', 2)
                ->where('status', '!=', 3)
                ->with('user')
                ->select('request_documents.*');
        } else {
            $query->where('user_id', auth()->id());
        }
        if ($status = request('status')) {
            $query->where('status', $status);
        }
        if ($documentName = request('document_name2')) {
            $query->where('document_name', 'like', "%{$documentName}%");
        }
        if ($schedule = request('schedule')) {
            $query->where('schedule', 'like', "%{$schedule}%");
        }
        if ($validUntil = request('valid_until')) {
            $query->where('valid_until', 'like', "%{$validUntil}%");
        }

        return $query;
    }


    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', fn(RequestDocument $document) => view('document.components.action', compact('document')))
            ->editColumn('status', function (RequestDocument $requestDocument) {
                return match ($requestDocument->status) {
                    0 => 'Pending',
                    1 => 'Accepted',
                    2 => 'Rejected',
                    3 => 'Expired',
                };
            })
            ->editColumn('schedule', fn(RequestDocument $requestDocument) => $requestDocument->schedule ?? 'No Action Yet')
            ->editColumn('valid_until', fn(RequestDocument $requestDocument) => $requestDocument->valid_until ?? 'No Action Yet')
            ->rawColumns(['action']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('requestDocument_dataTable')
            ->columns($this->getColumns())
            // ->minifiedAjax([
            //     'data' => 'function(d) {
            //     d.status = $("#filter-status").val();
            //     d.document_name = $("#filter-document-name").val();
            // }'
            // ])
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
        $columns = [];

        if (auth()->user()->isAdmin()) {
            $columns[] = Column::make('user.name', 'user.name');
        }

        $columns[] = Column::make('document_name', 'document_name');
        $columns[] = Column::make('schedule');
        $columns[] = Column::make('valid_until', 'valid_until');
        $columns[] = Column::make('status');

        if (auth()->user()->isAdmin()) {
            $columns[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }

        return $columns;
    }


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RequestDocument_' . date('YmdHis');
    }
}
