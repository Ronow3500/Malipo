@extends('layouts/main')

@section('content')
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             
         </div>
         <div class="card-body">
             <div class="form-group">
                 <form method="post" action="{{ route('guide.update', $content->id) }}">
                    @method('patch')
                    @include('user_guide.partials.form')
                 </form>
             </div>
         </div>
     </div>
 </div>

@endSection