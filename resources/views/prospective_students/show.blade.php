@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Prospective Student
        </h1>--}}
        
        {{--@include('prospective_students.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Prospective Student</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('prospective_students.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('prospectiveStudents.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
