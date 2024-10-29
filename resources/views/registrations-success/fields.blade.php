<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prospective_student_id', 'Prospective Student Id:') !!}
    {!! Form::number('prospective_student_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('no_registration', 'No Registration:') !!}
    {!! Form::text('no_registration', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('major_id', 'Major Id:') !!}
    {!! Form::text('major_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('old_school', 'Sekolah Asal:') !!}
    {!! Form::text('old_school', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('average_ijazah', 'Nilai Rata-rata Ijazah:') !!}
    {!! Form::text('average_ijazah', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('average_raport', 'Nilai Rata-rata Raport:') !!}
    {!! Form::text('average_raport', null, ['class' => 'form-control']) !!}
</div>

<!-- Ijazah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ijazah', 'Ijazah:', ['class' => 'd-block']) !!}
    {!! Form::file('ijazah', ['class' => 'form-control dropify']) !!}
</div>

<!-- Raport Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raport', 'Raport:', ['class' => 'd-block']) !!}
    {!! Form::file('raport', ['class' => 'form-control dropify']) !!}
</div>

<!-- Birth Certificate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birth_certificate', 'Birth Certificate:', ['class' => 'd-block']) !!}
    {!! Form::file('birth_certificate', ['class' => 'form-control dropify']) !!}
</div>

<!-- Student Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_photo', 'Student Photo:', ['class' => 'd-block']) !!}
    {!! Form::file('student_photo', ['class' => 'form-control dropify']) !!}
</div>

<!-- Registration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    {!! Form::date('registration_date', \Carbon\Carbon::parse($registration->registration_date)->format('Y-m-d'), [
        'class' => 'form-control date',
    ]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:', ['class' => 'd-block']) !!}
    {!! Form::select(
        'status',
        [
            'pending' => 'Pending',
            'rejected' => 'Rejected',
            'approved' => 'Approved',
            'success' => 'Success',
        ],
        null,
        ['class' => 'form-control'],
    ) !!}
</div>

<div class="clearfix"></div>
<hr>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('registrations.index') !!}" class="btn btn-light">Cancel</a>
</div>

@section('scripts')
    <!-- Relational Form table -->
    <script>
        $(document).ready(function() {
            $('.dropify').dropify({
                messages: {
                    default: 'Seret dan lepas file di sini atau klik',
                    replace: 'Seret dan lepas file di sini atau klik untuk mengganti',
                    remove: 'Hapus',
                    error: 'Maaf, file terlalu besar'
                }
            });

            // Rest of your JavaScript code...
        });
    </script>
    <!-- End Relational Form table -->
@endsection
