@extends('layouts.main')

@section('content')

<div class="container">
	<div class="card">
	<div class="card-header">
		<h3 class="text-warning">Use the format below :</h3>
		<br><br>
		<div class="table-responsive">
			<table class="table table-sm table-bordered table-hover">
				<caption>
					Upload csv file with respondent's name, their phone number and amount of airtime to be sent to them.
				</caption>
				<thead class="thead-light">
					<tr>
						<th scope="col">Respondent</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Amount</th>
						<th scope="col">SMS Message</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Respondent Name</td>
						<td>7XXXXXXXX</td>
						<td>50</td>
						<td>Leave as Blank</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-body">

        <form method="post" action="{{ route('import_csv') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="file">Choose File To Upload</label>
				<div class="input-group">
					<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-file"></i>
								</span>
					</div>
					<input type="file" class="form-control /*is-valid*/" name="file" id="file" >
					<!--<div class="valid-feedback">
			            Looks good!
			         </div>-->
				</div>
			</div>
			<br>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-upload"></i>Upload File To Dispatch Incentives
				</button>
			</div>
		</form>
	</div>
	<div class="card-footer">
	</div>
</div>
</div>

@endsection