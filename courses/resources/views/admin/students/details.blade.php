@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container-xl">
    <div class="col-md-6 pro-form">
        <img style="height: 150px; width: 200px; margin-bottom: 15px; border-radius:2em;" src="{{asset($student->image)}}">
    </div>
    <div class="row ">

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Name</h5>
            <p class="col-md-6 no-padding">{{$student->name}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Email</h5>
            <p class="col-md-6 no-padding">{{$student->email}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Password</h5>
            <p class="col-md-6 no-padding">{{$student->password2}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Case</h5>
            <p class="col-md-6 no-padding">{{$student->case}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Bio</h5>
            <p class="col-md-6 no-padding">{{$student->bio}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Phone</h5>
            <p class="col-md-6 no-padding">{{$student->phone1}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Job</h5>
            <p class="col-md-6 no-padding">{{$student->job}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Country</h5>
            <p class="col-md-6 no-padding">{{$student->country}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Status</h5>
            <p class="col-md-6 no-padding">{{$student->status}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Passport</h5>
            <p class="col-md-6 no-padding">{{$student->passport}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">General_note</h5>
            <p class="col-md-6 no-padding">{{$student->general_note}}</p>
        </div>

        <div class="col-md-6 pro-form border">
            <h5 class="col-md-6 no-padding">Payment_note</h5>
            <p class="col-md-6 no-padding">{{$student->payment_note}}</p>
        </div>

    </div>
</div>
