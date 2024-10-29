@extends('layouts.app')

@section('contents')
    <div class="content">
        <div class="container">
            @include('dashforge-templates::common.errors')

            <h4 id="section1" class="mg-b-10">Kelas</h4>

            <p class="mg-b-30">Please, fill all required fields before click save button.</p>

            <div style="margin-right: -15px;margin-left: -15px;">
                <div data-label="Edit" class="df-example demo-forms services-forms">
                    {!! Form::model($schoolClass, ['route' => ['schoolClasses.update', $schoolClass->id], 'method' => 'patch']) !!}
                    @include('school_classes.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
