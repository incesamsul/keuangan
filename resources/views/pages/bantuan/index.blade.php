<!---Thanks to undraw-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV TRITAMA INTI PERSADA !</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
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
          </div>
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
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
