<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $title; }}</title>
  <meta charset="utf-8">
  <meta name="description" content="TIFA Airtime & SMS Dispatcher">
  <meta name="author" content="{{ $authors }}">
  <meta name="keywords" content="TIFA Incentives, Airtime & SMS">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  <!-- Javascript -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

  <!--Fontawesome Kit's Code-->
  <script src="https://kit.fontawesome.com/d7fcc07195.js" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/jpg" href="./assets/images/favicon.jpeg"/>
</head>
<body>

<div class="jumbotron bg-primary text-center" style="margin-bottom:0">

    <div class="row">
      <div class="col-md-6 mt-3">
        <img src="./assets/images/logo.png" class="img-thumbnail img-fluid" alt="TIFA Research">
      </div>

    <div draggable="true" class="col-md-6 bg-primary">
      <div class="mt-5 text-light">
        <h1>{{ $title; }}</h1>
        <p>Airtime SMS Dispatcher</p>
      </div>
    </div>

    </div>
   
</div>

<div class="jumbotron bg-warning" style="height: 100vh; width: 100vw;">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card card-login mx-auto mt-5 mb-5">
      <div class="card-header text-center">
        Login To Proceed
      </div>
      <div class="card-body">
        <form action="{{ route('login') }}" method="post" accept-charset="utf-8">
           @csrf
            <div class="form-group">
              <div class="form-label-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email" name="email" value="{{ old('email') }}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            
            <div class="mt-4">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
      </div>
    </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>


</body>
</html>
