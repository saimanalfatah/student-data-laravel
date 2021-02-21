@if (isset($user))
    {!! Form::hidden('id', $user->id) !!}
@endif
<div class="form-group">
    {!! Form::label('name', 'Nama:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : 'is-valid')]) !!}
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @else 
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::text('email', null, ['class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : 'is-valid')]) !!}
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    @else 
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('level', 'Level:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        <div class="custom-control custom-radio">
            {!! Form::radio('level', 'operator', null, ['id' => 'operator', 'class' => 'custom-control-input ' . ($errors->has('level') ? 'is-invalid' : 'is-valid')]) !!} 
            <label class="custom-control-label" for="operator"> Operator</label>
        </div>
        <div class="custom-control custom-radio">
            {!! Form::radio('level', 'admin', null, ['id' => 'admin', 'class' => 'custom-control-input ' . ($errors->has('level') ? 'is-invalid' : 'is-valid')]) !!} 
            <label class="custom-control-label" for="admin"> Admin</label>
        </div>
        @if ($errors->has('level'))
            <small class="text-danger">{{ $errors->first('level') }}</small>
        @endif
    @else
        <div class="custom-control custom-radio">
            {!! Form::radio('level', 'operator', null, ['id' => 'operator', 'class' => 'custom-control-input']) !!} 
            <label class="custom-control-label" for="operator"> Operator</label>
        </div>
        <div class="custom-control custom-radio">
            {!! Form::radio('level', 'admin', null, ['id' => 'admin', 'class' => 'custom-control-input']) !!} 
            <label class="custom-control-label" for="admin"> Admin</label>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::password('password', ['class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : 'is-valid')]) !!}
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    @else 
        {!! Form::password('password', ['class' => 'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::password('password_confirmation', ['class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : '')]) !!}
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    @else 
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>