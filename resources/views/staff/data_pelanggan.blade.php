@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex justify-content-between">
              <h4>Data pelanggan</h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-tambah btn-warning" data-toggle="modal" data-target="#formModal">
                  <i class="fas fa-plus"></i>
                </button>

            </div>
            <div class="card-body" >
              <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Alamat Pelanggan</th>
                        <th>No Telp Pelanggan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $row)
                    <tr>
                      <td>{{ $row->nama_pelanggan }}</td>
                      <td>{{ $row->alamat_pelanggan }}</td>
                      <td>{{ $row->telp_pelanggan }}</td>
                      <td>
                        <a href="pelanggan/delete/{{ $row->id_pelanggan }}" class="btn btn-danger"><i
                              class="fas fa-trash"></i>Hapus</a>
                        <a data-edit='@json($row)' data-toggle="modal" data-target="#formModal" class="btn btn-edit btn-primary text-light"><i class="fas fa-pen"></i>Edit</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formData" action="{{ URL::to('/staff/tambah_pelanggan') }}" method="POST">
          @csrf
          <div class="form-group">
              <label for="nama_pelanggan">Nama pelanggan</label>
              <input type="hidden" class="form-control" name="id" id="id">
              <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan">
          </div>
          <div class="form-group">
              <label for="alamat_pelanggan">Alamat pelanggan</label>
              <input type="text" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan">
          </div>
          <div class="form-group">
              <label for="telp_pelanggan">No Telp pelanggan</label>
              <input type="text" class="form-control" name="telp_pelanggan" id="telp_pelanggan">
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning" id="modalBtn">Tambah</button>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){

$('.btn-tambah').on('click',function(){
    $('#formData').attr('action','/staff/tambah_pelanggan');
    $('.btn-form').html('tambah');
})

  $(document).on('click','.btn-edit',function(){
      let dataEdit = $(this).data('edit');
      $('#id').val(dataEdit.id_pelanggan);
      $('#nama_pelanggan').val(dataEdit.nama_pelanggan);
      $('#alamat_pelanggan').val(dataEdit.alamat_pelanggan);
      $('#telp_pelanggan').val(dataEdit.telp_pelanggan);
      $('#formData').attr('action','/staff/edit_pelanggan');
      $('.btn-form').html('edit');
  })
  $('#liDataPelanggan').addClass('active');
})
</script>



@endsection




