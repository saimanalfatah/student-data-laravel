@extends('template')

@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-6">
                <h2>Edit Kelas</h2>
                {!! Form::model($kelas, ['method' => 'PATCH', 'action' => ['KelasController@update', $kelas->id]]) !!}
                    @include('kelas/form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
