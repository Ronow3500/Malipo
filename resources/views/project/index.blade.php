@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="col-12">
              <h1 class="card-title float-left">Projects</h1>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Created By</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($projects as $project)
                  <tr>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->project_creator }}</td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="{{ route('project.edit', $project->id) }}" role="button" title="Edit {{ $project->project_name }}'s name">
                        <span class="fas fa-pen"></span>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $projects->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection