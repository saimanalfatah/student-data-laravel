@extends('template')

@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-6">
                <h2>Edit Siswa</h2>
                {!! Form::model($siswa, ['method' => 'PATCH', 'files' => true, 'action' => ['SiswaController@update', $siswa->id]]) !!}
                    @include('siswa/form', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
