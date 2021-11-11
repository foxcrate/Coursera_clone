@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">

                    @if(session()->has('good_msg'))
                    <div class="alert alert-success">
                        {{ session()->get('good_msg') }}
                    </div>
                @endif
                    <h3 class="card-title" >Edit <span style="color:blue;"> {{$project->name}}   </span>Semesters </h3>
                    <!-- action="{{ route('projects.edit') }}" -->

                    <form name="edit_form2"  method="post" action="{{ route('projects.mass_edit') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="project_id" value="{{$project->id}}" >
                        <div class="form-group my-4">
                            <div class="form-group">
                                @if ( $project->semester_calender != null )
                                    @if ( $project->semester_calender->semester1 != null )
                                    <label>First Semester <span style="color:blue;"> {{ $project->semester_calender->semester1->name }}    </span></label>
                                    @else
                                    <label>First Semester</label>
                                    @endif
                                    @else
                                    <label>First Semester</label>
                                @endif
                                <select class="form-control" id='first_semester' name="first_semester">
                                    @foreach ( $all_semesters as $semester  )
                                    <option value="{{$semester->id}}"> {{$semester->id}} - {{$semester->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Semester </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $project->semester_calender != null )
                                    @if ( $project->semester_calender->semester2 != null )
                                    <label>Second Semester <span style="color:blue;"> {{ $project->semester_calender->semester2->name }}    </span></label>
                                    @else
                                    <label>Second Semester</label>
                                    @endif
                                    @else
                                    <label>Second Semester</label>
                                @endif
                                <select class="form-control" id='second_semester' name="second_semester">
                                    @foreach ( $all_semesters as $semester  )
                                    <option value="{{$semester->id}}"> {{$semester->id}} - {{$semester->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Semester </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $project->semester_calender != null )
                                    @if ( $project->semester_calender->semester3 != null )
                                    <label>Third Semester <span style="color:blue;"> {{ $project->semester_calender->semester3->name }}    </span></label>
                                    @else
                                    <label>Third Semester</label>
                                    @endif
                                    @else
                                    <label>Third Semester</label>
                                @endif
                                <select class="form-control" id='third_semester' name="third_semester">
                                    @foreach ( $all_semesters as $semester  )
                                    <option value="{{$semester->id}}"> {{$semester->id}} - {{$semester->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Semester </option>
                                </select>
                            </div>
                        </div>

                        <input onclick="" type="submit" class="btn btn-info mx-2" value="Save">
                    </form>
                </div>
            </section>

        </div>
    </div>



    <script>

        function submit_edit_form(){
            //alert("Alo");
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
            var checkboxes_array = [];

            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes_array.push( parseInt( checkboxes[i].id ) );
            }

            var myimage = $('#project_image').prop('files')[0];
            var myvideo = $('#project_video').prop('files')[0];
            //console.log(myimage);

            var data = new FormData();
            data.append('image',myimage);
            data.append('video',myvideo);
            data.append('ajax',1);
            data.append('name', $("#project_name").val() );
            data.append('id', {{ $project->id }} );
            data.append('type', $("#project_type").val() );
            data.append('price',$("#project_price").val() );
            data.append('summery',$("#project_summery").val() );
            data.append('semesters_array', checkboxes_array );
            //alert("Alo");
            $.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			type: "POST",
			url: "{{ route('projects.edit') }}" ,
			data: data,
            cache: false,
            contentType: false,
            processData: false,
			}).done(function (data) {
			console.log('server: ',data);
			    window.location.reload();
		    });

            //alert("Alo");

        }

    </script>
