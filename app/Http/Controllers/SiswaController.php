<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use Storage;
use Session;

class SiswaController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
            'cari'
        ]]);
    }
    public function index() {
        $siswa_list = Siswa::orderBy('nisn', 'asc')->paginate(5);
        $jumlah_siswa = Siswa::count();
        return view('siswa/index', compact('siswa_list', 'jumlah_siswa'));
    }
    public function create() {
        return view('siswa/create');
    }
    public function store(SiswaRequest $request) {
        $input = $request->all();

        // Upload Foto
        if ($request->hasFile('foto')) {
            $input['foto']  = $this->uploadFoto($request);
        }

        // Insert Siswa
        $siswa = Siswa::create($input);

        // Insert Telepon
        if ($request->filled('nomor_telepon')) {
            $this->insertTelepon($siswa, $request);
        }
        // Insert Hobi
        $siswa->hobi()->attach($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data Siswa berhasil disimpan');
        
        return redirect('siswa');
    }
    public function show(Siswa $siswa) {
        return view('siswa/show', compact('siswa'));
    }
    public function edit(Siswa $siswa) {
        if (!empty($siswa->telepon->nomor_telepon)) {
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }
        return view('siswa/edit', compact('siswa'));
    }
    public function update(Siswa $siswa, SiswaRequest $request) {
        $input = $request->all();

        // Update Foto
        if ($request->hasFile('foto')) {   
            $input['foto']  = $this->updateFoto($siswa, $request);
        }

        // update data siswa
        $siswa->update($input);

        // Update Telepon
        $this->updateTelepon($siswa, $request);

        // update data hobi
        $siswa->hobi()->sync($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data Siswa berhasil diupdate');

        return redirect('siswa');
    }
    public function destroy(Siswa $siswa) {
        // Hapus Foto Jika Ada
        $this->hapusFoto($siswa);

        $siswa->delete();

        Session::flash('flash_message', 'Data Siswa berhasil dihapus');
        Session::flash('penting', true);
        return redirect('siswa');
    }
    public function cari(Request $request) {
        $kata_kunci     = trim($request->input('kata_kunci'));

        if (!empty($kata_kunci)) {
            $jenis_kelamin  = $request->input('jenis_kelamin');
            $id_kelas       = $request->input('id_kelas');
            $query          = Siswa::where('nama_siswa', 'LIKE', '%' . $kata_kunci . '%');
            // Query
            (!empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
            (!empty($id_kelas)) ? $query->Kelas($id_kelas) : '';
            $siswa_list     = $query->paginate(2);

            // URL links pagination
            $pagination     = (!empty($jenis_kelamin)) ? $siswa_list->appends(['jenis_kelamin' => $jenis_kelamin]): '';
            $pagination     = (!empty($id_kelas)) ? $siswa_list->appends(['id_kelas' => $id_kelas]): '';
            $pagination     = $siswa_list->appends(['kata_kunci' => $kata_kunci]);

            $jumlah_siswa   = $siswa_list->total();
            return view('siswa/index', compact('siswa_list', 'kata_kunci', 'pagination', 'jumlah_siswa', 'id_kelas', 'jenis_kelamin'));
        }
        return redirect('siswa');
    }
    public function testCollection() {
        $data = [
		['nisn' => 1001, 'nama_siswa' => 'Takumi Minamino'],
		['nisn' => 1002, 'nama_siswa' => 'Sadio Mane'],
		['nisn' => 1003, 'nama_siswa' => 'Mohamed Salah']
	];
        $collection = collect($data);
        $collection->toJson();
        return $collection;
    }
    public function dateMutator() {
        $siswa          = Siswa::findOrFail(7);
        $nama           = $siswa->nama_siswa;
        $tanggal_lahir  = $siswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun    = $siswa->tanggal_lahir->addYears(3)->format('d-m-Y');
        return "Siswa {$nama} lahir pada {$tanggal_lahir}. <br>
        ulang tahun ke-30 akan jatuh pada {$ulang_tahun}.";
    }

    public function insertTelepon(Siswa $siswa, SiswaRequest $request) {
        $telepon                = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
    }
    public function updateTelepon(Siswa $siswa, SiswaRequest $request) {
        // update nomor telepon, jika sebelumnya sudah ada no telp
        if ($siswa->telepon) {
            // jika telp diisi, update
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            //  jika telepon tidak diisi, hapus
            else {
                $siswa->telepon()->delete();
            }
        }
        // buat entry baru, jika sebelumnya tidak ada nomor telepon
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
    }
    public function uploadFoto(SiswaRequest $request) {
        $foto   = $request->file('foto');
        $ext    = $foto->getClientOriginalExtension();
        if ($request->file('foto')->isValid()) {
            $foto_name      = date('YmdHis') . ".$ext";
            $upload_path    = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);
            return $foto_name;
        }
        return false;
    }
    public function updateFoto(Siswa $siswa, SiswaRequest $request) {
        // hapus foto lama jika da foto baru
        $exist = Storage::disk('foto')->exists($siswa->foto);
        if (isset($siswa->foto) && $exist) {
            $delete = Storage::disk('foto')->delete($siswa->foto);
        }
        // Upload Foto baru
        $foto   = $request->file('foto');
        $ext    = $foto->getClientOriginalExtension();
        if ($request->file('foto')->isValid()) {
            $foto_name      = date('YmdHis') . ".$ext";
            $upload_path    = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);
            return $foto_name;
        }
        return false;
    }
    public function hapusFoto(Siswa $siswa) {
        $is_foto_exist = Storage::disk('foto')->exists($siswa->foto);

        if ($is_foto_exist) {
            Storage::disk('foto')->delete($siswa->foto);
        }
    }
}
