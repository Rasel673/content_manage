@extends('admin.Layout.app')
@section('content')
<div class="container">
    <div class="row  m-4  text-center">
      <div class="col-md-3">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title">{{$content}}</h3>
              <p class="card-text">Total Content</p>
            </div>
          </div>
      </div>
  
      <div class="col-md-3">
        <div class="card" >
            <div class="card-body">
            <h3 class="card-title">{{$video}}</h3>
              <p class="card-text">Total Video Content</p>
            </div>
          </div>
      </div>

      <div class="col-md-3">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title">{{$image}}</h3>
              <p class="card-text">Total Image Content</p>
            </div>
          </div>
      </div>
      
    </div>
    
  </div>
@endsection

