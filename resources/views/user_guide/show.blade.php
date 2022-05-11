@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning">
            <h3 class="text-light">@isset($content) {{ $content->heading }} @endisset</h3>
          </div>
          <div class="card-body text-primary">
            @isset($content) {!! $content->body !!} @endisset
          </div>
          <div class="card-footer">
            <p>Created on 
              <span class="text-bold">
                @isset($content) {{ $content->created_at->format('m/d/Y H:i') }} @endisset
              </span></p>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection