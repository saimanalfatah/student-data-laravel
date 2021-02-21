@if (isset($hobi))
    {!! Form::hidden('id', $hobi->id) !!}
@endif
<div class="form-group">
        {!! Form::label('nama_hobi', 'Nama Hobi:', ['class' => 'control-label']) !!}
        @if ($errors->any())
            {!! Form::text('nama_hobi', null, ['class' => 'form-control ' . ($errors->has('nama_hobi') ? 'is-invalid' : 'is-valid')]) !!}
            <div class="invalid-feedback">{{ $errors->first('nama_hobi') }}</div>
        @else 
            {!! Form::text('nama_hobi', null, ['class' => 'form-control']) !!}
        @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>