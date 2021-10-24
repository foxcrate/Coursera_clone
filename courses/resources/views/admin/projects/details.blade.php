@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container" >
        <div class="row m-5">
            <section class="col">
                <div class="card p-3">
                    <h5 class="card-title">Edit Project</h5>
                    <form action="{{ url('/store') }}" method="post">
                        @csrf
                        <div class="form-group my-4">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control"  placeholder="أدخل الإسم" >
                            @error('name')
                            <div class="alert-warning">{{$errors->first('name')}}</div>
                            @enderror
                        </div>
                        <div class="form-group my-4">
                            <label>Type</label>    
                            <select id="department" name="department" class="form-control">
                                <option selected value="php">PHD</option>
                                <option value="master">Master</option>
                                <option value="diploma">Diploma</option>
                                <option value="fellowship">Fellowship</option>
                            </select> 
                        </div>
                        <div class="form-group my-4">
                            <label>Image </label>
                            <input name="education" type="text" class="form-control"  placeholder="أدخل التعليم ">
                            @error('education')
                            <div class="alert-warning">{{$errors->first('education')}}</div>
                            @enderror
                        </div> 
                        <div class="form-group my-4">
                            <label>تاريخ التخرج</label>
                            <input name="graduationDate" type="date" class="form-control"  placeholder="أدخل تاريخ التخرج">
                            @error('graduationDate')
                            <div class="alert-warning">{{$errors->first('graduationDate')}}</div>
                            @enderror
                        </div>  
                        <div class="form-group my-4">
                            <label>تاريخ بدء العمل</label>
                            <input name="workStartDate" type="date" class="form-control"  placeholder="أدخل تاريخ بدء العمل">
                            @error('workStartDate')
                            <div class="alert-warning">{{$errors->first('workStartDate')}}</div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label>ساعات العمل الواجبة يوميا</label>
                            <input  name="dailyShouldWorkedHours" type="number" step="any" class="form-control"  placeholder="أدخل ساعات العمل الواجبة يوميا">
                            @error('dailyShouldWorkedHours')
                            <div class="alert-warning">{{$errors->first('dailyShouldWorkedHours')}}</div>
                            @enderror
                        </div>
                        <input type="reset" class="btn btn-warning mx-2" value="مسح المعلومات">
                        <input type="submit" class="btn btn-info mx-2" value="حفظ">
                    </form>
                </div>
            </section>
            
        </div>
    </div>