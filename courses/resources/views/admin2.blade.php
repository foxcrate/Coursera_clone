@extends('layouts.app')

@section('content')
<h3>{{ Auth::user()->level }}</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    Hi boss - 2
                </div>
            </div>
        </div>
    </div>
</div>
@endsection