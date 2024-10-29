<?php

namespace App\DataTables;

use App\Models\StudentGrade;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StudentGradeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'student_grades.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StudentGrade $model)
    {
        $user = Auth::user();
        $query = $model->newQuery()->with('student')->with('subject')->with('teacher');
        if ($user->hasRole('teacher')) {
            $query->where('teacher_id', $user->id);
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
            'student.nisn' => ['name' => 'student.nisn', 'title' => 'NISN Siswa', 'data' => 'student.nisn'],
            'student.name' => ['name' => 'student.name', 'title' => 'Nama Siswa', 'data' => 'student.name'],
            'subject.code' => ['name' => 'subject.code', 'title' => 'Kode Mata Pelajaran', 'data' => 'subject.code'],
            'subject.name' => ['name' => 'subject.name', 'title' => 'Mata Pelajaran', 'data' => 'subject.name'],
            'teacher.nip' => ['name' => 'teacher.nip', 'title' => 'NIP Guru', 'data' => 'teacher.nip'],
            'teacher.name' => ['name' => 'teacher.name', 'title' => 'Guru', 'data' => 'teacher.name'],
            'nilai',
            'semester',
            'school_year'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'student_gradesdatatable_' . time();
    }
}