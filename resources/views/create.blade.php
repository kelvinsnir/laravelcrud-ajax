@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <h2>Laravel crud application</h2>
           @include('alerts.errors')
          <form action="{{ url('/insert')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="email">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
            </div>
            <div class="form-group">
              <label for="email">author</label>
              <input type="text" class="form-control" id="title" placeholder="Enter title" name="author">
            </div>

            <div class="form-group">
              <div class="row">
                <label for=category class="col-md-3">category</label>
                <select name="category_id" class="form-control">
                  <option value="">choose category</option>
                  @foreach($categories as category)
                   <option value="{{category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="pwd">description</label>
              <input type="text" class="form-control" id="desc" placeholder="Enter description" name="description">
            </div>

            <div class="form-group">
              <input type="file" name="cover_image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>
@endsection
