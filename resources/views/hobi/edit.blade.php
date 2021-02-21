@extends('template')

@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-6">
                <h2>Edit Hobi</h2>
                {!! Form::model($hobi, ['method' => 'PATCH', 'action' => ['HobiController@update', $hobi->id]]) !!}
                    @include('hobi/form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
