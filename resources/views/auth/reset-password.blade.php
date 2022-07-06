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

  <!--Fontawesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/images/favicon.jpeg') }}"/>
</head>
<body>

<div class="jumbotron bg-primary text-center" style="margin-bottom:0">

    <div class="row">
      <div class="col-md-6 mt-3">
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/images/logo.png') }}" class="img-thumbnail img-fluid" alt="TIFA Research">
        </a>
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
      <div class="card-header">
        <h3 class="text-primary">
          <i class="fa-solid fa-user-lock fa-flip"></i>
          Reset Your Password
        </h3>
      </div>
      <div class="card-body">
          <form action="{{ route('password.update') }}" method="post" accept-charset="utf-8">
           @csrf
           <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <div class="form-group">
              <div class="form-label-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Verify your email" name="email" value="{{ old('email') }}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <label for="email">New Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter new password" name="password" value="{{ old('password') }}">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <label for="email">Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm the new password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            
            <div class="mt-4">
              <a href="{{ url()->previous() }}" class="btn btn-warning" title="Go Back">
                <i class="fas fa-arrow-left"></i>
              </a>
              <button type="submit" class="btn btn-primary float-end">
                Reset Now
              </button>
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
