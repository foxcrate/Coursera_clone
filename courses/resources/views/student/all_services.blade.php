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
        <h2 class="text-center mb-1">All Services </h2>
        @foreach( $all_services->chunk(3) as $chunk)
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                @foreach($chunk as $service)
                    <div class="col">
                        <div class="card" style="width:300px">
                            <!-- <a href="{{ route('buy_service', [ 'student_id' => session()->get('loggedID') , 'service_id' => $service->id ] ) }}"><img src="{{ asset( $service->photo ) }}" class="card-img-top card-image-style" alt="..."></a>     -->
                            <img src="{{ asset( $service->cover ) }}" class="card-img-top card-image-style" alt="...">
                            

                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>{{ $service->name }}</h6>
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
            <form method="post" action="{{route('buy_service')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="service_id" name="service_id" >
                <input type="hidden" id="student_id" name="student_id" >
				<div class="modal-header">						
					<h4 class="modal-title">Upload Your Payment File</h4>
					<button type="button " class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>File</label>
						<input type="file" class="form-control" name="file" required >
					</div>
                    <div class="form-group">
						<label>Write A Note ?</label>
						<textarea class="form-control" name="note" id="note" rows="3"  required></textarea>
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

<script>

    function prepare_buy(service_id,student_id){
        $("#service_id").attr("value", service_id);
        $("#student_id").attr("value", student_id);
        //console.log( book_id , student_id );
    }

</script>

@include('student.templates.footer')