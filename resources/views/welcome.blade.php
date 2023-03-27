@extends('layouts.default')
@section('body')
  <section class="jumbotron text-center">
    <div class="container">
      <h1>Welcome</h1>
      <p class="lead text-muted">For all the ways you share</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @foreach($articles as $article)

       
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <img  width="100%"class="bd-placeholder-img card-img-top" src="{{url('uploads/'.$article->thumblin)}}"/>
            <div class="card-body">
              <p class="card-text">
              <a href="{{url('article/'.$article->id)}}">  
              {{$article->title}}</a></p>
              <div class="d-flex justify-content-between align-items-center">
               
                <small class="text-muted">{{$article->created_at}}</small>
              </div>
            </div>
          </div>
       </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection