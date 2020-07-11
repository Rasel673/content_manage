@extends('frontend.app3')
@section('title','post')
@section('body')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">{{$single->content_title}}</div>
                <div class="panel-body">
                    @if ($single->content_type=='video')
                    {!!$single->embaded_link!!}
                    @else
                    <img src="{{asset($single->content_img)}}" alt="image" class="img-thumbnail">
                    @endif

                    <p class="card-text">{{$single->content_body}}</p>
                </div><!-- panel-body -->
            </div>
           <div class="mt-3">
               <label>Share Options:</label>
               <a href="https://www.facebook.com/" target="_blank" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i></a>
               <a href="https://twitter.com/" target="_blank" class="btn btn-info"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
               </div> 
    </div>
</div>
@endsection