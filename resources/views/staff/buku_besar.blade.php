@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Buku Besar</h4>
                    </div>
                    <div class="card-body">
                        <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No Akun</th>
                                    <th>Nama Akun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($akun as $item)
                                    <?php $i++; ?>

                                    <tr>
                                        <td>{{ $item->no_akun }}</td>
                                        <td>{{ $item->nama_akun }}</td>
                                        <td>
                                            {{-- modal --}}
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal-{{ $item->id_akun }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- Button trigger modal -->


    <!-- Modal -->
    @foreach ($akun as $item)
        <div class="modal fade" id="exampleModal-{{ $item->id_akun }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buku Besar Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Ref</th>
                                    {{-- debit kredit jurnal --}}
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode) as $ite)
                                    <tr>
                                        <td>{{ $ite->tgl_transaksi }}</td>
                                        <td>{{ $ite->akun->nama_akun }}</td>
                                        <td>{{ $ite->akun->no_akun }}</td>

                                        <td>{{ 'Rp. ' . number_format($ite->debit) }}</td>
                                        <td>{{ 'Rp. ' . number_format($ite->kredit) }}</td>
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>total</th>
                                    <th>
                                        {{-- sum debit jurnal --}}
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit')) }}
                                    </th>
                                    <th>
                                        {{-- sum kredit jurnal --}}
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit')) }}
                                    </th>
                                    <th>
                                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->where('id_periode',getPeriodeAktif()->id_periode)->sum('kredit')) }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script>
        // $('#liDataAkun').addClass('active');
        $(document).ready(function() {
            $('#buku_besar').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "scrollX": true,
                "scrollY": "500px",
                "scrollCollapse": true,
                "fixedColumns": {
                    leftColumns: 1,
                    rightColumns: 1
                },

                "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4, 5],
                    "orderable": true,
                }],

            });

            $('#perUser').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "scrollX": true,
                "scrollY": "500px",
                "scrollCollapse": true,
                "fixedColumns": {
                    leftColumns: 1,
                    rightColumns: 1
                },

                "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4, 5],
                    "orderable": true,
                }],

            });
        });
    </script>
@endsection
