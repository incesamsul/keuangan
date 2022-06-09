@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Laba/Rugi</h4>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
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
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hi Welcome guyysss <i class="far fa-laugh-wink"></i> </h4>
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
</section>
@endsection

@section('script')
<script>
    $('#liDashboard').addClass('active');

</script>
@endsection
