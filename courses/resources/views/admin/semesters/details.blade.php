@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">
                    <h3 class="card-title" >Edit <span style="color:blue;"> {{$semester->name}}   </span>Courses </h3>
                    <!-- action="{{ route('projects.edit') }}" -->
                    
                    <form id="edit_form"  method="post" action="{{ route('semesters.mass_edit') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="idy" value=" {{$semester->id}} ">
                        
                        <div class="form-group my-4">
                            <label>Courses</label>
                            <div class="form-control">
                                @foreach ( $courses as $course )
                                    <div class=" m-2 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$course->id}}" value= "{{$course->id}}" name=courses_array[]  {{ in_array($course->id, $array_of_courses) ? 'checked' : '' }} >
                                        <label class="form-check-label" for="{{$course->id}}">{{$course->name}}</label>
                                    </div>
                                @endforeach 
                            </div>
                        </div>

                        <input onclick="new_class()" class="btn btn-info mx-2" value="Save">
                    </form>
                </div>
            </section>
            
        </div>
    </div>

    

    <script>

        
	// $("#edit_form2").submit(function(e) {

    //     e.preventDefault(); // avoid to execute the actual submit of the form.
    //     alert("From Stopped ..");

    //     var formData = {
    //         id:edit_id,
    //         name: $("#edit_modal_name").val(),
    //         start_date: $("#edit_modal_start_date").val(),
    //     };

    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: "POST",
    //         url: e.target.action,
    //         data: formData,
    //         dataType: "json",
    //         encode: true,
    //         }).done(function (data) {
    //         // console.log(data);
    //         window.location.reload();
    //     });

    // });

    function new_class(){
        // $('#edit_form').append(

        //     $('<input>').attr('type','number');

        // );
    
        $('#idy').after(
        $('<input>')
            .attr("type", "number")
        );

    }

        

    </script>