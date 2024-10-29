@extends('layouts.app')

@section('contents')
    <div class="content">
        <div class="container">
            @include('dashforge-templates::common.errors')

            <h4 id="section1" class="mg-b-10">Spp Payment</h4>

            <p class="mg-b-30">Please, fill all required fields before click save button.</p>
            @include('flash::message')

            <div style="margin-right: -15px;margin-left: -15px;">
                <div data-label="Edit" class="df-example demo-forms services-forms">
                    {!! Form::model($sppPayment, ['route' => ['sppPayments.update', $sppPayment->id], 'method' => 'patch']) !!}
                    @include('spp_payments.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
