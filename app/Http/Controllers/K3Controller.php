<?php

namespace App\Http\Controllers;

use App\Models\K3;
use Illuminate\Http\Request;

use function Illuminate\Log\log;

class K3Controller extends Controller
{
    public function index()
    {
        $data = K3::latest()->first();

        return view('k3.index', compact('data'));
    }

    public function admin()
    {
        $data = K3::latest()->first();
        return view('k3.admin', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'labour_accident' => 'required|integer',
            'small_accident' => 'required|integer',
            'traffic_accident' => 'required|integer',
            'near_miss' => 'required|integer',
            'pak' => 'required|integer',
            'jumlah_pekerja' => 'required|integer',
            'jam_kerja_aman' => 'required|integer',
            'hari_kerja_aman' => 'required|integer',
        ]);

        $data = K3::latest()->first();
        $data->update($request->all());

        return redirect()->route('admin')->with('success', 'Data berhasil diperbarui');
    }
}
