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
                    <h2>TRITAMA INTI PERSADA</h2>
                    @if (session('fail'))
                    <p style="color: red;" class="text-danger">{{ session('fail') }}</p>
                    @endif
          <div class="input-div" one>
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div>
              {{-- <h5>Username</h5> --}}
              <input class="input" type="text" name="name" placeholder="Username"/>
            </div>
          </div>
          <div class="input-div" two>
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div>
              {{-- <h5>password</h5> --}}
              <input class="input" type="password" name="password" placeholder="Password"/>
            </div>
          </div>
          {{-- <a href="#">Forgot password ?</a> --}}
          <input type="submit" class="btn" value="Login" />
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
