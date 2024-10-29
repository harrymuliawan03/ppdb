<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $major->id !!}</p>
</div>

<!-- Kode Jurusan Field -->
<div class="form-group">
    {!! Form::label('kode_jurusan', 'Kode Jurusan:') !!}
    <p>{!! $major->kode_jurusan !!}</p>
</div>

<!-- Nama Jurusan Field -->
<div class="form-group">
    {!! Form::label('nama_jurusan', 'Nama Jurusan:') !!}
    <p>{!! $major->nama_jurusan !!}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{!! $major->deskripsi !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $major->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $major->updated_at !!}</p>
</div>

