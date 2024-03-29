@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Laporan Laba / Rugi</h4>
                        <a href="{{ URL::to('/staff/cetak_laba_rugi') }}" target="_blank" class="btn bg-main mt-3">
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
                                <?php $totalDebit = 0; ?>
                                <?php $totalKredit = 0; ?>
                                <?php $laba = 0; ?>
                                <?php $rugi = 0; ?>
                                @foreach ($akun as $item)
                                    @if (substr($item->no_akun, 0, 1) == 4 || substr($item->no_akun, 0, 1) == 6)
                                        <tr>
                                            <td>{{ $item->no_akun }}</td>
                                            <td>{{ $item->nama_akun }}</td>
                                            <td>
                                                @if (substr($item->no_akun, 0, 1) == 1 || substr($item->no_akun, 0, 1) == 6)
                                                    {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode', getPeriodeAktif()->id_periode)->sum('debit') -App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode', getPeriodeAktif()->id_periode)->sum('kredit')) }}
                                                    <?php
                                                    $totalDebit +=
                                                        App\Models\Jurnal::all()
                                                            ->where('id_akun', $item->id_akun)
                                                            ->where('id_periode', getPeriodeAktif()->id_periode)
                                                            ->sum('debit') -
                                                        App\Models\Jurnal::all()
                                                            ->where('id_akun', $item->id_akun)
                                                            ->where('id_periode', getPeriodeAktif()->id_periode)
                                                            ->sum('kredit');
                                                    ?>
                                                @else
                                                    Rp. -
                                                @endif
                                            </td>
                                            <td>
                                                @if (substr($item->no_akun, 0, 1) == 2 || substr($item->no_akun, 0, 1) == 3 || substr($item->no_akun, 0, 1) == 4)
                                                    {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode', getPeriodeAktif()->id_periode)->sum('kredit') -App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode', getPeriodeAktif()->id_periode)->sum('debit')) }}
                                                    <?php
                                                    $totalKredit +=
                                                        App\Models\Jurnal::all()
                                                            ->where('id_akun', $item->id_akun)
                                                            ->where('id_periode', getPeriodeAktif()->id_periode)
                                                            ->sum('kredit') -
                                                        App\Models\Jurnal::all()
                                                            ->where('id_akun', $item->id_akun)
                                                            ->where('id_periode', getPeriodeAktif()->id_periode)
                                                            ->sum('debit');
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
                                        @if ($totalKredit - $totalDebit < 0)
                                            RUGI
                                        @else
                                            LABA
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        {{-- field untung / debit --}}
                                        @if ($totalKredit - $totalDebit > 0)
                                            Rp. {{ number_format($totalKredit - $totalDebit) }}
                                            <?php $laba = $totalKredit - $totalDebit; ?>
                                        @else
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        {{-- field kredit / rugi --}}
                                        @if ($totalKredit - $totalDebit < 0)
                                            Rp. {{ number_format($totalDebit - $totalKredit) }}
                                            <?php $rugi = $totalDebit - $totalKredit; ?>
                                        @else
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center"></th>
                                    <th class="text-center">Rp.
                                        {{ number_format($totalDebit + $laba) }}
                                    </th>
                                    <th class="text-center">Rp.
                                        {{ number_format($totalKredit + $rugi) }}
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
