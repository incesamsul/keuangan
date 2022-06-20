<?php

use App\Models\FavoritModel;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\isNull;


// function getJurnalByNoBukti($noBukti){
//     return DB::table('jurnal')
//     ->join('akun','akun.id_akun','=','jurnal.id_akun')
//     ->select('tgl_transaksi','nama_akun','no_akun','jurnal.debit','jurnal.kredit')
//     // ->where('no_bukti',$noBukti)
//     ->get();
// }

// $this->validate($request, [
//     'file' => 'required|file|max:2000', // max 2MB
// ]);

function getPeriodeAktif(){
    return Periode::where('is_active','1')->first();
}


function has_next($array) {
    if (is_array($array)) {
        if (next($array) === false) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
function has_prev($array) {
    if (is_array($array)) {
        if (prev($array) === false) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
// function getBukuBesarByNamaAkun($namaAkun){
//     return DB::table('jurnal')
//     ->join('akun','akun.id_akun','=','jurnal.id_akun')
//     ->select('tgl_transaksi','nama_akun','no_akun','jurnal.debit as debit_jurnal','jurnal.kredit as kredit_jurnal', 'akun.debit as debit_akun', 'akun.kredit as kredit_akun')
//     ->where('nama_akun',$namaAkun)
//     ->get();
// }

function removeSpace($string)
{
    return str_replace(" ", "", $string);
}

function getUserRoleName($userRoleId)
{
    return DB::table('users')
        ->Join('role', 'role.id_role', '=', 'users.id_role')
        ->where('users.id_role', $userRoleId)
        ->select('nama_role')
        ->first()->nama_role;
}


function sweetAlert($pesan, $tipe)
{
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
        Swal.fire(
            "' . $pesan . '",
            "proses berhasil di lakukan",
            "' . $tipe . '",
        );
    })</script>';
}
