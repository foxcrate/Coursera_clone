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
                    <h3 class="card-title" >Edit <span style="color:blue;"> {{$semester->name}}   </span>Courses </h3>

                    <form name="edit_form2"  method="post" action="{{ route('semesters.mass_edit') }}">
                        @csrf
                        <input type="hidden" name="semester_id" value="{{$semester->id}}" >
                        <div class="form-group my-4">
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course1 != null )
                                    <label>First Course <span style="color:blue;"> {{ $semester->course_calender->course1->name }}   </span></label>
                                    @else
                                    <label>First Course</label>
                                    @endif
                                @else
                                <label>First Course</label>
                                @endif
                                <select class="form-control" id='first_course' name="first_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course2 != null )
                                    <label>Second Course <span style="color:blue;"> {{ $semester->course_calender->course2->name }}  </span></label>
                                    @else
                                    <label>Second Course</label>
                                    @endif
                                @else
                                <label>Second Course</label>
                                @endif
                                <select class="form-control" id='second_course' name="second_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course3 != null )
                                    <label>Third Course <span style="color:blue;"> {{ $semester->course_calender->course3->name }}  </span></label>
                                    @else
                                    <label>Third Course</label>
                                    @endif
                                @else
                                <label>Third Course</label>
                                @endif
                                <select class="form-control" id='third_course' name="third_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course4 != null )
                                    <label>Forth Course <span style="color:blue;"> {{ $semester->course_calender->course4->name }}  </span></label>
                                    @else
                                    <label>Forth Course</label>
                                    @endif
                                @else
                                <label>Forth Course</label>
                                @endif
                                <select class="form-control" id='forth_course' name="forth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course5 != null )
                                    <label>Fifth Course <span style="color:blue;"> {{ $semester->course_calender->course5->name }}  </span></label>
                                    @else
                                    <label>Fifth Course</label>
                                    @endif
                                @else
                                <label>Fifth Course</label>
                                @endif
                                <select class="form-control" id='fifth_course' name="fifth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course6 != null )
                                    <label>Sixth Course <span style="color:blue;"> {{ $semester->course_calender->course6->name }}  </span></label>
                                    @else
                                    <label>Sixth Course</label>
                                    @endif
                                @else
                                <label>Sixth Course</label>
                                @endif
                                <select class="form-control" id='sixth_course' name="sixth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course7 != null )
                                    <label>Seventh Course <span style="color:blue;"> {{ $semester->course_calender->course7->name }}  </span></label>
                                    @else
                                    <label>Seventh Course</label>
                                    @endif
                                @else
                                <label>Seventh Course</label>
                                @endif
                                <select class="form-control" id='seventh_course' name="seventh_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course8 != null )
                                    <label>Eighth Course <span style="color:blue;"> {{ $semester->course_calender->course8->name }}  </span></label>
                                    @else
                                    <label>Eighth Course</label>
                                    @endif
                                @else
                                <label>Eighth Course</label>
                                @endif
                                <select class="form-control" id='eighth_course' name="eighth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course9 != null )
                                    <label>Ninth Course <span style="color:blue;"> {{ $semester->course_calender->course9->name }}  </span></label>
                                    @else
                                    <label>Ninth Course</label>
                                    @endif
                                @else
                                <label>Ninth Course</label>
                                @endif
                                <select class="form-control" id='ninth_course' name="ninth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course10 != null )
                                    <label>Tenth Course <span style="color:blue;"> {{ $semester->course_calender->course10->name }}  </span></label>
                                    @else
                                    <label>Tenth Course</label>
                                    @endif
                                @else
                                <label>Tenth Course</label>
                                @endif
                                <select class="form-control" id='tenth_course' name="tenth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course11 != null )
                                    <label>Eleventh Course <span style="color:blue;"> {{ $semester->course_calender->course11->name }}  </span></label>
                                    @else
                                    <label>Eleventh Course</label>
                                    @endif
                                @else
                                <label>Eleventh Course</label>
                                @endif
                                <select class="form-control" id='eleventh_course' name="eleventh_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
                                </select>
                            </div>
                            <div class="form-group">
                                @if ( $semester->course_calender != null )
                                    @if ( $semester->course_calender->course12 != null )
                                    <label>Twelfth Course <span style="color:blue;"> {{ $semester->course_calender->course12->name }}  </span></label>
                                    @else
                                    <label>Twelfth Course</label>
                                    @endif
                                @else
                                <label>Twelfth Course</label>
                                @endif
                                <select class="form-control" id='twelfth_course' name="twelfth_course">
                                    @foreach ( $all_courses as $course  )
                                    <option value="{{$course->id}}"> {{$course->id}} - {{$course->name}} </option>
                                    @endforeach
                                    <option selected value = null> No Course </option>
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
