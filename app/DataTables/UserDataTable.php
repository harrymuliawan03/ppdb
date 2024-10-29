<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
{
    private $isTeacher = false;
    private $isStaffTU = false;


    public function setIsTeacher(bool $isTeacher) {
        $this->isTeacher = $isTeacher;
    }

    public function setIsStaffTU(bool $isStaffTU) {
        $this->isStaffTU = $isStaffTU;
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', $this->isTeacher ? 'teachers.datatables_actions' : ($this->isStaffTU ? 'staff_tus.datatables_actions' : 'users.datatables_actions'));
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $query = $model->newQuery();

        if ($this->isTeacher) {
            $query->whereHas('roles', function ($q) {
                $q->where('name', 'teacher');
            });
        }else if($this->isStaffTU){
            $query->whereHas('roles', function ($q) {
                $q->where('name', 'staff_tu');
            });
        }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    'export',
                    'reset',
                    'reload',
                ],
                'initComplete' => "function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var input = document.createElement(\"input\");
                        if($(column.header()).attr('title') !== 'Action'){
                            $(input).appendTo($(column.header()))
                            .on('keyup change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        }
                    });
                }",
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['name' => 'id', 'title' => 'ID', 'visible' => false],
            'name',
            'nip',
            'email',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'usersdatatable_' . time();
    }
}
