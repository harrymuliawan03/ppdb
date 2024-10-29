@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Student Grade
        </h1>--}}
        
        {{--@include('student_grades.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Nilai Siswa</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('student_grades.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('studentGrades.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
