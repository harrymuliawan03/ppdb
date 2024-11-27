@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Teacher Schedule
        </h1>--}}
        
        {{--@include('teacher_schedules.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Teacher Schedule</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('teacher_schedules.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('teacherSchedules.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
