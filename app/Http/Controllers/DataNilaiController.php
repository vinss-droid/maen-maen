<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class DataNilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nilai = Nilai::orderBy('nama', 'ASC')->get();

        return view('pages.DataNilai', compact('nilai'));
    }

    public function insert(Request $request)
    {
        if(!empty($request->mapel)) {      
            $checkbox = join(' , ',$request->input('mapel'));
        } else {
            $checkbox = '-';
        }
        
        $request->validate([
            'nis' => 'required|min:6|max:12',
            'nama' => 'required',
            'semester' => 'required',
            'status'=> 'required'
        ],
        [
            'nis.required' => 'NIS Wajib Di Isi',
            'nis.min' => 'Minimal NIS 6 Digit',
            'nis.max' => 'Maximal NIS 12 Digit',
            'nama.required' => 'Nama Wajib Di Isi',
            'semester.required' => 'Semester Wajib Di Pilih',
            'status.required' => 'Status Wajib Di Pilih'
        ]);

        $data = [
            'nis' => Request('nis'),
            'nama' => Request('nama'),
            'mapel' => $checkbox,
            'semester' => Request('semester'),
            'status' => Request('status')
        ];

        Nilai::create($data)->all();

        return redirect()->route('nilai')->with('create', 'Data Nilai Berhasil Di Tambahkan');
    }

    public function edit(Request $request, $id)
    {

        $nilai = Nilai::find($id);

        if(!$id) {
            abort(404);
        }

        if($request->mapel) {
            $checkbox = explode(' , ', $request->mapel);
        }

        return view('pages.EditDataNilai', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        if(!empty($request->mapel)) {      
            $checkbox = join(' , ',$request->input('mapel'));
        } else {
            $checkbox = '-';
        }

        // dd($checkbox);
        
        $request->validate([
            'nis' => 'required|min:6|max:12',
            'nama' => 'required',
            'semester' => 'required',
            'status'=> 'required',
        ],
        [
            'nis.required' => 'NIS Wajib Di Isi',
            'nis.min' => 'Minimal NIS 6 Digit',
            'nis.max' => 'Maximal NIS 12 Digit',
            'nama.required' => 'Nama Wajib Di Isi',
            'semester.required' => 'Semester Wajib Di Pilih',
            'status.required' => 'Status Wajib Di Pilih',
        ]);

        $data = [
            'nis' => Request('nis'),
            'nama' => Request('nama'),
            'mapel' => $checkbox,
            'semester' => Request('semester'),
            'status' => Request('status')
        ];

        // dd($data);

        Nilai::find($id)->update($data);
        // dd($hasil);

        return redirect()->route('nilai')->with('update', 'Data Nilai Berhasil Di Update');
    }

    public function destroy(Request $request, $id)
    {
        Nilai::find($id)->delete();

        return redirect()->route('nilai')->with('delete', 'Data Berhasil Di Hapus');
    
    }
}
