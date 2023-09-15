@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Buku Besar Utang</h4>
                    </div>
                    <div class="card-body">
                        <table id="perUser" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Pemasok</th>
                                    <th>Alamat Pemasok</th>
                                    <th>No Telp Pemasok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($pemasok as $row)
                                    <?php $i++; ?>

                                    <tr>
                                        <td>{{ $row->nama_pemasok }}</td>
                                        <td>{{ $row->alamat_pemasok }}</td>
                                        <td>{{ $row->telp_pemasok }}</td>
                                        <td>
                                            {{-- modal --}}
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal-{{ $row->id_pemasok }}">
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
    @foreach ($pemasok as $item)
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
