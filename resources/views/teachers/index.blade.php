@extends('layouts.app')

@section('contents')
    <div class="content content-components">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Guru</li>
                        </ol>
                    </nav>
                    <!-- <h1 class="mg-b-0 tx-spacing--1">Users</h1> -->
                </div>
            </div>

            @include('flash::message')

            <h4 class="mg-b-10">Guru</h4>

            <p class="mg-b-30">
                This is a list of your <code>Users</code>, you can manage by clicking on action buttons in this table.
            </p>

            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>

                </div>

                <div class="d-none d-md-block">
                    {{-- <button type="button" class="btn btn-sm btn-info btn-uppercase mg-r-5" data-toggle="modal" data-target="#myModal">
                        Import Excel File
                    </button> --}}
                    <a class="btn btn-sm btn-primary btn-uppercase" href="{!! route('teachers.create') !!}"><i
                            class="fa fa-plus"></i> Add New</a>
                </div>
            </div>

            <div class="table-responsive">
                @include('teachers.table')
            </div>
        </div>
    </div>
    <!-- /.content -->

    <!-- Modal -->
    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{!! url('importUser') !!}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Data Import</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-12">
                        <label for="import">Data:</label>
                        <input id="import" class="form-control" type="file" name="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div> --}}
@endsection
