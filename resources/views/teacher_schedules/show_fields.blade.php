<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $teacherSchedule->id !!}</p>
</div>

<!-- Teacher Id Field -->
<div class="form-group">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    <p>{!! $teacherSchedule->teacher_id !!}</p>
</div>

<!-- Day Of Week Field -->
<div class="form-group">
    {!! Form::label('day_of_week', 'Day Of Week:') !!}
    <p>{!! $teacherSchedule->day_of_week !!}</p>
</div>

<!-- Start Time Field -->
<div class="form-group">
    {!! Form::label('start_time', 'Start Time:') !!}
    <p>{!! $teacherSchedule->start_time !!}</p>
</div>

<!-- End Time Field -->
<div class="form-group">
    {!! Form::label('end_time', 'End Time:') !!}
    <p>{!! $teacherSchedule->end_time !!}</p>
</div>

<!-- Subject Id Field -->
<div class="form-group">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{!! $teacherSchedule->subject_id !!}</p>
</div>

<!-- Class Id Field -->
<div class="form-group">
    {!! Form::label('class_id', 'Class Id:') !!}
    <p>{!! $teacherSchedule->class_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $teacherSchedule->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $teacherSchedule->updated_at !!}</p>
</div>

