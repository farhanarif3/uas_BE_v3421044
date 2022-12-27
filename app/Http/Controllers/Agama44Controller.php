<?php

namespace App\Http\Controllers;

use App\Models\Agama44;
use Illuminate\Http\Request;

class Agama44Controller extends Controller
{
    public function agamaPage44()
    {
        $agama = Agama44::all();

        return view('agama', ['all_agama' => $agama]);
    }

    public function editAgamaPage44(Request $request)
    {
        $id = $request->id;

        $agama = Agama44::find($id);

        if (!$agama) {
            return back()->with('error', 'Agama tidak ditemukan');
        }

        $all_agama = Agama44::all();

        return view('agama', ['all_agama' => $all_agama, 'agama' => $agama]);
    }

    public function updateAgama44(Request $request)
    {
        $id = $request->id;
        $agama = Agama44::find($id);

        if (!$agama) {
            return redirect('/agama44')->with('error', 'Agama tidak ditemukan');
        }

        $request->validate([
            'nama_agama' => 'required'
        ]);

        $updateAgama = $agama->update([
            'nama_agama' => $request->nama_agama
        ]);

        if ($updateAgama) {
            return redirect('/agama44')->with('success', 'Agama berhasil diubah');
        } else {
            return redirect('/agama44')->with('error', 'Agama gagal diubah');
        }
    }

    public function createAgama44(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required'
        ]);

        $createAgama = Agama44::create([
            'nama_agama' => $request->nama_agama
        ]);

        if ($createAgama) {
            return back()->with('success', 'Agama berhasil ditambahkan');
        } else {
            return back()->with('error', 'Agama gagal ditambahkan');
        }
    }

    public function deleteAgama44(Request $request)
    {
        $id = $request->id;
        $agama = Agama44::find($id);

        if (!$agama) {
            return redirect('/agama44')->with('error', 'Agama tidak ditemukan');
        }

        $deleteAgama = $agama->delete();


        if ($deleteAgama) {
            return redirect('/agama44')->with('success', 'Agama berhasil dihapus');
        } else {
            return redirect('/agama44')->with('error', 'Agama gagal dihapus');
        }
    }
}
