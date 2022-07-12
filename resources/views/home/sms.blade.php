@extends('layouts.main')

@section('content')

<div class="container">
	<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col">
			  <h3 class="text-warning">Use the format below :</h3>
			</div>
			<div class="col">
			  <a href="{{ url('/samples/sms_template.xlsx') }}" class="btn btn-default float-right" title="Download template file">
			   <i class="fas fa-download"></i>Sample
		      </a>	
			</div>
		</div>
		<br><br>
		<div class="table-responsive">
			<table class="table table-sm table-bordered table-hover">
				<caption>
					Upload csv file with recepient's phone number and their name
				</caption>
				<thead class="thead-light">
					<tr>
						<th scope="col">Phone Number</th>
						<th scope="col">Message</th>
					</tr>
				</thead>
				<tbody>
					<tr><td>7XXXXXXXX</td>
						<td>Message to be sent</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-body">

        <form method="post" action="{{ route('import_recepients') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="file">Choose File To Upload</label>
				<div class="input-group">
					<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-file"></i>
								</span>
					</div>
					<input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" >
					<!--<div class="valid-feedback">
			            Looks good!
			         </div>-->
				</div>
			</div>
			<br>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-upload"></i>Upload File To Dispatch Sms
				</button>
			</div>
		</form>
	</div>
	<div class="card-footer">
	</div>
</div>
</div>

@endsection