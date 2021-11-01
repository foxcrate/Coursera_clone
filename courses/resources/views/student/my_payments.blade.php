<!-- @include('student.templates.header') -->
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
    <th>Cycle</th>
    <th>Cost</th>
    <th>Date</th>
    <th>Status</th>
  </tr>
  @foreach(Auth::user()->cycles_payment as $payment)
    <tr>
      <td>{{$payment->id}}</td>
      <td>{{$payment->cycle->name}}</td>
      <td>{{$payment->amount_paid}} $</td>
      <td>{{$payment->due_date}} </td>
      <td>{{$payment->status}}</td>
    </tr>
  @endforeach
</table> 
</div>

@include('student.templates.footer')