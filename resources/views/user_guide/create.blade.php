@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <h1>Create Guide</h1>
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('guide.store') }}">
                    @include('user_guide.partials.form', ['create' => true])
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection