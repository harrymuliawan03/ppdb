<?php

namespace App\DataTables;

use App\Models\SchoolClass;
use App\Models\Student;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ShowClassDataTable extends DataTable
{
    private $idSchoolClass = 0;


    public function setIdSchoolClass(int $id) {
        $this->idSchoolClass = $id;
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

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        return $model->newQuery()->with(['school_class.jurusan', 'school_class.teacher'])->where('school_class_id', $this->idSchoolClass);
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
            // ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    'export',
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
            'school_class.nama_kelas' => ['name' => 'school_class_id', 'title' => 'Kelas', 'data' => 'school_class.nama_kelas'],
            'name' => ['name' => 'name', 'title' => 'Nama Murid','data' => 'name'],
            'school_class.jurusan.nama_jurusan'=> ['name' => 'school_class.jurusan.nama_jurusan', 'title' => 'Jurusan', 'data' => 'school_class.jurusan.nama_jurusan'],
            'school_class.teacher.name'=> ['name' => 'school_class.teacher.name', 'title' => 'Wali Kelas', 'data' => 'school_class.teacher.name'],
            'school_class.tahun_ajaran'=> ['name' => 'school_class_id', 'title' => 'Tahun Ajaran', 'data' => 'school_class.tahun_ajaran'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'school_classesdatatable_' . time();
    }
}