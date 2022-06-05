@extends('layouts.v_template')

@section('content')
<section class="section">

    <div class="row">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header d-flex justify-content-between">
              <h4>Laporan Neraca</h4>

            </div>
            <div class="card-body" >
              <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        
                    </tr>
                </thead>
                <tbody>
                  
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
