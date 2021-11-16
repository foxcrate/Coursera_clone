@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Submitted Researches</b></h2>
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
                        <th>Cycle Name</th>
                        <th>Project Name</th>
						<th>Semester Name</th>
						<th>Student ID</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($all_submitted_researches as $submitted_research)

					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$submitted_research->id}} </td>
                        <td style="word-wrap: break-word"> {{$submitted_research->cycle->name}} </td>
                        <td style="word-wrap: break-word"> {{$submitted_research->project->name}} </td>
                        <td style="word-wrap: break-word"> {{$submitted_research->semester->name}} </td>
						<td style="word-wrap: break-word"> {{$submitted_research->student->id}} </td>
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{ $submitted_research->id }})" href="#editSubmittedResearchModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex pages">
                {{ $all_submitted_researches->links() }}
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
<div id="editSubmittedResearchModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
            <form method="post" action="{{route('researches.submitted_research_edit')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="edit_hidden_id" name="id" >
				<div class="modal-header">
					<h4 class="modal-title">Edit Book</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                <div class="form-group">
                    <div class="form-group">
                        <label>Submitted Research</label>
                        <button onclick="full_tab()" class="btn btn-primary my-2">View File</button>
					</div>
					<div class="form-group">
						<label>Grade From 100</label>
						<input type="number" name="grade" id="edit_grade" class="form-control" required>
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

    var edit_id = 0;
    var full_url = "";

    function full_tab(){
        //alert("Alo");
        window.open(full_url, '_blank').focus();

    }

	function edit_function(id){
		edit_id = id;
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
			url: "{{ route('researches.submitted_research_data') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
            $("#edit_grade").attr("value", data.grade);
            full_url = 'http://localhost:8000/' + data.file  ;
		});

	}

</script>

