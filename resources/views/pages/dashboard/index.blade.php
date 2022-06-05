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
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-warning bg-warning">
                    <i class="fas fa-money-bill-1-wave"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>kas</h4>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Anda berada di halaman dashboard</h4>
                </div>
                <div class="card-body">
                    <h5>Hi, Selamat datang</h5>
                    <img src="https://drive.google.com/file/d/1ZpoTsb5hwkoD8wh8hAITpzhKXk9Q0x_f/view?ups=drivesdk">
                    <p>Segala aktifitas yang anda lakukan akan kami pantau, mhon gunakan aplikasi ini dengan bijaksana.
                    </p>
                    <p>Dengan adanya apilkasi ini kami berharap agar mempermudah Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero quibusdam quia rem ab, aspernatur nisi asperiores laudantium repellendus, optio ad sequi! Blanditiis quo, rerum eligendi maiores dicta ipsum iure! Inventore!lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam aliquid fuga ea expedita culpa praesentium provident magnam. Iste, illum! Nesciunt ullam itaque ratione asperiores eaque corporis minima, recusandae quo eligendi!</p>
                </div>
            </div>
        </div>

    </div> --}}
</section>
@endsection

@section('script')
<script>
    $('#liDashboard').addClass('active');

</script>
@endsection
