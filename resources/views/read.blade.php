@extends('layouts.app')

@section('content')
<div class="container">
  <legend>Read article</legend>
  <p class="lead">{{$articles->title}}</p>
  <p>{{$articles->description}}</p>
  <div class="col-md-3">{{$articles->cover_image}}</div>
</div>
@endsection
