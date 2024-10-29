<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $paymentDetail->id !!}</p>
</div>

<!-- Spp Payment Id Field -->
<div class="form-group">
    {!! Form::label('spp_payment_id', 'Spp Payment Id:') !!}
    <p>{!! $paymentDetail->spp_payment_id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $paymentDetail->description !!}</p>
</div>

<div class="form-group">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{!! $paymentDetail->payment_method !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $paymentDetail->amount !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $paymentDetail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $paymentDetail->updated_at !!}</p>
</div>
