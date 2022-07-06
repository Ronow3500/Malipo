@if(session('success'))
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Success</h4>
   	<p>{{ session('success') }}</p>
  </div>
@endif

@if(session('info'))
   <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Info</h4>
    <p>{{ session('info') }}</p>
   </div>
@endif

@if(session('warning'))
  <div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Warning</h4>
   	  <p>{{ session('warning') }}</p>
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Error</h4>
    <p>{{ session('error') }}</p>
  </div>
@endif

<!-- Fortify Status Message -->
@if(session('status'))
  <div class="alert alert-info" role="alert">
    <p>{{ session('status') }}</p>
  </div>
@endif