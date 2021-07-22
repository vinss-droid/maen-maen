<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;

class DataJurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jurnal = Jurnal::orderBy('nama', 'ASC')->get();
        
        return view('pages.DataJurnal', compact('jurnal'));
    }

    public function jurnalcreate(Request $request)
    {
       $request->validate([
           'nis' => 'required|unique:jurnals,nis|min:6,|max:12',
           'nama' => 'required',
           'status' => 'required',
       ],
       [
           'nis.required' => 'NIS Wajib Di Isi',
           'nis.unique' => 'NIS Sudah Terdata',
           'nis.min' => 'Mininal NIS 6 Digit',
           'nis.max' => 'Maximal NIS 12 Digit',
           'nama.required' => 'Nama Wajib Di Isi',
           'status' => 'Status Wajib Di Pilih',
       ]);

    //    dd($request->all());

        Jurnal::create($request->all());
        // dd($hasil);

       return redirect()->route('jurnal')->with('success', 'Data Berhasil Di Tambahkan !');

    }

    public function edit($id)
    {
        $jurnal = Jurnal::find($id);

        if (!$jurnal) {
            abort(404);
        }

        return view('pages.EditDataJurnal', compact('jurnal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|min:6,|max:12',
            'nama' => 'required',
        ],
        [
            'nis.required' => 'NIS Wajib Di Isi',
            'nis.min' => 'Mininal NIS 6 Digit',
            'nis.max' => 'Maximal NIS 12 Digit',
            'nama.required' => 'Nama Wajib Di Isi',
        ]);

        Jurnal::find($id)->update($request->all());

        return redirect()->route('jurnal')->with('berhasil', 'Data Berhasil Di Update');
    }

    public function destroy(Request $request, $id)
    {
        Jurnal::find($id)->delete();
        return redirect()->route('jurnal')->with('delete', 'Data Behasil Di Hapus');
    }

}
