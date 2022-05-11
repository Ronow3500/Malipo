@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h1>Register</h1>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                         <div class="mb-3">
                           <label for="name">Name</label>
                           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" aria-describedby="name">
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                            {{ $message }}
                           </span>
                           @enderror
                         </div> 
                        </div>
                        <div class="col">
                          <div class="mb-3">
                          <label for="email">Email</label>
                          <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-describedby="email">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                          @enderror
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection