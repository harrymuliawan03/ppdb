<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $schoolClass->id !!}</p>
</div>

<!-- Nama Kelas Field -->
<div class="form-group">
    {!! Form::label('nama_kelas', 'Nama Kelas:') !!}
    <p>{!! $schoolClass->nama_kelas !!}</p>
</div>

<!-- Jurusan Field -->
<div class="form-group">
    {!! Form::label('jurusan_id', 'Jurusan:') !!}
    <p>{!! $schoolClass->jurusan->nama_jurusan !!}</p>
</div>

<!-- Wali Kelas Field -->
<div class="form-group">
    {!! Form::label('wali_kelas_id', 'Wali Kelas:') !!}
    <p>{!! $schoolClass->teacher->name !!}</p>
</div>

<!-- Tahun Ajaran Field -->
<div class="form-group">
    {!! Form::label('tahun_ajaran', 'Tahun Ajaran:') !!}
    <p>{!! $schoolClass->tahun_ajaran !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $schoolClass->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $schoolClass->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $schoolClass->updated_at !!}</p>
</div>
