<?php

namespace App\Http\Controllers;




class Pimpinan extends Controller
{

    public function laba_rugi(){
        return view('pimpinan.laba_rugi');
    }

    public function laporan_modal(){
        return view('pimpinan.laporan_modal');
    }

    public function laporan_neraca(){
        return view('pimpinan.laporan_neraca');
    }


}
