@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Subject
        </h1>--}}
        
        {{--@include('subjects.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Mata Pelajaran</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('subjects.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('subjects.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
