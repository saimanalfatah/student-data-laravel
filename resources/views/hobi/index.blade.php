@extends('template')
@section('main')
    <div class="container">
        <div class="col-md-5">
            <div class="d-flex justify-content-between mt-4 mb-1">
                <div class="hobi">
                    <h2>Hobi</h2>
                </div>
                <div class="tambah">
                    <a href="{{ url('hobi/create') }}" class="btn btn-primary btn-sm mb-n4">Tambah Hobi</a>
                </div>
            </div>
            @include('_partial/flash_message')
            @if (count($hobi_list) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hobi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($hobi_list as $hobi)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $hobi->nama_hobi }}</td>
                                <td width="22%">
                                    <div class="action d-flex justify-content-center">
                                        <div class="d-inline-block mx-2">
                                            {{ link_to('hobi/' . $hobi->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                        </div>
                                        <div class="d-inline-block">
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['HobiController@destroy', $hobi->id]]) !!}
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