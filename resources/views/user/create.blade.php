@extends('template')

@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-6">
                <h2>Tambah User</h2>
                {!! Form::open(['url' => 'user']) !!}
                   @include('user/form', ['submitButtonText' => 'Simpan'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
