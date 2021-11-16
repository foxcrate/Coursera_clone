@include('student.templates.header')
@include('student.templates.navbar')

@extends('student.templates.header')

@section('title')
  <title>My Courses</title>
@endsection


    <div class="col-12 project-header">
        <div class="row">
        </div>
    </div>
    @if(session()->has('msg'))
    <div class="alert alert-success text-center">
        {{ session()->get('msg') }}
    </div>
    @endif

@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
    <h2 class="my-c-title"> My Cycles</h2>

    @foreach ( array_chunk($cycles_with_money,3) as $chunk )
        <div class="row">
        @foreach( $chunk as $x )
            <div class="col-lg-4">
                <div class="card h-100">
                <a href="{{ route('profile_project_details', [ 'cycle_id' => $x['cycle']['id'] , 'student_id' => session()->get('loggedID') , 'project_id' => $x['cycle']['project']['id'] ] ) }}">
                    @if ( $x['cycle']['project']['image'] )
                        <img src={{ asset( $x['cycle']['project']['image'] ) }} class="card-img-top card-image-style" alt="...">
                    @endif
                    </a>
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>{{  $x['cycle']['name'] }}</h5>
                    <p class="card-text">{{  $x['cycle']['project']['summery']  }}</p>
                    <p class="icon-les"><i class="fa fa-calendar"></i><span class="les-spa"> {{ $x['num_of_semesters'] }} </span> semesters</p>
                    <p class="icon-les"><i class="fa fa-book"></i><span class="les-spa"> {{ $x['num_of_courses'] }} </span> courses</p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-9 d-flex align-items-center">
                                <h6 class="text-muted">You pay <span class="les-spa">${{ $x['money_paid'] }}</span> , <span class="les-spa">${{ $x['cycle']['project']['price'] - $x['money_paid'] }}</span> left</h6>
                            </div>
                            <div class="col-3">
                                @if( $x['cycle']['project']['price'] - $x['money_paid'] != 0 )
                                <button type="button"  onclick="prepare_buy( {{ $x['cycle']['id'] }} )"  class="btn" style="color : white; background-color : #fb8500 ;" data-bs-toggle="modal" data-bs-target="#pay_cycle">Pay</button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        @endforeach
        </div>
    @endforeach

    <!-- @foreach ( Auth::user()->all_cycles->chunk(3) as $chunk)
        <div class="row">
            @foreach( $chunk as $cycle )
                <div class="col-lg-4">
                    <div class="card h-100">
                    <a href="{{ route('profile_project_details', [ 'cycle_id'=>$cycle->id ,'student_id' => session()->get('loggedID') , 'project_id' => $cycle->project->id ] ) }}">
                        @if ($cycle->project->image)
                            <img src={{ asset( $cycle->project->image ) }} class="card-img-top card-image-style" alt="...">
                        @endif
                        </a>
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>{{$cycle->name}}</h5>
                        <p class="card-text">{{ $cycle->project->summery  }}</p>
                        <p class="icon-les"><i class="fa fa-calendar"></i><span class="les-spa"> {{ count( $cycle->project->semesters ) }} </span> semesters</p>
                        <p class="icon-les"><i class="fa fa-book"></i><span class="les-spa"> {{ count( $cycle->project->all_courses() ) }} </span> courses</p>
                    </div>
                    <div class="card-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-9 d-flex align-items-center">
                                    <h6 class="text-muted">You pay <span class="les-spa">$3988</span> , <span class="les-spa">$332</span> left</h6>
                                    <h6 >{{$cycle->project->price}} </h6>
                                </div>
                                <div class="col-3">
                                <button type="button"  onclick="prepare_buy( {{$cycle->id}} )"  class="btn" style="color : white; background-color : #fb8500 ;" data-bs-toggle="modal" data-bs-target="#pay_cycle">Pay</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach -->

</div>

<div id="pay_cycle" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="{{route('pay_cycle')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="cycle_id" name="cycle_id" >
				<div class="modal-header">
					<h4 class="modal-title">Upload Your Payment File</h4>
					<button type="button " class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>File</label>
						<input type="file" class="form-control" name="file" required >
					</div>
                    <!-- <div class="form-group">
						<label>Write A Note ?</label>
						<textarea class="form-control" name="note" id="note" rows="3"  required></textarea>
					</div> -->
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="pay">
				</div>
			</form>
		</div>
	</div>
</div>

<script>

    function prepare_buy(cycle_id){
        //console.log( cycle_id);
        $("#cycle_id").attr("value", cycle_id);
        //console.log( book_id , student_id );
    }

</script>

@include('student.templates.footer')
