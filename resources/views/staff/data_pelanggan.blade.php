@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex justify-content-between">
              <h4>Data pelanggan</h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formModal">
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
                        <a data-toggle="modal" data-target="modalUpdate-{{ $row->id_pelanggan }}"
                              class="btn btn-primary text-light"><i class="fas fa-pen"></i>Edit</a>
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

{{-- Modal Update --}}
  @foreach ($pelanggan as $item)
  <div class="modal fade" id="modalUpdate-{{ $item->id_pelanggan }}" tabindex="-1"
    aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formData" action="{{ route('pelanggan.update_dataPelanggan', $item->id_pelanggan) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                  <label for="nama_pelanggan">Nama pelanggan</label>
                  <input type="hidden" class="form-control" name="id" id="id">
                  <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan"
                      value="{{ $item->nama_pelanggan}}">
              </div>
              <div class="form-group">
                  <label for="alamat_pelanggan">Alamat pelanggan</label>
                  <input type="text" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan"
                      value="{{ $item->alamat_pelanggan}}">
              </div>
              <div class="form-group">
                  <label for="telp_pelanggan">No Telp pelanggan</label>
                  <input type="text" class="form-control" name="telp_pelanggan" id="telp_pelanggan"
                      value=" {{ $item->telp_pelanggan}} ">
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
  @endforeach
@endsection

@section('script')
<script>
    $('#liDataPelanggan').addClass('active');
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

          $('body').on('click', '#submit', function(event) {
              event.preventDefault()
              var id = $("#pelanggan_id").val();
              var nama_pelanggan = $("#nama_pelanggan").val();
              var alamat_pelanggan = $("#alamat_pelanggan").val();
              var telp_pelanggan = $("#telp_pelanggan").val();

              $.ajax({
                  url: 'pelanggan/' + id,
                  type: "POST",
                  data: {
                      id: id,
                      nama_pelanggan: nama_pelanggan,
                      alamat_pelanggan: alamat_pelanggan,
                      telp_pelanggan: telp_pelanggan,
                  },
                  dataType: 'json',
                  success: function(data) {

                      $('#companydata').trigger("reset");
                      $('#practice_modal').modal('hide');
                      window.location.reload(true);
                  }
              });
          });

          $('body').on('click', '#editCompany', function(event) {

              event.preventDefault();
              var id = $(this).data('id');
              console.log(id)
              $.get('pelanggan/' + id + '/edit_dataPelanggan', function(data) {
                  $('#userCrudModal').html("Edit category");
                  $('#submit').val("Edit category");
                  $('#practice_modal').modal('show');
                  $('#pelanggan_id').val(data.data.id);
                  $('#nama_pelanggan').val(data.data.nama_pelanggan);
                  $('#alamat_pelanggan').val(data.data.alamat_pelanggan);
                  $('#telp_pelanggan').val(data.data.telp_pelanggan);

              })
          });

      });

  </script>
  @endpush


@endsection




