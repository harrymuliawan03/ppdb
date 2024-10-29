<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sppPayment->id !!}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{!! $sppPayment->student_id !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $sppPayment->amount !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $sppPayment->status !!}</p>
</div>

<!-- Due Date Field -->
<div class="form-group">
    {!! Form::label('payment_month', 'Payment Month:') !!}
    <p>{!! \Carbon\Carbon::parse($sppPayment->payment_month)->locale('id')->translatedFormat('F') !!}</p>
</div>

<!-- Due Date Field -->
<div class="form-group">
    {!! Form::label('payment_year', 'Payment Year:') !!}
    <p>{!! \Carbon\Carbon::parse($sppPayment->payment_month)->format('Y') !!}</p>
</div>

<!-- Payment Date Field -->
<div class="form-group">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{!! $sppPayment->payment_date !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sppPayment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sppPayment->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $sppPayment->deleted_at !!}</p>
</div>
