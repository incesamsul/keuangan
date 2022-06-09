@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex justify-content-between">
              <h4>Data pemasok</h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formModal">
                  <i class="fas fa-plus"></i>
                </button>

            </div>
            <div class="card-body" >
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
                        <a data-toggle="modal" data-target="modalUpdate-{{ $row->id_pemasok }}"
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
          <button type="submit" class="btn btn-warning" id="modalBtn">Tambah</button>
          </form>
      </div>
    </div>
  </div>
</div>



{{-- Modal Update --}}
  @foreach ($pemasok as $item)
  <div class="modal fade" id="modalUpdate-{{ $item->id_pemasok }}" tabindex="-1"
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
          <form id="formData" action="{{ route('pemasok.update_dataPemasok', $item->id_pemasok) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                  <label for="nama_pemasok">Nama pemasok</label>
                  <input type="hidden" class="form-control" name="id" id="id">
                  <input type="text" class="form-control" name="nama_pemasok" id="nama_pemasok"
                      value="{{ $item->nama_pemasok}}">
              </div>
              <div class="form-group">
                  <label for="alamat_pemasok">Alamat pemasok</label>
                  <input type="text" class="form-control" name="alamat_pemasok" id="alamat_pemasok"
                      value="{{ $item->alamat_pemasok}}">
              </div>
              <div class="form-group">
                  <label for="telp_pemasok">No Telp pemasok</label>
                  <input type="text" class="form-control" name="telp_pemasok" id="telp_pemasok"
                      value=" {{ $item->telp_pemasok}} ">
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
    $('#liDataAkun').addClass('active');
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
              var id = $("#pemasok_id").val();
              var nama_pemasok = $("#nama_pemasok").val();
              var alamat_pemasok = $("#alamat_pemasok").val();
              var telp_pemasok = $("#telp_pemasok").val();

              $.ajax({
                  url: 'pemasok/' + id,
                  type: "POST",
                  data: {
                      id: id,
                      nama_pemasok: nama_pemasok,
                      alamat_pemasok: alamat_pemasok,
                      telp_pemasok: telp_pemasok,
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
              $.get('pemasok/' + id + '/edit_dataPemasok', function(data) {
                  $('#userCrudModal').html("Edit category");
                  $('#submit').val("Edit category");
                  $('#practice_modal').modal('show');
                  $('#pemasok_id').val(data.data.id);
                  $('#nama_pemasok').val(data.data.nama_pemasok);
                  $('#alamat_pemasok').val(data.data.alamat_pemasok);
                  $('#telp_pemasok').val(data.data.telp_pemasok);

              })
          });

      });

  </script>
  @endpush

@endsection
