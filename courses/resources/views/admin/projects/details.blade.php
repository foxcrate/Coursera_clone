@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">
                    <h3 class="card-title" style="color:blue;">Edit Project Semesters </h3>
                    <!-- action="{{ route('projects.edit') }}" -->
                    
                    <form name="edit_form2"  method="post" action="{{ route('projects.mass_edit') }}" enctype="multipart/form-data">
                        @csrf

                        <p style="font-size: 1.5rem;">Project Name: <span style="font-weight: bold;">{{$project->name}}</span> </p>
                        

                        <input type="hidden" name="id" value=" {{$project->id}} ">
                        <!-- <div class="form-group my-4">
                            <label>Name</label>
                            <input name="name" id="project_name" type="text" class="form-control"  value=" {{$project->name}} " >
                            @error('name')
                            <div class="alert-warning">{{$errors->first('name')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            
                            <img style="height: 80px; width: 200px; margin-bottom: 15px; border-radius:2em;" src="{{asset($project->image)}}">
                            <label>Image</label>
                            <input name="image" id="project_image" type="file" class="form-control"  >
                            @error('image')
                            <div class="alert-warning">{{$errors->first('image')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label>Type</label>
                            <select name="type" id="project_type" class="form-select" aria-label="Default select example">
                            
                                <option  value="phd" {{ $project->type == 'phd' ? 'selected' : '' }} >PHD</option>
                                <option value="master" {{ $project->type == 'master' ? 'selected' : '' }} >Master</option>
                                <option value="diploma" {{ $project->type == 'diploma' ? 'selected' : '' }} >Diploma</option>
                                <option value="fellowship" {{ $project->type == 'fellowship' ? 'selected' : '' }} >Fellowship</option>
                            </select>
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
                            <input name="video" id="project_video" type="file" class="form-control"   >
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
                        </div> -->

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