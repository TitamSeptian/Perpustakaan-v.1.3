@extends('master.master')
@section('title') e-Perpusatakaan v1.3 | Abput Me @endsection
@section('tentang') active @endsection
@section('menu') / About Me @endsection
@section('content')
<div class="row">
	<div class="col-md-12">
        <div class="card card-user">
          <div class="image">
            <img src="{{ asset('me/2.JPG') }}" alt="..." class="img-thumbnail">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{ asset('me/1.JPG') }}" alt="..." width="500" height="500">
                <h5 class="title">Titam Septian</h5>
              </a>
              <p class="description">
                @titam9889
              </p>
            </div>
            <p class="description text-center">
              "I like the way you work it
              <br> No diggity
              <br> I wanna bag it up"
            </p>
          </div>
          <div class="card-footer">
            <hr>
            <div class="button-container">
              
          </div>
        </div>
      </div>
</div>
@endsection