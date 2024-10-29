@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Major
        </h1>--}}
        
        {{--@include('majors.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Major</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('majors.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('majors.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
