@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kas</h4>
                    </div>
                    <div class="card-body">

                        {{-- <p class="text-small mt-3">{{ date('l, d M Y H:i:s') }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Piutang</h4>
                    </div>
                    <div class="card-body">

                        {{-- <p class="text-small mt-3">{{ date('H:i:s') }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Utang</h4>
                    </div>
                    <div class="card-body">

                        {{-- <p class="text-small mt-3">{{ date('H:i:s') }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Modal</h4>
                    </div>
                    <div class="card-body">

                        {{-- <p class="text-small mt-3">{{ date('l, d M Y H:i:s') }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pendapatan</h4>
                    </div>
                    <div class="card-body">

                        {{-- <p class="text-small mt-3">{{ date('H:i:s') }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hi Welcome</h4>
                </div>
                <div class="card-body">
                    <h5>CV Tritama Inti Persada</h5>
                    <p><br><img src={{ asset('img/logo.png') }} height="100" width="150" style="text-align: center"></p>
                    <p><br>Visi : Menjadi bagian pengadaan barang dan jasa profesional dan unggul.
                    </p>
                    <p>
                         Misi : Menyekenggarakan pangadaan barang dan jasa secara akuntabel, sesuai dengan aturan dan ketentuan yang berlaku sehingga dapat dipertanggungjawabkan kepada pihak yang berkepentingan.
                    </p>
                    <p>
                         Tujuan : Menyediakan barang dan jasa yang berkualitas sesuai kebutuhan unit kerja yang mendukung pencapaian keberhasilan implementasi kebijakan, program, dan kegiatan.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Set periode aktif</h4>
                    <button class="btn btn-warning" id="simpan-periode">Simpan</button>
                </div>
                <div class="card-body">
                    <select name="periode" id="periode" class="form-control">
                        @foreach ($periode as $row)
                            <option {{ $row->is_active == '1' ? 'selected' : '' }} value="{{ $row->id_periode }}">{{ $row->periode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script>

    $('#simpan-periode').on('click',function(){
        let periode = $('#periode').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: '/set_periode_aktif'
            , method: 'post'
            , dataType: 'json'
            , data: {
                periode: periode
            }
            , success: function(data) {
                if (data == 1) {
                    Swal.fire('Berhasil', 'periode berhasil di set', 'success').then((result) => {
                        location.reload();
                    });
                }
            }
            , error: function(err) {
                console.log(err);
            }
        })
    })
    $('#liDashboard').addClass('active');

</script>
@endsection
