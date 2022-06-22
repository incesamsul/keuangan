@extends('layouts.v_template')

@section('content')
<?php
$laba = 0;
$rugi = 0;
$kas = 0;
$piutang = 0;
$hutang = 0;
$modal = 0;
$pendapatan = 0;
?>
<div class="row" hidden>
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
                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalDebit = 0 ?>
                    <?php $totalKredit = 0 ?>
                    @foreach ($akun as $item)

                    @if ($item->nama_akun == 'Pendapatan')
                        <?php
                            $pendapatan = App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                        ?>
                    @endif
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
                                Rp. -
                            @endif
                        </td>
                        <td>
                            @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                                {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit')) }}
                                <?php
                                    $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                                 ?>
                            @else
                                Rp. -
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

<div class="row" hidden>
<div class="col-lg-12">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Modal</h4>
        </div>
        <div class="card-body">
            <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Debit</th>
                        <th>Kredit</th>
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
                                $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('Kredit');
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

{{-- AKTIVA  --}}
<div class="row" hidden>
<div class="col-lg-12">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Neraca (Aktiva)</h4>
            <a href="{{ URL::to('/staff/cetak_neraca') }}" target="_blank" class="btn btn-warning mt-3">
                <i class="fas fa-print"></i> Cetak
            </a>
        </div>
        <div class="card-body">
            <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalDebit = 0 ?>
                    <?php $totalKredit = 0 ?>
                    @foreach ($akun as $item)
                    @if (substr($item->no_akun,0,1) == 1)
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
                                Rp. -
                            @endif
                        </td>
                        <td>
                            @if ($item->nama_akun == 'Piutang Usaha')
                                <?php
                                    $piutang = App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit');
                                ?>
                            @endif
                            @if ($item->nama_akun == 'Kas')
                                <?php
                                    $kas = App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit');
                                ?>
                            @endif
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
                        <th colspan="2" class="text-center">TOTAL AKTIVA</th>
                        <th class="text-center">Rp.
                            {{ number_format($totalDebit) }}
                        </th>
                        <th class="text-center">
                            {{-- {{ number_format($totalKredit) }} --}}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


{{-- PASSIVA --}}
<div class="row" hidden>
<div class="col-lg-12">
    <div class="card ">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Neraca (passiva)</h4>
        </div>
        <div class="card-body">
            <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalDebit = 0 ?>
                    <?php $totalKredit = 0 ?>
                    @foreach ($akun as $item)
                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3)
                    <tr>
                        <td>{{ $item->no_akun }}</td>
                        <td>{{ $item->nama_akun }}</td>
                        <td>
                            @if ($item->nama_akun == 'Hutang')
                                <?php
                                    $hutang = App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit');
                                ?>
                            @endif
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
                        <th colspan="2" class="text-center">TOTAL PASSIVA</th>
                        <th class="text-center">
                            {{-- {{ number_format($totalDebit) }} --}}
                        </th>
                        <th class="text-center">Rp.
                            {{ number_format($totalKredit) }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kas</h4>
                    </div>
                    <div class="card-body">

                        <p class="mt-3 ">{{ "Rp. " .number_format($kas) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Piutang</h4>
                    </div>
                    <div class="card-body">

                        <p class="mt-3 ">{{ "Rp. " .number_format($piutang) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Utang</h4>
                    </div>
                    <div class="card-body">

                        <p class="mt-3 ">{{ "Rp. " .number_format($hutang) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Modal</h4>
                    </div>
                    <div class="card-body">

                        <p class="mt-3 ">{{ "Rp. " .number_format($laporanModal) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pendapatan</h4>
                    </div>
                    <div class="card-body">

                        <p class="mt-3 ">{{ "Rp. " .number_format($pendapatan) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hi Welcome</h4>
                </div>
                <div class="card-body">
                    <h5>CV Tritama Inti Persada</h5>
                    <p><br><img src={{ asset('img/logo.png') }} height="100" width="150" style="text-align: center"></p>
                    <p><br>Visi : Menjadi bagian pengadaan barang dan jasa profesional dan unggul.
                    </p>
                    <p>
                         Misi : Menyekenggarakan pangadaan barang dan jasa secara akuntabel, sesuai dengan aturan dan ketentuan yang berlaku sehingga dapat dipertanggungjawabkan kepada pihak yang berkepentingan.
                    </p>
                    <p>
                         Tujuan : Menyediakan barang dan jasa yang berkualitas sesuai kebutuhan unit kerja yang mendukung pencapaian keberhasilan implementasi kebijakan, program, dan kegiatan.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Set periode aktif</h4>
                    <button class="btn btn-warning" id="simpan-periode">Simpan</button>
                </div>
                <div class="card-body">
                    <select name="periode" id="periode" class="form-control">
                        @foreach ($periode as $row)
                            <option {{ $row->is_active == '1' ? 'selected' : '' }} value="{{ $row->id_periode }}">{{ $row->periode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script>

    $('#simpan-periode').on('click',function(){
        let periode = $('#periode').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: '/set_periode_aktif'
            , method: 'post'
            , dataType: 'json'
            , data: {
                periode: periode
            }
            , success: function(data) {
                if (data == 1) {
                    Swal.fire('Berhasil', 'periode berhasil di set', 'success').then((result) => {
                        location.reload();
                    });
                }
            }
            , error: function(err) {
                console.log(err);
            }
        })
    })
    $('#liDashboard').addClass('active');

</script>
@endsection
