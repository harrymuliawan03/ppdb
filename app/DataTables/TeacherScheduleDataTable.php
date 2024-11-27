<?php

namespace App\DataTables;

use App\Models\TeacherSchedule;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TeacherScheduleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'teacher_schedules.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TeacherSchedule $model)
    {
        return $model->newQuery()->with('school_class')->with('subject')->with('teacher');
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
            'teacher.name' => ['name' => 'teacher.name', 'title' => "Nama Guru", 'data' => 'teacher.name'],
            'teacher.nip' => ['nip' => 'teacher.nip', 'title' => "NIP", 'data' => 'teacher.nip'],
            'Hari' => ['name' => 'day_of_week', 'title' => "Hari", 'data' => 'day_of_week'],
            'Jam Mulai' => ['name' => 'start_time', 'title' => "Jam Mulai", 'data' => 'start_time'],
            'Jam Berakhir' => ['name' => 'end_time', 'title' => "Jam Berakhir", 'data' => 'end_time'],
            'subject.name' => ['name' => 'subject.name', 'title' => "Mata Pelajaran", 'data' => 'subject.name'],
            'school_class.nama_kelas' => ['name' => 'school_class.nama_kelas', 'title' => "Kelas", 'data' => 'school_class.nama_kelas'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'teacher_schedulesdatatable_' . time();
    }
}