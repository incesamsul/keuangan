<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Pemasok;
use App\Models\Pelanggan;
use App\Models\Jurnal;
use App\Models\BukuBesar;
use App\Models\NeracaSaldo;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use File;

class Staff extends Controller
{

    public function data_akun()
    {
        $data['akun'] = Akun::all();
        return view('staff.data_akun', $data);
    }

    public function akunDelete($id)
    {
        $akun_delete = Akun::where('id_akun', $id);
        $akun_delete->delete();
        return redirect()->back();
    }

    public function data_pemasok()
    {
        $data['pemasok'] = Pemasok::all();
        return view('staff.data_pemasok', $data);
    }
    
    public function pemasokDelete($id)
    {
        $pemasok_delete = Pemasok::where('id_pemasok', $id);
        $pemasok_delete->delete();
        return redirect()->back();
    }

    public function data_pelanggan()
    {
        $data['pelanggan'] = Pelanggan::all();
        return view('staff.data_pelanggan', $data);
    }

    public function pelangganDelete($id)
    {
        $pelanggan_delete = Pelanggan::where('id_pelanggan', $id);
        $pelanggan_delete->delete();
        return redirect()->back();
    }

    public function jurnal()
    {
        $data['jurnal'] = Jurnal::all();
        // $data['jurnal'] = Jurnal::groupBy('no_bukti')->get();
        $data['akun'] = Akun::all();
        $data['pelanggan'] = Pelanggan::all();
        $data['pemasok'] = Pemasok::all();
        return view('staff.jurnal', $data);
    }

    public function jurnalDelete($id)
    {
        $jurnal_delete = Jurnal::where('id_jurnal', $id);
        $jurnal_delete->delete();
        return redirect()->back();
    }

    public function buku_besar()
    {
        // $data['bukubesar'] = BukuBesar::all();
        $data['buku_besar'] = Jurnal::all();
        $data['bukubesar'] = DB::table('jurnal')
            ->join('akun', 'akun.id_akun', '=', 'jurnal.id_akun')
            ->groupBy('nama_akun')
            ->get();

        $data['akun'] = Akun::all();
        $data['jurnal'] = Jurnal::all();
        return view('staff.buku_besar', $data);
        // $data['bukubesar'] = Jurnal::all();
        // $data['bukubesar'] = DB::table('jurnal')
        //     ->join('akun', 'akun.id_akun', '=', 'jurnal.id_akun')
        //     ->groupBy('nama_akun')
        //     ->get();

        // $data['akun'] = Akun::all();
        // $data['jurnal'] = Jurnal::all();
        // return view('staff.buku_besar', $data);
    }

