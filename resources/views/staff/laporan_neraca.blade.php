@extends('layouts.v_template')

@section('content')
<section class="section">


    <?php
        $labaRugi = 0;
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
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                                        <?php
                                        $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit');
                                        ?>
                                    @else
                                        Rp. ----
                                    @endif
                                </td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit')) }}
                                        <?php
                                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit');
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
                                        $labaRugi = $totalKredit - $totalDebit;
                                        ?>
                                    @else

                                    @endif
                                </th>
                                <th class="text-center">Rp.
                                    {{-- field kredit / rugi --}}
                                    @if (($totalKredit - $totalDebit) < 0)
                                        {{ $totalKredit - $totalDebit }}
                                        <?php
                                        $labaRugi = $totalKredit - $totalDebit;
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
                                        @if ($labaRugi < 0)
                                            Rp. {{ number_format($labaRugi) }}
                                            <?php
                                            $totalDebit += $labaRugi;
                                            ?>
                                        @else
                                            Rp. 0
                                        @endif
                                    @else
                                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                                        <?php
                                        $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit');
                                        ?>
                                    @else
                                        Rp. ----
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($item->nama_akun == "Laba Tahun Berjalan")
                                        @if ($labaRugi > 0)
                                            untung
                                        @else
                                            Rp. 0
                                        @endif
                                    @else
                                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit')) }}
                                        <?php
                                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit');
                                         ?>
                                    @else
                                        Rp. ----
                                    @endif
                                    @endif
                                </td>

                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <th colspan="2" class="text-center">MODAL AKHIR</th>
                                <th class="text-center">Rp. 0
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
    <div class="row">
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
                            @if (substr($item->no_akun,0,1) == 1)
                            <tr>
                                <td>{{ $item->no_akun }}</td>
                                <td>{{ $item->nama_akun }}</td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                                        <?php
                                            $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit');
                                            ?>
                                    @else
                                        Rp. ----
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
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit')) }}
                                            <?php
                                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit');
                                            ?>
                                    @else
                                        Rp. ----
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4>Laporan Neraca (passiva)</h4>
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
                            @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3)
                            <tr>
                                <td>{{ $item->no_akun }}</td>
                                <td>{{ $item->nama_akun }}</td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 6)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                                        <?php
                                            $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit');
                                            ?>
                                    @else
                                        Rp. ----
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
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit')) }}
                                            <?php
                                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit');
                                            ?>
                                    @else
                                        Rp. ----
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

  </section>

  @endsection
  @section('script')
  <script>
      // $('#liDataAkun').addClass('active');
  </script>
  @endsection
