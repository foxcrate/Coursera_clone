@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Book Payments</b></h2>
					</div>
				</div>
			</div>
			<table style="table-layout:fixed; width: 100%;" class="table table_condensed table-striped table-hover">
				<thead>
					<tr>
						<!-- <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th> -->
						<th>ID</th>
						<th>Student Name</th>
						<th>Book Cost</th>
						<th>Payment File</th>
						<th>Status</th>
						<th>Note</th>
						<th>Date</th>
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@foreach ($book_payments as $book_payment)
     
					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$book_payment->id}} </td>
						<td style="word-wrap: break-word"> {{$book_payment->student->name}} </td>
						<td style="word-wrap: break-word"> {{$book_payment->book->cost}} </td>
						<td style="word-wrap: break-word"> <button onclick="view_file( {{ $book_payment }} )" class="btn btn-primary p-1">File</button> </td>
                        <td style="word-wrap: break-word"> {{$book_payment->status}} </td>
						<td style="word-wrap: break-word"> {{$book_payment->note}} </td>
						<td> {{date('Y-m-d', strtotime($book_payment->created_at))}} </td>
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{$book_payment->id}})" href="#editBookModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
							<!-- <a onClick="delete_function({{$book_payment->id}})" href="#deleteBookModal" class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a> -->
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex pages">
                {{ $book_payments->links() }}
            </div>
			<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
		</div>
	</div>        
</div>

<!-- Edit Modal HTML -->
<div id="editBookModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
            <form method="post" action="{{route('book_payments.edit')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="edit_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Edit Book Payment</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                <div class="form-group">				
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" id='edit_status' name="status">
							<option value="accepted">Accepted</option>
							<option value="refused">Refused</option>
							<option value="pending">Pending</option>
						</select>
					</div>
                    <div class="form-group">
                    <label>Note</label>
						<textarea class="form-control" name="note" id="edit_note" rows="3"  required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<script> 

    //var url = "" ;

    function abstract_tab(){
        //alert("Alo");
        window.open(abstract_url, '_blank').focus();

    }

	function view_file(x){
		//url = x.file;
		var url = 'http://localhost:8000/' + x.file ;
		window.open(url, '_blank').focus();
		

	}

    function full_tab(){
        //alert("Alo");
        window.open(full_url, '_blank').focus();

    }

	function delete_function(id){
		
		delete_id = id;
        $("#delete_hidden_id").attr("value", delete_id);
		// alert(delete_id);
	}

	function edit_function(id){
		var edit_id = id;
		//alert(edit_id);
        $("#edit_hidden_id").attr("value", edit_id);
		
		var formData = {
			id:edit_id,
		};

		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			type: "GET",
			url: "{{ route('book_payments.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
			$("#edit_status> option[value=" + data.status + "]").prop("selected",true);
            $("#edit_note").val( data.note );
		});

	}

</script>


