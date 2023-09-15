@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Data pemasok</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-tambah bg-main text-white" data-toggle="modal"
                            data-target="#formModal">
                            <i class="fas fa-plus"></i>
                        </button>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table-data">
                            <thead>
                                <tr>
                                    <th>Nama Pemasok</th>
                                    <th>Alamat Pemasok</th>
                                    <th>No Telp Pemasok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemasok as $row)
                                    <tr>
                                        <td>{{ $row->nama_pemasok }}</td>
                                        <td>{{ $row->alamat_pemasok }}</td>
                                        <td>{{ $row->telp_pemasok }}</td>
                                        <td>
                                            <a href="pemasok/delete/{{ $row->id_pemasok }}" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i>Hapus</a>
                                            <a data-edit='@json($row)' data-toggle="modal"
                                                data-target="#formModal" class="btn btn-edit btn-primary text-light"><i
                                                    class="fas fa-pen"></i>Edit</a>
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



    <!-- Modal -->
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
                    <form id="formData" action="{{ URL::to('/staff/tambah_pemasok') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_pemasok">Nama Pemasok</label>
                            <input type="hidden" class="form-control" name="id" id="id">
                            <input type="text" class="form-control" name="nama_pemasok" id="nama_pemasok">
                        </div>
                        <div class="form-group">
                            <label for="alamat_pemasok">Alamat Pemasok</label>
                            <input type="text" class="form-control" name="alamat_pemasok" id="alamat_pemasok">
                        </div>
                        <div class="form-group">
                            <label for="telp_pemasok">No Telp Pemasok</label>
                            <input type="text" class="form-control" name="telp_pemasok" id="telp_pemasok">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn bg-main text-white" id="modalBtn">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {

            $('.btn-tambah').on('click', function() {
                $('#formData').attr('action', '/staff/tambah_pemasok');
                $('.btn-form').html('tambah');
            })

            $(document).on('click', '.btn-edit', function() {
                let dataEdit = $(this).data('edit');
                $('#id').val(dataEdit.id_pemasok);
                $('#nama_pemasok').val(dataEdit.nama_pemasok);
                $('#alamat_pemasok').val(dataEdit.alamat_pemasok);
                $('#telp_pemasok').val(dataEdit.telp_pemasok);
                $('#formData').attr('action', '/staff/edit_pemasok');
                $('.btn-form').html('edit');
            })
            $('#liDataAkun').addClass('active');
        })
    </script>
@endsection
