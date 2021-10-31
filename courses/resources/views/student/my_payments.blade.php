@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>My Payments</title>
@endsection


<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
    <h2 class="my-c-title"> My Payment</h2>
    <table class="table table-dark table-hover">
  <tr>
    <th>#</th>
    <th>Course</th>
    <th>Cost</th>
    <th>Date</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>1</td>
    <td>MBA</td>
    <td>1800 $</td>
    <td>13-10-2021</td>
    <td>Paid</td>
  </tr>
  <tr>
    <td>2</td>
    <td>diplomatic</td>
    <td>2000 $</td>
    <td>31-10-2021</td>
    <td>Canceled</td>
  </tr>
  <tr>
    <td>3</td>
    <td> Tahkim</td>
    <td>500 $</td>
    <td>12-9-2020</td>
    <td>Pending</td>
  </tr>
</table> 
</div>

@include('student.templates.footer')