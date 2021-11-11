@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">
                    <h3 class="card-title" >Edit <span style="color:blue;"> {{$project->name}}   </span>Semesters </h3>
                    <!-- action="{{ route('projects.edit') }}" -->

                    <form name="edit_form2"  method="post" action="{{ route('projects.mass_edit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-4">
                            <label>Semesters</label>
                            <div class="form-control">
                                @foreach ( $semesters as $semester )
                                    <div class=" m-2 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$semester->id}}" value= "{{$semester->id}}" name=semesters_array[]  {{ in_array($semester->id, $array_of_semesters) ? 'checked' : '' }} >
                                        <label class="form-check-label" for="{{$semester->id}}">{{$semester->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <input onclick="submit_edit_form()" type="submit" class="btn btn-info mx-2" value="Save">
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
