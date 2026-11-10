<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Pendaftaran;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function formDaftar()
    {
        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->first();
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();

        return view('mahasiswa.formDaftar', compact('fakultas', 'prodi', 'pendaftaran'));
    }
    
    public function daftarFakultas()
    {
        $fakultas = Fakultas::all();

        return view('mahasiswa.daftarFakultas', compact('fakultas'));
    }

    public function detailProd($id)
    {
        $fakultas = Fakultas::where('id', $id)->first();
        $prodi = Prodi::where('fakultas_id', $id)->get(); 
    
        return view('mahasiswa.detailProd', compact('fakultas', 'prodi'));
    }

    public function postformDaftar(Request $request)
    {
        $request->validate([
            'prodi_id'    => 'required',
            'namalengkap' => 'required|string|max:255',
            'tgllahir'    => 'required|date',
            'jk'          => 'required',
            'alamat'      => 'required|string',
            'agama'       => 'required',
            'telpon'      => 'required|numeric',
            'lulusan'     => 'required|digits:4',
        ]);

        Pendaftaran::create([
            'user_id'     => Auth::id(),
            'prodi_id'    => $request->prodi_id,
            'namalengkap' => $request->namalengkap,
            'tgllahir'    => $request->tgllahir,
            'jk'          => $request->jk,
            'alamat'      => $request->alamat,
            'agama'       => $request->agama,
            'telpon'      => $request->telpon,
            'lulusan'     => $request->lulusan,
        ]);

        return redirect()->route('daftarFakultas')->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
