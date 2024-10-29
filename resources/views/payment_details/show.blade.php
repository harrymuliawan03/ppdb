@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Payment Detail
        </h1>--}}
        
        {{--@include('payment_details.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Payment Detail</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('payment_details.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('paymentDetails.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
