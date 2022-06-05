@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h4>Neraca Saldo</h4>
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
                            <?php $i = 0; ?>
                            @foreach ($akun as $item)
                                <?php $i++; ?>

                                <tr>
                                    <td>{{ $item->no_akun }}</td>
                                    <td>{{ $item->nama_akun }}</td>
                                    @foreach ($bukubesar as $ite)
                                        <td>
                                            
                                        </td>  
                                    @endforeach
                                   
                                </tr>
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
