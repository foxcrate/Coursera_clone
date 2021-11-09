@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>My Accepted Payments</title>
@endsection


    <div class="col-12 project-header">
        <div class="row">
        </div>
    </div>

	<!-- <h6>{{ $accepted_requests[0]['kind'] }}</h6> -->

@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
    <h2 class="my-c-title"> My Accepted Payments </h2>
	<table style="table-layout:fixed; width: 100%;" class="table table_condensed table-striped table-hover">
			<thead>
			<tr>
				<!-- <th>
					<span class="custom-checkbox">
						<input type="checkbox" id="selectAll">
						<label for="selectAll"></label>
					</span>
				</th> -->
				<th>Kind</th>
				<th>Money Paid</th>
				<th>Accepted At</th>
				<!-- <th>bio</th> -->
				<!-- <th>Actions</th>  -->
			</tr>
		</thead>
		<tbody>
		@foreach ($accepted_requests as $request)

			<tr>
				<!-- <td style="word-wrap: break-word">
					<span class="custom-checkbox">
						<input type="checkbox" id="checkbox1" name="options[]" value="1">
						<label for="checkbox1"></label>
					</span>
				</td> -->
				<td style="word-wrap: break-word"> {{ $request['kind'] }} </td>
				<td style="word-wrap: break-word"> {{ $request['data']['money_paid'] }} </td>
				<td style="word-wrap: break-word"> {{ $request['data']['updated_at'] }} </td>
			</tr>

		@endforeach

		</tbody>
	</table>
</div>

@include('student.templates.footer')