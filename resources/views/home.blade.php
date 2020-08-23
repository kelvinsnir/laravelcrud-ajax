@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('alerts.success')
        <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         @if(count($articles) > 0)
               @foreach($articles as $article)
              <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->description}}</td>
                <td>
                    <a href='{{ url("/read/{$article->id}") }}'  class="btn btn-primary btn-sm">Read</a>
                    <a href ='{{ url("/update/{$article->id}") }}' class="btn btn-success btn-sm">Update</a>
                    <a href='{{ url("/delete/{$article->id}") }}' class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            @endforeach
        @endif
        </tbody>
      </table>
      {{$articles->render()}}
    </div>
</div>
@endsection
