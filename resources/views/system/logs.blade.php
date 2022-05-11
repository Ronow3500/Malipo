@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>System Logs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  
                    echo "<pre>";
                    echo $logs;
                    echo "</pre>";
                    
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection