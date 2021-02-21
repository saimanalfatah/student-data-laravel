@if (isset($kelas))
    {!! Form::hidden('id', $kelas->id) !!}
@endif
<div class="form-group">
        {!! Form::label('nama_kelas', 'Nama Kelas:', ['class' => 'control-label']) !!}
        @if ($errors->any())
            {!! Form::text('nama_kelas', null, ['class' => 'form-control ' . ($errors->has('nama_kelas') ? 'is-invalid' : 'is-valid')]) !!}
            <div class="invalid-feedback">{{ $errors->first('nama_kelas') }}</div>
        @else 
            {!! Form::text('nama_kelas', null, ['class' => 'form-control']) !!}
        @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>