@if (isset($siswa))
    {!! Form::hidden('id', $siswa->id) !!}
@endif
<div class="form-group">
    {!! Form::label('nisn', 'NISN:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::text('nisn', null, ['class' => 'form-control ' . ($errors->has('nisn') ? 'is-invalid' : 'is-valid')]) !!}
        <div class="invalid-feedback">{{ $errors->first('nisn') }}</div>
    @else 
        {!! Form::text('nisn', null, ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('nama_siswa', 'Nama:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::text('nama_siswa', null, ['class' => 'form-control ' . ($errors->has('nama_siswa') ? 'is-invalid' : 'is-valid')]) !!}
        <div class="invalid-feedback">{{ $errors->first('nama_siswa') }}</div>
    @else
        {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d') : null, ['class' => 'form-control ' . ($errors->has('tanggal_lahir') ? 'is-invalid' : 'is-valid'), 'id' => 'tanggal_lahir']) !!}
        <div class="invalid-feedback">{{ $errors->first('tanggal_lahir') }}</div>
    @else
        {!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa->tanggal_lahir->format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        <div class="custom-control custom-radio">
            {!! Form::radio('jenis_kelamin', 'L', null, ['id' => 'laki-laki', 'class' => 'custom-control-input ' . ($errors->has('jenis_kelamin') ? 'is-invalid' : 'is-valid')]) !!} 
            <label class="custom-control-label" for="laki-laki"> Laki-laki</label>
        </div>
        <div class="custom-control custom-radio">
            {!! Form::radio('jenis_kelamin', 'P', null, ['id' => 'perempuan', 'class' => 'custom-control-input ' . ($errors->has('jenis_kelamin') ? 'is-invalid' : 'is-valid')]) !!} 
            <label class="custom-control-label" for="perempuan"> Perempuan</label>
        </div>
        @if ($errors->has('jenis_kelamin'))
            <small class="text-danger">{{ $errors->first('jenis_kelamin') }}</small>
        @endif
    @else
        <div class="custom-control custom-radio">
            {!! Form::radio('jenis_kelamin', 'L', null, ['id' => 'laki-laki', 'class' => 'custom-control-input']) !!} 
            <label class="custom-control-label" for="laki-laki"> Laki-laki</label>
        </div>
        <div class="custom-control custom-radio">
            {!! Form::radio('jenis_kelamin', 'P', null, ['id' => 'perempuan', 'class' => 'custom-control-input']) !!} 
            <label class="custom-control-label" for="perempuan"> Perempuan</label>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('nomor_telepon', 'Nomor Telepon:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        {!! Form::text('nomor_telepon', null, ['class' => 'form-control ' . ($errors->has('nomor_telepon') ? 'is-invalid' : 'is-valid')]) !!}
        <div class="invalid-feedback">{{ $errors->first('nomor_telepon') }}</div>
    @else 
        {!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('id_kelas', 'Kelas:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        @if (count($list_kelas) > 0)
            {!! Form::select('id_kelas', $list_kelas, null, ['class' => 'custom-select ' . ($errors->has('id_kelas') ? 'is-invalid' : 'is-valid'), 'id' => 'id_kelas', 'placeholder' => 'Pilih Kelas']) !!}
            <div class="invalid-feedback">{{ $errors->first('id_kelas') }}</div>
        @else 
            <p>Tidak ada pilihan kelas, buat dulu yaa..!</p>
        @endif
    @else 
        @if (count($list_kelas) > 0)
            {!! Form::select('id_kelas', $list_kelas, null, ['class' => 'custom-select', 'id' => 'id_kelas', 'placeholder' => 'Pilih Kelas']) !!}
        @else 
            <p>Tidak ada pilihan kelas, buat dulu yaa..!</p>
        @endif
    @endif
</div>
<div class="form-group">
    {!! Form::label('hobi_siswa', 'Hobi:', ['class' => 'control-label']) !!}
    @if (count($list_hobi) > 0)
        @foreach ($list_hobi as $key => $value)
        <div class="custom-control custom-checkbox">
            {!! Form::checkbox('hobi_siswa[]', $key , null, ['class' => 'custom-control-input', 'id' => '' . $value ]) !!}
            <label class="custom-control-label" for="{{ $value }}">{{ $value }}</label>
        </div>
        @endforeach
    @else 
        <p>Tidak ada pilihan hobi, buat dulu ya...!</p>
    @endif
</div>
<div class="form-group">
    {!! Form::label('foto', 'Foto:', ['class' => 'control-label']) !!}
    @if ($errors->any())
        <div class="custom-file">
            {!! Form::file('foto', ['id' => 'file', 'class' => 'custom-file-input ' . ($errors->has('foto') ? 'is-invalid' : '')]) !!}
            <label class="custom-file-label" for="file"> Pilih File....</label>
        </div>
        <small class="text-danger">{{ $errors->first('foto') }}</small>
    @else
        <div class="custom-file">
            {!! Form::file('foto', ['id' => 'file', 'class' => 'custom-file-input']) !!}
            <label class="custom-file-label" for="file"> Pilih File....</label>
        </div>
    @endif
    @if (isset($siswa))
        @if (isset($siswa->foto))
            <img src="{{ asset('fotoupload/' . $siswa->foto) }}" alt="">
        @else 
            @if ($siswa->jenis_kelamin == 'L')
                <img src="{{ asset('fotoupload/dummymale.jpg') }}" alt="">
            @else
                <img src="{{ asset('fotoupload/dummyfemale.jpg') }}" alt="">
            @endif
        @endif
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>