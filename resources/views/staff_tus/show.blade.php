@extends('layouts.app')

@section('contents')
    <div class="content">
        <div class="container">
            @include('dashforge-templates::common.errors')

            <h4 id="section1" class="mg-b-10">Staff TU</h4>

            <p class="mg-b-30">Please, fill all required fields before click save button.</p>
            {!! Form::open(['route' => 'users.permissions']) !!}
            @include('users.show_fields')
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.content -->
@endsection
