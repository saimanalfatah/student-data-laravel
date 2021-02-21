@extends('template')
@section('main')
    <div class="container">
        <div class="col-md-5">
            <div class="d-flex justify-content-between mt-4 mb-1">
                <div class="kelas">
                    <h2>Kelas</h2>
                </div>
                <div class="tambah">
                    <a href="{{ url('kelas/create') }}" class="btn btn-primary btn-sm mb-n4">Tambah Kelas</a>
                </div>
            </div>
            @include('_partial/flash_message')
            @if (count($kelas_list) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($kelas_list as $kelas)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td width="22%">
                                    <div class="action d-flex justify-content-center">
                                        <div class="d-inline-block mx-2">
                                            {{ link_to('kelas/' . $kelas->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                        </div>
                                        <div class="d-inline-block">
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['KelasController@destroy', $kelas->id]]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data kelas</p>
            @endif
        </div>
    </div>
@stop