    public function neraca_saldo()
    {
        $data['neracasaldo'] = NeracaSaldo::all();
        $data['akun'] = Akun::all();
        $data['bukubesar'] = BukuBesar::all();
        return view('staff.neraca_saldo', $data);
    }

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
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
    }

    public function tambah_akun(Request $request)
    {
        Akun::create([
            'no_akun' => $request->no_akun,
            'nama_akun' => $request->nama_akun,
            'jenis_akun' => $request->jenis_akun,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
        ]);

        return redirect()->back()->with('message', 'Data akun Berhasil di tambah');
    }

    public function tambah_pemasok(Request $request)
    {
        Pemasok::create([
            'nama_pemasok' => $request->nama_pemasok,
            'alamat_pemasok' => $request->alamat_pemasok,
            'telp_pemasok' => $request->telp_pemasok,
        ]);

        return redirect()->back()->with('message', 'Data pemasok Berhasil di tambah');
    }

    public function tambah_pelanggan(Request $request)
    {
        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'telp_pelanggan' => $request->telp_pelanggan,
        ]);

        return redirect()->back()->with('message', 'Data pelanggan Berhasil di tambah');
    }

    public function tambah_transaksi(Request $request)
    {
        $nama_file = uniqid() . '.jpg';
        $request->file('bukti_transaksi')->move(public_path('data/bukti_transaksi/'), $nama_file);
        Jurnal::create([
            'no_bukti' => $request->no_bukti,
            'tgl_transaksi' => $request->tgl_transaksi,
            'id_akun' => $request->akun,
            'id_pemasok' => $request->pemasok,
            'id_pelanggan' => $request->pelanggan,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
            'file' => $nama_file,
        ]);


        // public function index(): View
        // {
        //     $jurnal = Jurnal::orderBy('created_at', 'DESC')
        //         ->paginate(30);

        //     return view('jurnal.index', compact('jurnal'));
        // }

        // public function form(): View
        // {
        //     return view('jurnal.form');
        // }

        // public function upload(Request $request): RedirectResponse
        // {
        //     $this->validate($request, [
        //         'file' => 'required|file|max:2000'
        //     ]);

        //     $uploadedFile = $request->jurnal('file');

        //     $path = $uploadedFile->store('public/files');

        //     $jurnal = Jurnal::create([
        //         'title ' => $request->title ?? $uploadedFile->getClientOriginalName(),
        //         'file' => $path
        //     ]);

        //     return redirect()
        //         ->back()
        //         ->withSuccess(sprintf('File %s has been uploaded.', $file->title));
        // }
        // $request->validate([
        //     'filename'   => 'required',
        //     'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        // ]);

        // //mengambil data file yang diupload
        // $filename       = $request->file('file');
        // //mengambil nama file
        // $nama_file      = $filename->getClientOriginalName();

        // //memindahkan file ke folder tujuan
        // $filename->move('file_upload',$filename->getClientOriginalName());


        // $upload = new Upload;
        // $upload->filename       = $nama_file;

        // //menyimpan data ke database
        // $upload->save();

        // if ($request->hasfile('filename')) {
        //     $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
        //     $request->file('filename')->move(public_path('images'), $filename);
        //      Uploads::create(
        //             [
        //                 'upload' =>$filename
        //             ]
        //         );
        //     echo'Success';
        // }else{
        //     echo'Gagal';
        // }

        // $jurnal = jurnal::create($request->all());
        //     if($request->has('bukti')){
        //         $request->bukti('bukti')->move('img/',$request->file('bukti')->getClientOriginalName());
        //         $jurnal->bukti = $request->file('bukti')->getClientOriginalName();
        //         $jurnal->save();
        //     }

        return redirect()->back()->with('message', 'Data pelanggan Berhasil di tambah');
    }

    //JURNAL
    public function update(Request $request, $id)
    {

        if ($request->has('file') != null) {
            File::delete('data/bukti_transaksi/' . DB::table('jurnal')->where('id_jurnal', $id)->value('file'));
            $nama_file = uniqid() . '.jpg';
            $request->file('file')->move(public_path('data/bukti_transaksi/'), $nama_file);
        }
        Jurnal::where('id_jurnal', $id)
            ->update([
                // 'no_bukti' => $request->no_bukti,
                'tgl_transaksi' => $request->tgl_transaksi,
                'id_akun' => $request->akun,
                'id_pemasok' => $request->pemasok,
                'id_pelanggan' => $request->pelanggan,
                'debit' => $request->debit,
                'kredit' => $request->kredit,
                'file' => $nama_file,
            ]);

        return redirect()->back()->with('message', 'Data pelanggan Berhasil di Update');
    }

    public function edit(Request $request, jurnal $id)
    {
        Jurnal::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'no_bukti' => $request->no_bukti,
                'tgl_transaksi' => $request->tgl_transaksi,
                'id_akun' => $request->akun,
                'id_pemasok' => $request->pemasok,
                'id_pelanggan' => $request->pelanggan,
                'debit' => $request->debit,
                'kredit' => $request->kredit,
                'upload' => $nama_file,

            ]
        );

        return response()->json(['success' => true]);
    }


    //DATA AKUN
    public function update_akun(Request $request, $id)
    {
        Akun::where('id_akun', $id)
            ->update_akun([
                // 'no_bukti' => $request->no_bukti,
                'no_akun' => $request->no_akun,
                'nama_akun' => $request->nama_akun,
            ]);

        return redirect()->back()->with('message', 'Data pelanggan Berhasil di Update');
    }

    public function edit_akun(Request $request, akun $id)
    {
        Akun::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'no_akun' => $request->no_akun,
                'nama_akun' => $request->nama_akun,

            ]
        );

        return response()->json(['success' => true]);
    }

    //DATA PELANGGAN
    public function update_dataPelanggan(Request $request, $id)
    {
        Akun::where('id_pelanggan', $id)
            ->update_akun([
                // 'no_bukti' => $request->no_bukti,
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat_pelanggan' => $request->alamat_pelanggan,
                'telp_pelanggan' => $request->telp_pelanggan,
            ]);

        return redirect()->back()->with('message', 'Data pelanggan Berhasil di Update');
    }

    public function edit_dataPelanggan(Request $request, akun $id)
    {
        Akun::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat_pelanggan' => $request->alamat_pelanggan,
                'telp_pelanggan' => $request->telp_pelanggan,

            ]
        );

        return response()->json(['success' => true]);
    }

    //DATA PEMASOK
    public function update_dataPemasok(Request $request, $id)
    {
        Akun::where('id_akun', $id)
            ->update_akun([
                // 'no_bukti' => $request->no_bukti,
                'nama_pemasok' => $request->nama_pemasok,
                'alamat_pemasok' => $request->alamat_pemasok,
                'telp_pemasok' => $request->telp_pemasok,
            ]);

        return redirect()->back()->with('message', 'Data pelanggan Berhasil di Update');
    }

    public function edit_dataPemasok(Request $request, akun $id)
    {
        Akun::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'nama_pemasok' => $request->nama_pemasok,
                'alamat_pemasok' => $request->alamat_pemasok,
                'telp_pemasok' => $request->telp_pemasok,

            ]
        );

        return response()->json(['success' => true]);
    }
}
