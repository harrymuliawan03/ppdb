@extends('layouts.app')

@section('contents')
    {{-- <section class="content-header">
        <h1>
            School Class
        </h1> --}}

    {{-- @include('school_classes.version') --}}
    {{-- </section> --}}
    <div class="content">
        <h4 class="mg-b-30">Kelas</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('school_classes.show_fields')

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('schoolClasses.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
