<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Neraca</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .text-center {
        text-align: center;
    }

    .text-main {
        color: lightblue;
    }

    .m-0 {
        margin: 0;
    }

    .mt-50 {
        margin-top: 50px;
    }

    .table {
        width: 100%;
    }

    .table.border-bottom tr td {
        border-bottom: 1px solid grey;
    }
</style>

<body>
    <h1 class="text-center m-0">Laporan <span class="text-main">Neraca</span></h1>
    <h3 class="text-center">CV Toko Andalas Jaya</h3>
    <p class="text-center m-0">Dari 1 april 2022 sampai 3 april 2022</p>



    <?php
        $laba = 0;
        $rugi = 0;
    ?>
    <div class="row" hidden style="display: none">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4>Laporan Laba / Rugi</h4>
                    <a href="{{ URL::to('/staff/cetak_laba_rugi') }}" target="_blank" class="btn btn-warning mt-3">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
                <div class="card-body">
                    <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <td>No Akun</td>
                                <td>Nama Akun</td>
                                <td>Debit</td>
                                <td>Kredit</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalDebit = 0 ?>
                            <?php $totalKredit = 0 ?>
                            @foreach ($akun as $item)
                            @if (substr($item->no_akun,0,1) == 4 || substr($item->no_akun,0,1) == 6)
                            <tr>
                                <td>{{ $item->no_akun }}</td>
                                <td>{{ $item->nama_akun }}</td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit')) }}
                                        <?php
                                        $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit');
                                        ?>
                                    @else
                                        Rp. ----
                                    @endif
                                </td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit')) }}
                                        <?php
                                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                                         ?>
                                    @else
                                        Rp. ----
                                    @endif
                                </td>

                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <th colspan="2" class="text-center">TOTAL</th>
                                <th class="text-center">Rp.
                                    {{ number_format($totalDebit) }}
                                </th>
                                <th class="text-center">Rp.
                                    {{ number_format($totalKredit) }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-center">
                                    @if (($totalKredit - $totalDebit) < 0)
                                        RUGI
                                    @else
                                        LABA
                                    @endif
                                </th>
                                <th class="text-center">
                                    {{-- field untung / debit --}}
                                    @if (($totalKredit - $totalDebit) > 0)
                                        {{ $totalKredit - $totalDebit }}
                                        <?php
                                        $laba = $totalKredit - $totalDebit;
                                        ?>
                                    @else

                                    @endif
                                </th>
                                <th class="text-center">Rp.
                                    {{-- field kredit / rugi --}}
                                    @if (($totalKredit - $totalDebit) < 0)
                                        {{ $totalDebit - $totalKredit }}
                                        <?php
                                        $rugi = $totalDebit - $totalKredit;
                                        ?>
                                    @else

                                    @endif
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    $laporanModal = 0;
    ?>

    <div class="row" hidden style="display: none">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4>Laporan Modal</h4>
                </div>
                <div class="card-body">
                    <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <td>No Akun</td>
                                <td>Nama Akun</td>
                                <td>Debit</td>
                                <td>Kredit</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalDebit = 0 ?>
                            <?php $totalKredit = 0 ?>
                            @foreach ($akun as $item)
                            @if (substr($item->no_akun,0,1) == 3)
                            <tr>
                                <td>{{ $item->no_akun }}</td>
                                <td>{{ $item->nama_akun }}</td>
                                <td>
                                    @if ($item->nama_akun == "Laba Tahun Berjalan")
                                        @if ($rugi > 0)
                                            Rp. {{ number_format($rugi) }}
                                            <?php
                                            $totalDebit += $rugi;
                                            ?>
                                        @else
                                            Rp. -
                                        @endif
                                    @else
                                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit')) }}
                                        <?php
                                        $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit');
                                        ?>
                                    @else
                                        Rp. -
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($item->nama_akun == "Laba Tahun Berjalan")
                                        @if ($laba > 0)
                                        Rp. {{ number_format($laba) }}
                                        <?php
                                        $totalKredit += $laba;
                                        ?>
                                        @else
                                            Rp. -
                                        @endif
                                    @else
                                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit')) }}
                                        <?php
                                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                                         ?>
                                    @else
                                        Rp. -
                                    @endif
                                    @endif
                                </td>

                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <th colspan="2" class="text-center">MODAL AKHIR</th>
                                <th class="text-center">Rp. -
                                    {{-- {{ number_format($totalDebit) }} --}}
                                </th>
                                <th class="text-center">Rp.
                                    {{ number_format($totalKredit - $totalDebit) }}
                                    <?php
                                    $laporanModal = $totalKredit - $totalDebit;
                                    ?>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE NERACA --}}
    {{-- AKTIVA --}}
    <table class="table border-bottom mt-50" cellpadding="10">
        <thead>
            {{-- <tr>
                <td>Nama Akun</td>
                <td>Debit</td>
                <td>Kredit</td>
            </tr> --}}
            <tr>
                <td colspan="3">AKTIVA</td>
            </tr>
        </thead>
        <tbody>
            <?php $totalDebit = 0 ?>
            <?php $totalKredit = 0 ?>
            @foreach ($akun as $item)
            @if (substr($item->no_akun,0,1) == 1)
            <tr>

                <td>{{ $item->nama_akun }}</td>
                <td>
                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit')) }}
                        <?php
                            $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit');
                            ?>
                    @else
                        Rp. -
                    @endif
                </td>
                <td>
                    @if ($item->nama_akun == "Modal Tn. A")
                        Rp. {{ number_format($laporanModal) }}
                        <?php
                        $totalKredit += $laporanModal;
                         ?>
                    @else
                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit')) }}
                            <?php
                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                            ?>
                    @else
                        Rp. -
                    @endif
                    @endif
                </td>

            </tr>
            @endif
            @endforeach
            <tr>
                <th  class="text-center">TOTAL AKTIVA</th>
                <th class="text-center">Rp.
                    {{ number_format($totalDebit) }}
                </th>
                <th class="text-center">
                    {{-- {{ number_format($totalKredit) }} --}}
                </th>
            </tr>
        </tbody>
    </table>

    {{-- PASSIVA --}}
    <table class="table border-bottom mt-50" cellpadding="10">
        <thead>
            {{-- <tr>
                <td>Nama Akun</td>
                <td>Debit</td>
                <td>Kredit</td>
            </tr> --}}
            <tr>
                <td colspan="3">PASSIVA</td>
            </tr>
        </thead>
        <tbody>
            <?php $totalDebit = 0 ?>
            <?php $totalKredit = 0 ?>
            @foreach ($akun as $item)
            @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3)
            <tr>

                <td>{{ $item->nama_akun }}</td>
                <td>
                    @if (substr($item->no_akun,0,1) == 6)
                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit')) }}
                        <?php
                            $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit');
                            ?>
                    @else
                        Rp. -
                    @endif
                </td>
                <td>
                    @if ($item->nama_akun == "Modal Tn. A")
                        Rp. {{ number_format($laporanModal) }}
                        <?php
                        $totalKredit += $laporanModal;
                         ?>
                    @else
                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit')) }}
                            <?php
                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                            ?>
                    @else
                        Rp. -
                    @endif
                    @endif
                </td>

            </tr>
            @endif
            @endforeach
            <tr>
                <th class="text-center">TOTAL PASSIVA</th>
                <th class="text-center">
                    {{-- {{ number_format($totalDebit) }} --}}
                </th>
                <th class="text-center">Rp.
                    {{ number_format($totalKredit) }}
                </th>
            </tr>
        </tbody>
    </table>


    <table class="table mt-50" style="border: none !important">
        <tr>
            <td style="width:60%"></td>
            <td class="text-center">Gowa 29 Maret 2022</td>
        </tr>
        <tr>
            <td style="width:60%"></td>
            <td class="text-center"><strong>CV. Toko Andalas Jaya</strong></td>
        </tr>
        <tr style="height: 20px">
            <td style="width:60%;height:100px"></td>
            <td class="text-center"><br></td>
        </tr>
        <tr>
            <td style="width:60%"></td>
            <td class="text-center">Sendy</td>
        </tr>
        <tr>
            <td style="width:60%"></td>
            <td class="text-center">Direktur</td>
        </tr>


    </table>
    {{-- <table class="table mt-50" cellpadding="10">
        <tr>
            <td colspan="2">Pendapatan</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
    </table> --}}
</body>

</html>
