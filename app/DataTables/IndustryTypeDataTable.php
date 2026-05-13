<?php

namespace App\DataTables;

use App\Models\IndustryType;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IndustryTypeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<IndustryType> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('name', function ($type) {
                return '<div class="d-flex align-items-center">
                            <div class="avatar avatar-xs me-2">
                                <span class="avatar-initial rounded-circle bg-label-primary"><i class="bi bi-briefcase"></i></span>
                            </div>
                            <span class="fw-semibold">' . e($type->name) . '</span>
                        </div>';
            })
            ->editColumn('created_at', function ($type) {
                return '<span class="text-muted"><i class="bi bi-calendar3 me-1"></i> ' . $type->created_at->format('M d, Y') . '</span>';
            })
            ->addColumn('action', function ($type) {
                $editBtn = '';
                if (auth()->user()->can('edit industry-types')) {
                    $editBtn = '<a class="dropdown-item" href="javascript:void(0);" onclick=\'editIndustryType(' . $type->toJson() . ')\'>
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>';
                }

                $deleteBtn = '';
                if (auth()->user()->can('delete industry-types')) {
                    $deleteBtn = '<div class="dropdown-divider"></div>
                                <form action="' . route('industry-types.destroy', $type->id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this industry type?\')">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>';
                }

                return '<div class="d-inline-block text-center w-100">
                            <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                ' . $editBtn . '
                                ' . $deleteBtn . '
                            </div>
                        </div>';
            })
            ->setRowId('id')
            ->rawColumns(['name', 'created_at', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<IndustryType>
     */
    public function query(IndustryType $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('industrytype-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->dom('<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>')
                    ->language([
                        'paginate' => [
                            'next' => '<i class="bi bi-chevron-right"></i>',
                            'previous' => '<i class="bi bi-chevron-left"></i>'
                        ]
                    ])
                    ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')->title('Industry Type Name'),
            Column::make('created_at')->title('Date Created'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'IndustryType_' . date('YmdHis');
    }
}
