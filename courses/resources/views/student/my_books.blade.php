<!-- @include('student.templates.header') -->
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>My Books</title>
@endsection


    <div class="col-12 project-header">
        <div class="row">
            
        </div>
    </div>

@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
    <h2 class="my-c-title"> My Books</h2>
    @foreach ( Auth::user()->books->chunk(3) as $chunk)
        <div class="row">
            @foreach( $chunk as $book )
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src={{ asset( $book->cover ) }} class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-book"></i> {{ $book->name }} </h5>
                                <p class="card-text"><span class="les-spa"> $</span> {{ $book->cost}}</p>
                                <button onclick="book_tab( '{{ $book->full_file }}' )" class="btn btn-primary my-2">Read Book</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>

    function book_tab(url){
        //alert("Alo");
        abstract_url = 'http://localhost:8000/' +  url;
        window.open(abstract_url, '_blank').focus();

    }

</script>

@include('student.templates.footer')