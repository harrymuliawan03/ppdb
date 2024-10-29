@extends('layouts.app')

@section('contents')
    {{-- <section class="content-header">
        <h1>
            Registration
        </h1> --}}

    {{-- @include('registrations.version') --}}
    {{-- </section> --}}
    <div class="content">
        <h4 class="mg-b-30">Registration Success</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('registrations.show_fields')

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('registrations.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
