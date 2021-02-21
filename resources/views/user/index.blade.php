@extends('template')
@section('main')
    <div class="container">
        <div class="col-md-9">
            <div class="d-flex justify-content-between mt-4 mb-1">
                <div class="user">
                    <h2>User</h2>
                </div>
                <div class="tambah">
                    <a href="{{ url('user/create') }}" class="btn btn-primary btn-sm mb-n4">Tambah User</a>
                </div>
            </div>
            @include('_partial/flash_message')
            @if (count($user_list) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($user_list as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level }}</td>
                                <td width="22%">
                                    <div class="action d-flex justify-content-center">
                                        <div class="d-inline-block mx-2">
                                            {{ link_to('user/' . $user->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                        </div>
                                        <div class="d-inline-block">
                                            {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id]]) !!}
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
                <p>Tidak ada data user</p>
            @endif
        </div>
    </div>
@stop