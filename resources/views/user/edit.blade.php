@extends('template')

@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-6">
                <h2>Edit User</h2>
                {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
                    @include('user/form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
