@extends('layouts.app')

@section('contents')
    {{--<section class="content-header">
        <h1>
            Spp Payment
        </h1>--}}
        
        {{--@include('spp_payments.version')--}}
    {{--</section>--}}
    <div class="content">
        <h4 class="mg-b-30">Spp Payment</h4>

        <div class="box box-primary">
            <div class="box-body">
                @include('spp_payments.show_fields')                

                <div class="clearfix"></div>
                <hr>

                <a href="{!! route('sppPayments.index') !!}" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
@endsection
