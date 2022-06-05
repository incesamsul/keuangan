@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4>Laporan Laba / Rugi</h4>
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
                            @foreach ($akun as $item)
                            @if (substr($item->no_akun,0,1) == 4 || substr($item->no_akun,0,1) == 6)
                            <tr>
                                <td>{{ $item->no_akun }}</td>
                                <td>{{ $item->nama_akun }}</td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                                    @else
                                        Rp. ----
                                    @endif
                                </td>
                                <td>
                                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                                    @else
                                        Rp. ----
                                    @endif
                                </td>

                            </tr>
                            @endif
                            @endforeach

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
