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
  <link rel="shortcut icon" type="image/jpg" href="./assets/images/favicon.jpeg"/>
</head>
<body>

<div class="jumbotron bg-primary text-center" style="margin-bottom:0">

    <div class="row">
      <div class="col-md-6 mt-3">
        <a href="{{ url('/') }}">
          <img src="./assets/images/logo.png" class="img-thumbnail img-fluid" alt="TIFA Research">
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
        @if(session('status'))
          <h3 class="text-primary">
            <i class="fa-solid fa-envelope-circle-check fa-shake"></i>
            Check your email
          </h3>
        @else
         <h3 class="text-primary">
           Request password reset link
         </h3> 
        @endif
      </div>
      <div class="card-body">
        @if(session('status'))
          @include('partials.alerts')
        @else
          <form action="{{ route('password.email') }}" method="post" accept-charset="utf-8">
           @csrf
            <div class="form-group">
              <div class="form-label-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your password reset procedure will be sent here." name="email" value="{{ old('email') }}">
                @error('email')
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
                Submit
              </button>
            </div>
          </form>
        @endif
        
      </div>
    </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>


</body>
</html>
