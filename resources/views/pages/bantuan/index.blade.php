<!---Thanks to undraw-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV TRITAMA INTI PERSADA !</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}" /> --}}
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  </head>
  <body>
      <div class="container">
          <div class="img">
              <img src="{{ asset('stisla/assets/img/logo.jpg') }}" />
            </div>
            <div class="login-container">
                <form action="{{ URL::to('/postlogin') }}" method="POST">
                    @csrf
                    {{-- <img class="avator" src="{{ asset('stisla/assets/img/logo-min.jpg') }}" /> --}}
                    <h2>Bantuan</h2>
                    @if (session('fail'))
                    <p style="color: red;" class="text-danger">{{ session('fail') }}</p>
                    @endif

                    <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                        </div>
                      </div>
                    </div>
{{-- 
          <div class="row my-5 text-left" style="text-align: left !important;">
              <div class="col-sm-12">
                <p>Sistem informasi akuntansi ini merupakan suatu sistem yang mengumpulkan menyimpan dan mengelola serta penyampaian informasi data keuangan atau akuntansi kepada pihak yang berkepentingan dalam pengambilan keputusan</p>
                 <p>sistem web ini memiliki tiga hak akses yaitu</p>
                <p>
                    1 admin yang memberikan atau menambahkan hak akses pengguna kepada penggunaan aplikasi yang bersangkutan dengan informasi keuangan atau akuntansi tersebut
                </p>
                <p> Kedua staff yang mengelola data informasi keuangan atau akuntansi yang terjadi pada perusahaan</p>
                <p> Tiga pimpinan yang memeriksa atau melihat informasi keuangan yang telah dikelola oleh staf</p>
                <p> Login pada akses admin staf dan pimpinan dengan memasukkan nama yang telah diinputkan oleh admin pada kolom username dan untuk kolom password default password email yang diinputkan oleh admin</p>
              </div>
          </div> --}}
          <table style="width: 100%;margin-top:15px;">
            <tr>
              <td>
                <a href="{{ URL::to('/login') }}"><i
                  class="fas fa-question-circle"></i> <span>Login</span></a>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    type="text/javascript" src="js/main.js"></script>
  </body>
</html>

{{-- 
halaman staff 
staff menginputkan data akun yang digunakan pada transaksi, menginputkan data pelanggan dan pemasok yg bersangkutan dengan perusahaan
staff menginputkan transaksi yg terjadi pada perusahaan dari pelanggan maupun pemasok untuk mengetahui keuntungan yang diperoleh perusahaan 
staff memeriksa saldo akun untuk memastikan 
staff memeriksa keseimbangan rekapan saldo dari buku besar
staff memeriksa laporan keuangan memastikan semuanya sesuai dengan yg di harapkan   

halaman pimpinan
pimpinan memeriksa laporan keuangan dan memastikan semuanya sesuai dengan yg diharapkan sebelum mencetak laporan
--}}