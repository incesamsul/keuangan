@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex justify-content-between">
              <h4>Data akun</h4>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-tambah btn-warning" data-toggle="modal" data-target="#formModal">
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
          <button type="submit" class="btn btn-warning btn-form" id="modalBtn">Tambah</button>
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
            $('#formData').attr('action','/staff/tambah_akun');
            $('.btn-form').html('tambah');
        })

          $(document).on('click','.btn-edit',function(){
              let dataEdit = $(this).data('edit');
              $('#id').val(dataEdit.id_akun);
              $('#no_akun').val(dataEdit.no_akun);
              $('#nama_akun').val(dataEdit.nama_akun);
              $('#formData').attr('action','/staff/edit_akun');
              $('.btn-form').html('edit');
          })
        $('#liDataAkun').addClass('active');
      })

  </script>

@endsection

