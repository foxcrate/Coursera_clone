@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Books</title>
@endsection

<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
<div class="container-fluid">
    <section class="p-5">
        <h2 class="text-center mb-1">All Books </h2>
        <h5 class="text-center mb-5" style="color:rgb(13,104,187);">You can have {{$remaining_free_books}} free Books</h5>
        @foreach( $all_services->chunk(3) as $chunk)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($chunk as $service)
                    <div class="col">
                        <div class="card" style="width:200px">
                            <!-- <a href="{{ route('buy_service', [ 'student_id' => session()->get('loggedID') , 'service_id' => $service->id ] ) }}"><img src="{{ asset( $service->photo ) }}" class="card-img-top card-image-style" alt="..."></a>     -->
                            <img src="{{ asset( $service->cover ) }}" class="card-img-top card-image-style" alt="...">
                            
                            <button onclick="abstract_tab( '{{ $book->abstract_file }}' )" class="btn btn-primary my-2">View Abstract File</button>

                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>{{ $book->name }}</h6>
                                <p class="card-text">{{ $service->summery }}</p>
                                <p class="icon-les">Cost: <span class="les-spa"> {{ $service->cost }} $</span></p>
                            </div>
                            <div class="card-footer">
                                <!-- <i class="fas fa-book-open icon-s"></i> -->
                                <button type="button"  onclick="prepare_buy( {{$service->id}} , {{session()->get('loggedID')}} )"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buy_service">Buy Service</button>
                                <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>
</div>

<div id="buy_service" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="{{route('buy_book')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="book_id" name="book_id" >
                <input type="hidden" id="student_id" name="student_id" >
				<div class="modal-header">						
					<h4 class="modal-title">Upload Your Payment File</h4>
					<button type="button " class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>File</label>
						<input type="file" class="form-control" name="file" >
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Buy">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="free_book" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="{{route('buy_book')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="book_id_2" name="book_id" >
                <input type="hidden" id="student_id_2" name="student_id" >
				<div class="modal-header">						
					<h4 class="modal-title">Are You Sure?</h4>
					<button type="button " class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Buy">
				</div>
			</form>
		</div>
	</div>
</div>

<script>

    var abstract_url = "";

    function abstract_tab(url){
        alert("Alo");
        abstract_url = 'http://localhost:8000/' +  url;
        window.open(abstract_url, '_blank').focus();

    }

    function prepare_buy(book_id,student_id){
        $("#book_id").attr("value", book_id);
        $("#student_id").attr("value", student_id);
        //console.log( book_id , student_id );
    }

    function prepare_free(book_id,student_id){
        $("#book_id_2").attr("value", book_id);
        $("#student_id_2").attr("value", student_id);
    }

</script>

@include('student.templates.footer')