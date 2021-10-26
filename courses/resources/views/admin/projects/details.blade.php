@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">
                    <h5 class="card-title">Edit Project</h5>
                    <!-- action="{{ route('projects.edit') }}" -->
                    <form name="edit_form2"  method="post" action="{{ route('projects.edit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-4">
                            <label>Name</label>
                            <input name="name" id="project_name" type="text" class="form-control"  value=" {{$project->name}} " >
                            @error('name')
                            <div class="alert-warning">{{$errors->first('name')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            
                            <img style="height: 80px; width: 200px; margin-bottom: 15px; border-radius:2em;" src="{{asset($project->image)}}">
                            <label>Image</label>
                            <input name="image" id="project_image" type="file" class="form-control"  value=" {{$project->image}} " >
                            @error('image')
                            <div class="alert-warning">{{$errors->first('image')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label>Type</label>
                            <input name="type" id="project_type" type="text" class="form-control"  value=" {{$project->type}} " >
                            @error('type')
                            <div class="alert-warning">{{$errors->first('type')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <video class="project_video_in_edit" controls>
                                <source src="http://localhost:8000/{{ $project->video }}" type="video/mp4">
                                Your browser does not support HTML video.
                            </video>
                            <label>Video</label>
                            <input name="price" id="project_video" type="file" class="form-control"  value=" {{$project->video}} " >
                            @error('video')
                            <div class="alert-warning">{{$errors->first('video')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label>Price</label>
                            <input name="price" id="project_price" type="text" class="form-control"  value=" {{$project->price}} " >
                            @error('price')
                            <div class="alert-warning">{{$errors->first('price')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label>Summery</label>
                            <input name="summery" id="project_summery" type="text" class="form-control"  value=" {{$project->summery}} " >
                            @error('summery')
                            <div class="alert-warning">{{$errors->first('price')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label>Semesters</label>
                            <div class="form-control">
                                @foreach ( $semesters as $semester )
                                    <div class=" m-2 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$semester->id}}" name="{{$semester->id}}"  {{ in_array($semester->id, $array_of_semesters) ? 'checked' : '' }} >
                                        <label class="form-check-label" for="{{$semester->id}}">{{$semester->name}}</label>
                                    </div>
                                @endforeach 
                            </div>
                        </div>

                        <input onclick="submit_edit_form()" class="btn btn-info mx-2" value="Save">
                    </form>
                </div>
            </section>
            
        </div>
    </div>

    

    <script>

        function submit_edit_form(){
            var myimage = $('#project_image').prop('files')[0];
            var myvideo = $('#project_video').prop('files')[0];
            //console.log(myimage);

            var data = new FormData();
            data.append('image',myimage);
            data.append('video',myvideo);
            data.append('name','ahmed');

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
			//window.location.reload();
		    });

        }

        function submit_edit_form1(){
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
            var checkboxes_array = [];

            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes_array.push( parseInt( checkboxes[i].id ) );
            }

            console.log(checkboxes_array);

            var formData = {
                project_name: $('#project_name').val() ,
                semesters_array: checkboxes_array ,
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('projects.edit') }}" ,
                data: formData,
                dataType: "json",
                encode: true,
                }).done(function (data) {
                console.log('server_data ',data);
                //window.location.reload();
                });

        }

    </script>