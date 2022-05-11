@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="col-12">
              <h2 class="float-left">User Guide</h2>
              <a href="{{ route('guide.create') }}" class="btn btn-success float-right" role="button">Add</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>Heading</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @foreach($contents as $content)
                  <tr>
                    <td> <a href="{{ route('guide.show', $content->id) }}">
                        {{ $content->heading }}
                      </a></td>
                    <td>
                      <div class="row">
                        <div class="col">
                        <a class="btn btn-sm btn-primary" href="{{ route('guide.edit', $content->id) }}" role="button" title="Edit {{ $content->heading }}">
                        <span class="fas fa-pen"></span>
                      </a>
                      </div>
                      <div class="col">
                        <form method="post" action="{{ route('guide.destroy', $content->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" title="Remove {{ $content->heading }} from the User Guide">
                          <span class="far fa-trash-alt"></span>
                        </button>
                        </form>
                      </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $contents->links() }}
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
      
    </section>
    <!-- /.content -->

@endsection