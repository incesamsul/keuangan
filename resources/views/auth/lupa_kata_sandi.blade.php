<!---Thanks to undraw-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV TRITAMA INTI PERSADA</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  </head>
  <body>
      <div class="container">
          <div class="img">
              <img src="{{ asset('stisla/assets/img/logo.jpg') }}" />
            </div>
            <div class="login-container">
                <form action="{{ URL::to('/kirim_email_reset') }}" method="POST">
                    @csrf
                    {{-- <img class="avator" src="{{ asset('stisla/assets/img/logo-min.jpg') }}" /> --}}
                    <h2>Lupa password</h2>
                    @if ($response)
                    @if ($response == 200)
                    <p class="m-0 mt-3 p-0 text-success">Email reset password telah dikirim ke email anda, <span class="text-warning">Jika email tidak masuk periksa email spam</span></p>
                    @elseif ($response == 500)
                    <p class="m-0 mt-3 p-0 text-danger">Terjadi kesalahan ...</p>
                    @else
                    @endif
                    @endif
                    @if (session('success'))
                    <p class="m-0 mt-3 p-0 text-success">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                    <p class="m-0 mt-3 p-0 text-danger">{{ session('error') }}</p>
                    @endif
                    @if (session('fail'))
                    <p style="color: red;" class="text-danger">{{ session('fail') }}</p>
                    @endif
          <div class="input-div" one>
            <div class="i">
              <i class="fas fa-envelope"></i>
            </div>
            <div>
              {{-- <h5>Username</h5> --}}
              <input class="input" type="email" name="email" placeholder="Email ...."/>
            </div>
          </div>
          <input type="submit" class="btn" value="Kirim" />
          <table style="width: 100%">
            <tr>
              <td>
                <a href="{{ URL::to('/bantuan') }}"><i
                  class="fas fa-question-circle"></i> <span>Bantuan</span></a>
              </td>
              <td>
                <a href="{{ URL::to('/login') }}">Login</a>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
