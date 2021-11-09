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

			<tr class="py-2">
				<!-- <td style="word-wrap: break-word">
					<span class="custom-checkbox">
						<input type="checkbox" id="checkbox1" name="options[]" value="1">
						<label for="checkbox1"></label>
					</span>
				</td> -->
				@if( $request['kind'] == 'Cycle' )
				<td style="word-wrap: break-word ;"> {{ $request['kind'] }} </td>
				<td style="word-wrap: break-word; color: rgb(220,53,69) ;"> {{ $request['money_paid'] }} </td>
				<td style="word-wrap: break-word ;"> {{ $request['data']['updated_at'] }} </td>
				@elseif( $request['kind'] == 'Book' )
				<td style="word-wrap: break-word ;"> {{ $request['kind'] }} </td>
				<td style="word-wrap: break-word; color: rgb(25,135,84) ;"> {{ $request['money_paid'] }} </td>
				<td style="word-wrap: break-word ;"> {{ $request['data']['updated_at'] }} </td>
				@elseif( $request['kind'] == 'Service' )
				<td style="word-wrap: break-word ;"> {{ $request['kind'] }} </td>
				<td style="word-wrap: break-word; color: rgb(11,98,175) ;"> {{ $request['money_paid'] }} </td>
				<td style="word-wrap: break-word ;"> {{ $request['data']['updated_at'] }} </td>
				@endif
			</tr>

		@endforeach

		</tbody>
	</table>
</div>

@include('student.templates.footer')