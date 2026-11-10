<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataM()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.dataM', compact('pendaftaran'));
    }

    public function dataP()
    {
        $pendaftaran = Pendaftaran::with('prodi.fakultas')->where('status', 'lunas')->get();
        
        return view('admin.dataP', compact('pendaftaran'));
    }

    public function edit(pendaftaran $pendaftaran)
    {
        $prodi = Prodi::all();

        return view('admin.edit', compact('pendaftaran', 'prodi'));
    }

    public function postedit(Request $request, pendaftaran $pendaftaran)
    {
        $request->validate([
            'namalengkap' => 'required',
            'prodi_id' => 'required',
            'status' => 'required'
        ]);

        $pendaftaran->update([
            'namalengkap' => $request->namalengkap,
            'prodi_id' => $request->prodi_id,
            'status' => $request->status
        ]);

        return redirect()->route('dataM');
    }

    public function hapus(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()->route('dataM');
    }
}
