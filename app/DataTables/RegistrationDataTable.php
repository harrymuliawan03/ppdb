<?php

namespace App\DataTables;

use App\Models\Registration;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RegistrationDataTable extends DataTable
{
    private $diterima = false;


    public function setDiterima(bool $diterima) {
        $this->diterima = $diterima;
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

        if(!$this->diterima) {
            $dataTable = $dataTable->addColumn('action',  'registrations.datatables_actions');
        }
        
        return $dataTable
        ->editColumn('ijazah', function($registration) {
            return '<img src="' . asset('storage/' . $registration->ijazah) . '" style="width: 50px; height: 50px;" alt="Ijazah"/>';
        })
        ->editColumn('raport', function($registration) {
            return '<img src="' . asset('storage/' . $registration->raport) . '" style="width: 50px; height: 50px;" alt="Raport"/>';
        })
        ->editColumn('birth_certificate', function($registration) {
            return '<img src="' . asset('storage/' . $registration->birth_certificate) . '" style="width: 50px; height: 50px;" alt="Birth Certificate"/>';
        })
        ->editColumn('student_photo', function($registration) {
            return '<img src="' . asset('storage/' . $registration->student_photo) . '" style="width: 50px; height: 50px;" alt="Student Photo"/>';
        })
        ->editColumn('registration_date', function($registration) {
            // Format the birth_date field
            if($registration->registration_date) {
                return \Carbon\Carbon::parse($registration->registration_date)->format('Y-m-d');
            }
        })
        ->rawColumns(['major_id','prospective_student_id', 'action', 'ijazah', 'raport', 'birth_certificate', 'student_photo', 'registration_date']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Registration $model)
    {
        $query = $model->newQuery()->with('prospective_student')->with('major');

        if($this->diterima) {
            $query->where('status', 'success');
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
        $html = $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
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

            if(!$this->diterima) {
                $html ->addAction(['width' => '80px']);
            }

            return $html;
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
            'no_registration',
            'prospective_student.name' => ['name' => 'prospective_student_id', 'title' => $this->diterima ? 'Nama Siswa' : 'Nama Calon Siswa', 'data' => 'prospective_student.name'],
            'major.nama_jurusan' => ['name' => 'major_id', 'title' => 'Jurusan', 'data' => 'major.nama_jurusan'],
            'old_school',
            'average_ijazah',
            'average_raport',
            'ijazah',
            'raport',
            'birth_certificate',
            'student_photo',
            'registration_date',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'registrationsdatatable_' . time();
    }
}