<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
    * Build DataTable class.
    *
    * @param mixed $query Results from query() method.
    * @return \Yajra\DataTables\DataTableAbstract
    */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query->where('role', 'USER'))
        ->addIndexColumn()
        ->editColumn('status', function ($user) {
            if($user->status == 'registered') return '<span class="badge badge-primary">Registered</span>';
            else if($user->status == 'unconfirmed') return '<span class="badge badge-danger">Unconfirmed</span>';
            else if($user->status == 'confirmed') return '<span class="badge badge-success">Confirmed</span>';
        })
        ->addColumn('action', function ($user) {
            return view('admin.user.action', compact('user'))->render();
        })
        ->rawColumns(['status', 'action']);
    }

    /**
    * Get query source of dataTable.
    *
    * @param \App\User $model
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
    * Optional method if you want to use html builder.
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()
        ->setTableId('users-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(1)
        ->buttons(
            // Button::make('create'),
            Button::make('export'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
        );
    }

    /**
    * Get columns.
    *
    * @return array
    */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')
            ->title('No'),
            Column::make('created_at')
            ->title('Registered at'),
            Column::make('id')
            ->visible(false),
            Column::make('name'),
            Column::make('phone'),
            Column::make('email')
            ->visible(false),
            Column::make('sex')
            ->visible(false),
            Column::make('nationality')
            ->visible(false),
            Column::make('id_type')
            ->visible(false),
            Column::make('id_number')
            ->visible(false),
            Column::make('date_of_birth')
            ->visible(false),
            Column::make('community_name')
            ->visible(false),
            Column::make('community_type')
            ->visible(false),
            Column::make('forum')
            ->visible(false),
            Column::make('reunion')
            ->visible(false),
            Column::make('run')
            ->visible(false),
            Column::make('status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(80)
            ->addClass('text-center'),
        ];
    }

    /**
    * Get filename for export.
    *
    * @return string
    */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
