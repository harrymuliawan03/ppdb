<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $registration->id !!}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('prospective_student_id', 'Prospective Student Id:') !!}
    <p>{!! $registration->prospective_student_id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('no_registration', 'No Registration:') !!}
    <p>{!! $registration->no_registration !!}</p>
</div>

<div class="form-group">
    {!! Form::label('major_id', 'Major Id:') !!}
    <p>{!! $registration->major_id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('old_school', 'Sekolah Asal:') !!}
    <p>{!! $registration->old_school !!}</p>
</div>

<div class="form-group">
    {!! Form::label('average_ijazah', 'Nilai Rata-rata Ijazah:') !!}
    <p>{!! $registration->average_ijazah !!}</p>
</div>

<div class="form-group">
    {!! Form::label('average_raport', 'Nilai Rata-rata Raport:') !!}
    <p>{!! $registration->average_raport !!}</p>
</div>

<!-- Ijazah Field -->
<div class="form-group d-flex flex-column">
    {!! Form::label('ijazah', 'Ijazah:') !!}
    @if ($registration->ijazah)
        <img src="{{ asset('storage/' . $registration->ijazah) }}" alt="Ijazah" style="max-width: 300px;">
    @else
        <p>No image available</p>
    @endif
</div>

<!-- Raport Field -->
<div class="form-group d-flex flex-column">
    {!! Form::label('raport', 'Raport:') !!}
    @if ($registration->raport)
        <img src="{{ asset('storage/' . $registration->raport) }}" alt="Raport" style="max-width: 300px;">
    @else
        <p>No image available</p>
    @endif
</div>

<!-- Birth Certificate Field -->
<div class="form-group d-flex flex-column">
    {!! Form::label('birth_certificate', 'Birth Certificate:') !!}
    @if ($registration->birth_certificate)
        <img src="{{ asset('storage/' . $registration->birth_certificate) }}" alt="Birth Certificate"
            style="max-width: 300px;">
    @else
        <p>No image available</p>
    @endif
</div>

<!-- Student Photo Field -->
<div class="form-group d-flex flex-column">
    {!! Form::label('student_photo', 'Student Photo:') !!}
    @if ($registration->student_photo)
        <img src="{{ asset('storage/' . $registration->student_photo) }}" alt="Student Photo" style="max-width: 300px;">
    @else
        <p>No image available</p>
    @endif
</div>

<!-- Registration Date Field -->
<div class="form-group">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    <p>{!! $registration->registration_date !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $registration->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $registration->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $registration->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $registration->deleted_at !!}</p>
</div>
