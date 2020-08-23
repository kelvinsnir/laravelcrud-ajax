@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <h2>Laravel crud application</h2>
           @include('alerts.errors')
         <form action="{{ url('edit',[$articles->id]) }}" method="POST" >  
            {{csrf_field()}}
            <div class="form-group">
              <label for="email">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$articles->title}}">
            </div>
            <div class="form-group">
              <label for="pwd">description</label>
              <input type="text" class="form-control" id="desc" placeholder="Enter description" name="description"  value="{{$articles->description}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
    </div>
</div>
@endsection
