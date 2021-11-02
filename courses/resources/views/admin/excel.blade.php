<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1 class="bg-success text-center m-3 p-3 text-white">Import Data From Excel File Using Laravel</h1>


    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="{{url('/import_data')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for=""> Upload Excel File </label>
                        <input type="file" class="form-control" name="excel_file">
                        {{$errors->first('excelFile')}}
                    </div>

                    <div class="form-group">
                      @csrf
                        <input type="submit" class="btn btn-success" value="Save File">
                    </div>
                </form>
            </div>
        </div>

        <!-- 


        // code of package 
        // https://docs.laravel-excel.com/2.1/getting-started/
        // tutorial : https://www.webslesson.info/2019/02/import-excel-file-in-laravel.html


         -->

        @if(isset($results))
        <div class="row">
          <div class="col-sm-12">

              <table class="table table-bordered border ">
                <thead>
                  <tr>
                    <th> First Name </th>
                    <th> Email</th>
                    <th> Status </th>
                    <th> Salary </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($results as $row)
                  <tr>
                    <td>{{$row->first_name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->salary}}</td>
                  </tr>
                  @endforeach

                </tbody>
                

              </table>

          </div>
        </div>
        @endif
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  </body>
</html>
