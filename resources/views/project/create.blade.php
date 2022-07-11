@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="col-12">
              <h3 class="float-left">Project Name</h3>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('project.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <input type="text" 
                       name="project_name" 
                       class="form-control @error('project_name') is-invalid @enderror" 
                       placeholder="For which project ?" 
                       id="project_name">
                @error('project_name')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form> 
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection