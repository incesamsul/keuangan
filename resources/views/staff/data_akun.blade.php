@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex justify-content-between">
              <h4>Data akun</h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formModal">
                  <i class="fas fa-plus"></i>
                </button>

            </div>
            <div class="card-body" >
              <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($akun as $row)
                      <tr>
                        <td>{{ $row->no_akun }}</td>
                        <td>{{ $row->nama_akun }}</td>
                        <td>
                          <a href="akun/delete/{{ $row->id_akun }}" class="btn btn-danger"><i
                                class="fas fa-trash"></i>Hapus</a>
                          <a data-toggle="modal" data-target="modalUpdate-{{ $row->id_akun }}"
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
        <form id="formData" action="{{ URL::to('/staff/tambah_akun') }}" method="POST">
          @csrf
          <div class="form-group">
              <label for="no_akun">No Akun</label>
              <input type="hidden" class="form-control" name="id" id="id">
              <input type="text" class="form-control" name="no_akun" id="no_akun">
          </div>
          <div class="form-group">
              <label for="nama_akun">Nama Akun</label>
              <input type="text" class="form-control" name="nama_akun" id="nama_akun">
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
  @foreach ($akun as $item)
    <div class="modal fade" id="modalUpdate-{{ $item->id_akun }}" tabindex="-1"
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
            <form id="formData" action="{{ route('akun.update_akun', $item->id_akun) }}" method="POST"
              enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="no_akun">No Akun</label>
                  <input type="hidden" class="form-control" name="id" id="id">
                  <input type="text" class="form-control" name="no_akun" id="no_akun"
                      value="{{ $item->no_akun }}">
              </div>
              <div class="form-group">
                  <label for="nama_akun">Nama Akun</label>
                  <input type="text" class="form-control" name="nama_akun" id="nama_akun"
                      value="{{ $item->nama_akun }}">
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
              var id = $("#akun_id").val();
              var no_akun = $("#no_akun").val();
              var nama_akun = $("#nama_akun").val();

              $.ajax({
                  url: 'akun/' + id,
                  type: "POST",
                  data: {
                      id: id,
                      no_akun: no_akun,
                      nama_akun: nama_akun,
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
              $.get('akun/' + id + '/edit_akun', function(data) {
                  $('#userCrudModal').html("Edit category");
                  $('#submit').val("Edit category");
                  $('#practice_modal').modal('show');
                  $('#akun_id').val(data.data.id);
                  $('#no_akun').val(data.data.no_akun);
                  $('#nama_akun').val(data.data.nama_akun);

              })
          });

      });



      // $('#liDataAkun').addClass('active');
  </script>
  @endpush

@endsection

