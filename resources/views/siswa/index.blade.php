@extends('template')
@section('main')
    <div class="container">
        <div class="d-flex justify-content-between mt-4 mb-1">
            <div class="siswa">
                <h2>Siswa</h2>
            </div>
            @if (Auth::check())
                <div class="tambah">
                    <a href="{{ url('siswa/create') }}" class="btn btn-primary btn-md">Tambah Siswa</a>
                </div>
            @endif
        </div>
        @include('_partial/flash_message')
        @include('siswa/form_pencarian')
        @if (!empty($siswa_list))
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tgl Lahir</th>
                        <th>JK</th>
                        <th>Telepon</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa_list as $siswa)
                        <tr>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</td>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                            <td width="22%">
                            <div class="action d-flex justify-content-center">
                                <div class="d-inline-block">
                                    {{ link_to('siswa/' . $siswa->id, 'Detail', ['class' => 'btn btn-info btn-sm']) }}
                                </div>
                                @if (Auth::check())
                                    <div class="d-inline-block mx-2">
                                        {{ link_to('siswa/' . $siswa->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
                                    </div>
                                    <div class="d-inline-block">
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['SiswaController@destroy', $siswa->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                                </div>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada data siswa</p>
        @endif
        
        <div class="d-flex justify-content-between mt-2">
            <div class="jumlah-data">
                <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
            </div>
            <div class="pagination">
                {{ $siswa_list->links() }}
            </div>
        </div>
    </div>
@stop