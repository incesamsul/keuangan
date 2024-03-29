<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use App\Models\BukuBesar;
use App\Models\NeracaSaldo;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use File;
class Pimpinan extends Controller
{

    public function laba_rugi()
    {
        $data['neracasaldo'] = NeracaSaldo::all();
        $data['akun'] = Akun::all();
        $data['bukubesar'] = BukuBesar::all();
        return view('staff.laba_rugi', $data);
    }

    public function laporan_modal()
    {
        $data['neracasaldo'] = NeracaSaldo::all();
        $data['akun'] = Akun::all();
        $data['bukubesar'] = BukuBesar::all();
        return view('staff.laporan_modal', $data);
    }

    public function laporan_neraca()
    {
        $data['neracasaldo'] = NeracaSaldo::all();
        $data['akun'] = Akun::all();
        $data['bukubesar'] = BukuBesar::all();
        return view('staff.laporan_neraca', $data);
    }


    public function cetakLabaRugi()
    {
        $html = view('staff.cetak_laba_rugi');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_laba_rugi.pdf", array("Attachment" => false));
        exit(0);
    }

    public function cetakLaporanModal()
    {
        $data['neracasaldo'] = NeracaSaldo::all();
        $data['akun'] = Akun::all();
        $data['bukubesar'] = BukuBesar::all();
        $html = view('staff.cetak_laporan_modal', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_modal.pdf", array("Attachment" => false));
        exit(0);
    }

    public function cetakNeraca()
    {
        $data['neracasaldo'] = NeracaSaldo::all();
        $data['akun'] = Akun::all();
        $data['bukubesar'] = BukuBesar::all();
        $html = view('staff.cetak_neraca', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("laporan_neraca.pdf", array("Attachment" => false));
        exit(0);
    }


}
