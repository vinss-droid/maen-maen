<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Jurnal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $jumlah_jurnal = Jurnal::all()->count();
        // $jumlah_nilai = Nilai::all()->count();

        $data = [
            'jumlah_nilai' => Nilai::all()->count(),
            'jumlah_jurnal' => Jurnal::all()->count(),
        ];

        // dd($data);
        
        return view('pages.dashboard')->with($data);
    }

}
