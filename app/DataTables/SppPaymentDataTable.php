<?php

namespace App\DataTables;

use App\Models\SppPayment;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SppPaymentDataTable extends DataTable
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

        return $dataTable
        ->addColumn('payment_month', function($row) {
            // Format the payment_month field to display the month name in Indonesian
            return \Carbon\Carbon::parse($row->payment_month)
                   ->locale('id') // Set the locale to Indonesian
                   ->translatedFormat('F'); // Format the month as the full name
        })     
        ->addColumn('payment_year', function($row) {
            // Format the payment_month field to display only the year
            return \Carbon\Carbon::parse($row->payment_month)
                   ->format('Y'); // Format to display the year only
        })
        ->addColumn('payment_date', function($row) {
            if($row->payment_date) {
                return \Carbon\Carbon::parse($row->payment_date)->format('Y-m-d');
            }
        })
        ->addColumn('action', 'spp_payments.datatables_actions')
        ->rawColumns(['payment_month', 'payment_year', 'payment_date', 'action']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SppPayment $model)
    {
        return $model->newQuery()->with('student');
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
            'student.nisn' => ['name' => 'student.nisn', 'title' => 'NISN', 'data' => 'student.nisn'],
            'student.name' => ['name' => 'student.name', 'title' => 'Nama Siswa', 'data' => 'student.name'],
            'amount',
            'status',
            'payment_month',
            'payment_year',
            'payment_date'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename():string
    {
        return 'spp_paymentsdatatable_' . time();
    }
}