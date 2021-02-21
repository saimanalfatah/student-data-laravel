{!! Form::open(['url' => 'siswa/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
<div class="row">
    <div class="col-md-2">
        {!! Form::select('id_kelas', $list_kelas, (!empty($id_kelas) ? $id_kelas : null ), ['class' => 'custom-select', 'id' => 'id_kelas', 'placeholder' => '-Kelas-']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], (!empty($jenis_kelamin) ? $jenis_kelamin : null ), ['class' => 'custom-select', 'id' => 'jenis_kelamin', 'placeholder' => '-JK-']) !!}
    </div>
    <div class="col-md-8">
        <div class="input-group mb-3">
            {!! Form::text('kata_kunci', (!empty($kata_kunci)) ? $kata_kunci : null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Siswa']) !!}
            <div class="input-group-append">
                {!! Form::button('Cari', ['class' => 'btn btn-outline-success', 'type' => 'submit']) !!}
            </div> 
        </div>
    </div>
</div>
{!! Form::close() !!}