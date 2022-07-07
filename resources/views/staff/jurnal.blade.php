@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        {{-- <div class="title-and-filter d-flex flex-row">

                            <input id="input-filter-tahun" type="number" min="1900" max="2099" step="1" value="{{ $tahun }}" class="form-control"/>
                            <button id="filter-tahun" class="btn btn-warning mx-2"><i class="fas fa-sync"></i></button>
                        </div> --}}
                        <!-- Button trigger modal -->
                        <h4>Jurnal</h4>
                        <button type="button" class="btn btn-tambah btn-warning" data-toggle="modal" data-target="#formModal">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">

                        {{-- @dump($row) --}}
                        {{-- <p>No Bukti : {{ $row->no_bukti }}</p> --}}
                        <table class="table table-bordered" id="table-data-blank">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Ref</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th>Pelanggan</th>
                                    <th>Pemasok</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurnal as $row)
                                    {{-- @foreach (getJurnalByNoBukti($row->no_bukti) as $jurnal) --}}
                                    <tr>
                                        <td>{{ $row->tgl_transaksi }}</td>
                                        <td>{{ $row->akun->nama_akun }}</td>
                                        <td>{{ $row->akun->no_akun }}</td>
                                        <td>{{ 'Rp. ' . number_format($row->debit) }}</td>
                                        <td>{{ 'Rp. ' . number_format($row->kredit) }}</td>
                                        <td>{{ $row->pelanggan != null ? $row->pelanggan->nama_pelanggan : '-' }}</td>
                                        <td>{{ $row->pemasok != null ? $row->pemasok->nama_pemasok : '-' }}</td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button data-upload="{{ asset('data/bukti_transaksi/' . $row->file) }} "
                                                type="button" class="btn btn-preview-upload btn-primary" data-toggle="modal"
                                                data-target="#modalView">lihat
                                            </button>

                                        </td>
                                        <td>
                                            <a href="jurnal/delete/{{ $row->id_jurnal }}" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i> Hapus</a>
                                            <a data-edit='@json($row)' data-toggle="modal" data-target="#formModal" class="btn btn-primary tombol-edit text-light"><i class="fas fa-pen"></i>Edit</a>
                                            {{-- <a href="" id="editCompany" data-toggle="modal" data-target='#practice_modal' data-id="{{ $row->id }}" ><button class="btn btn-primary"><i class="fas fa-pen"></i>Edit</button></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3" class="text-center">TOTAL</th>
                                    <th class="text-center">Rp.
                                        {{ number_format($jurnal->sum('debit')) }}
                                    </th>
                                    <th class="text-center">Rp.
                                        {{ number_format($jurnal->sum('kredit')) }}
                                    </th>
                                </tr>

                            </tbody>
                        </table>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="modalView" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalViewLabel">Bukti transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="" id="previewUpload" class="thumbnail" style="width:100%; height: 100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formData" action="{{ URL::to('/staff/tambah_transaksi') }}" method="POST"
                        enctype="multipart/form-data">

                        {{-- enctype="multipart/form-data --}}
                        @csrf
                        {{-- <div class="form-group">
              <label for="no_bukti">No. Bukti</label>
              <input type="hidden" class="form-control" name="id" id="id">
              <input type="text" class="form-control" name="no_bukti" id="no_bukti">
          </div> --}}
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal</label>
                            <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi">
                        </div>
                        <div class="form-group">
                            <label for="tgl_transaksi">Pilih Klien</label>
                            <select name="pelanggan" id="klien" class="form-control klien">
                                <option>-- pilih klien --</option>
                                <option>pemasok</option>
                                <option>pelanggan</option>
                            </select>
                        </div>
                        <div class="form-group" id="pelanggan_wrapper" class="hidden">
                            <label for="tgl_transaksi">Pilih Pelanggan</label>
                            <select name="pelanggan" id="pelanggan" class="form-control">
                                <option value="">-- pilih pelanggan --</option>
                                @foreach ($pelanggan as $row)
                                    <option data-keterangan="{{ $row->nama_pelanggan }}"
                                        data-reff="{{ $row->no_pelanggan }}" value="{{ $row->id_pelanggan }}">
                                        {{ $row->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="pemasok_wrapper" class="hidden">
                            <label for="tgl_transaksi">Pilih pemasok</label>
                            <select name="pemasok" id="pemasok" class="form-control">
                                <option value="">-- pilih pemasok --</option>
                                @foreach ($pemasok as $row)
                                    <option data-keterangan="{{ $row->nama_pemasok }}"
                                        data-reff="{{ $row->no_pemasok }}" value="{{ $row->id_pemasok }}">
                                        {{ $row->nama_pemasok }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_transaksi">Pilih akun</label>
                            <select name="akun" id="akun" class="form-control">
                                <option value="">-- pilih akun --</option>
                                @foreach ($akun as $row)
                                    <option data-keterangan="{{ $row->nama_akun }}" data-reff="{{ $row->no_akun }}"
                                        value="{{ $row->id_akun }}">{{ $row->nama_akun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input readonly type="text" class="form-control" name="keterangan" id="keterangan">
                        </div>
                        <div class="form-group">
                            <label for="reff">Reff</label>
                            <input readonly type="text" class="form-control" name="reff" id="reff">
                        </div>
                        <div class="form-group">
                            <label for="debit">Debit</label>
                            <input  type="text" class="form-control input_format_number" name="debit" id="debit" >
                        </div>
                        <div class="form-group">
                            <label for="kredit">Kredit</label>
                            <input type="text" class="form-control input_format_number" name="kredit" id="kredit">
                        </div>

                        <div class="form-group">
                            <label for="file" class="form-label">Bukti Transaksi</label>
                            <input class="form-control" type="file" id="file" name="bukti_transaksi">
                        </div>
                        {{-- <div class="form-group">
            <label for="bukti">Bukti Transaksi</label>
            <input type="file" class="form-control" name="bukti" id="bukti">
            <label for="bukti" class="form-control">Upload</label>
          </div> --}}
                        {{-- <div class ="form-group" >

            <form action="prosesupload.php" method="post" enctype="multipart/form-data">
              <p>Upload File : <input type="file" name="file"></p>
              <input type="file" name="upload" value="upload">
            </form>
          </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning" id="modalBtn"
                        href="{{ route('jurnal.form') }}">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>

        $('#filter-tahun').on('click',function(){
            document.location.href = '/staff/jurnal/' + $('#input-filter-tahun').val();
        })

        $('.btn-preview-upload').on('click', function() {
            let uploadUrl = $(this).data('upload');
            $('#previewUpload').attr('src', uploadUrl);
        })

        $('.btn-tambah').on('click',function(){
            $('#formData').attr('action','/staff/tambah_transaksi');
        })

        $(document).on('click','.tombol-edit',function(){
            let dataEdit = $(this).data('edit');
            console.log(dataEdit);
            if(dataEdit.id_pelanggan == null){
                $('#klien').val('pemasok').change();
            }
            if(dataEdit.id_pemasok == null){
                console.log('pelanggan')
                $('#klien').val('pelanggan').change();
            }
            $('#pelanggan').val(dataEdit.id_pelanggan)
            $('#pemasok').val(dataEdit.id_pemasok)
            $('#tgl_transaksi').val(dataEdit.tgl_transaksi)
            $('#akun').val(dataEdit.id_akun)
            $('#keterangan').val(dataEdit.akun.nama_akun)
            $('#reff').val(dataEdit.akun.no_akun)
            $('#debit').val(dataEdit.debit)
            $('#kredit').val(dataEdit.kredit)
            $('#formData').attr('action','/staff/jurnal/update/' + dataEdit.id_jurnal);
        })



        $('.klien').on('change', function() {
            let klien = $(this).val();
            if (klien == 'pemasok') {
                $('#pemasok_wrapper').css('visibility', 'visible');
                $('#pemasok_wrapper').css('display', 'block');
                $('#pelanggan_wrapper').css('visibility', 'hidden');
                $('#pelanggan_wrapper').css('display', 'none');
            } else if (klien == 'pelanggan') {
                $('#pelanggan_wrapper').css('display', 'block');
                $('#pelanggan_wrapper').css('visibility', 'visible');
                $('#pemasok_wrapper').css('display', 'none');
                $('#pemasok_wrapper').css('visibility', 'hidden');
            } else {
                $('#pelanggan_wrapper').css('visibility', 'hidden');
                $('#pelanggan_wrapper').css('display', 'none');
                $('#pemasok_wrapper').css('display', 'none');
                $('#pemasok_wrapper').css('visibility', 'hidden');
            }
        })

        $('#akun').on('change', function() {
            $('#reff').val($(this).find(':selected').data('reff'));
            $('#keterangan').val($(this).find(':selected').data('keterangan'));
        });


        // $('#akun').on('change',function(){
        //   $('#reff').val($(this).find(':selected').data('reff'));
        //   $('#keterangan').val($(this).find(':selected').data('keterangan'));
        // });


    </script>

    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            $(document).ready(function() {


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // $('body').on('click', '#submit', function(event) {
                //     event.preventDefault()
                //     var id = $("#jurnal_id").val();
                //     var no_bukti = $('#no_bukti').val();
                //     var tgl_transaksi = $("#tgl_transaksi").val();
                //     var nama_akun = $("#nama_akun").val();
                //     var no_akun = $("#no_akun").val();
                //     var debit = $("#debit").val();
                //     var kredit = $("#kredit").val();

                //     $.ajax({
                //         url: 'jurnal/' + id,
                //         type: "POST",
                //         data: {
                //             id: id,
                //             no_bukti: no_bukti
                //             tgl_transaksi: tgl_transaksi,
                //             nama_akun: nama_akun,
                //             no_akun: no_akun,
                //             debit: debit,
                //             kredit: kredit,
                //         },
                //         dataType: 'json',
                //         success: function(data) {

                //             $('#companydata').trigger("reset");
                //             $('#practice_modal').modal('hide');
                //             window.location.reload(true);
                //         }
                //     });
                // });

                // $('body').on('click', '#editCompany', function(event) {

                //     event.preventDefault();
                //     var id = $(this).data('id');
                //     console.log(id)
                //     $.get('jurnal/' + id + '/edit', function(data) {

                //         $('#userCrudModal').html("Edit category");
                //         $('#submit').val("Edit category");
                //         $('#practice_modal').modal('show');
                //         $('#jurnal_id').val(data.data.id);
                //         $('#no_bukti').val(data.data.no_bukti);
                //         $('#tgl_transaksi').val(data.data.tgl_transaksi);
                //         $('#nama_akun').val(data.data.nama_akun);
                //         $('#no_akun').val(data.data.no_akun);
                //         $('#debit').val(data.data.debit);
                //         $('#kredit').val(data.data.kredit);
                //     })
                // });

            });



            // $('#liDataAkun').addClass('active');
        </script>
    @endpush
@endsection
