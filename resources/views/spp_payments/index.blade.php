@extends('layouts.app')

@section('contents')
    <div class="content content-components">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Spp Payments</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @include('flash::message')

            <h4 class="mg-b-10">Spp Payments</h4>

            <p class="mg-b-30">
                This is a list of your <code>Spp Payments</code>, you can manage by clicking on action buttons in this
                table.
            </p>

            <div class="d-sm-flex align-items-center justify-content-end mg-b-20 mg-lg-b-25 mg-xl-b-30" style="gap: 10px">
                <div class="d-none d-md-block">
                    @can('sppPayment-create')
                        <a class="btn btn-sm btn-primary btn-uppercase" href="{!! route('sppPayments.create') !!}"><i
                                class="fa fa-plus"></i> Add New</a>
                    @endcan
                </div>
                <div class="d-none d-md-block">
                    @can('sppPayment-create')
                        <button class="btn btn-sm btn-success btn-uppercase"
                            onclick="if (confirm('Generate SPP dilakukan 1 bulan sekali setiap tanggal 1, tetapi gunakan button generate SPP hanya jika diperlukan')) { window.location.href = '{{ route('sppPayments.generate') }}'; }">
                            <i class="fa fa-gear"></i> Generate SPP
                        </button>
                    @endcan
                </div>
            </div>

            <div class="table-responsive">
                @include('spp_payments.table')
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        function confirmGeneration() {
            if (confirm("Are you sure you want to generate SPP?")) {
                window.location.href = "{{ route('sppPayments.generate') }}";
            }
        }
    </script>
@endsection
