@extends('frontend.app3')
@section('title','Home')
@section('body')
    
        <div class="row">
          <!-- section 1 -->
         <div class="col-md-8">
          <h4>Video Section</h4>
           <div class="row mt-2">
             <div class="col-md-6">
              <div class="position-absolute btn btn-danger float-right m-2" ><i class="fa fa-play" aria-hidden="true"></i></div>
                @if ($video->content_type=='video')
                <img src="{{$video->content_img}}" class="img-thumbnail" alt="...">
             
                <h6 class="card-title">{{$video->content_title}}</h6>
                <p class="card-text">{{$video->content_body}}</p>   
                @endif

             </div>


             <div class="col-md-6">
               
               <div class="row">
              
                @foreach ($contentVideo as $item)
                <div class="col-md-6">
                  <div class="position-absolute btn btn-danger float-right m-2" ><i class="fa fa-play" aria-hidden="true"></i></div>
                  <a href="{{ URL::to('/singlePost/'.$item->id) }}"> <img src="{{ $item->content_img}}" alt="image" class="img-thumbnail"></a>
                  
                  <h6 class="card-title">{{ $item->content_title}}</h6>
                </div>
               </div>
                @endforeach
                
             </div>
           </div>
         </div>

         
         <!-- section 2 -->
         <div class="col-md-4">
          <h4>Image Section</h4>
           <div class="row m-2">
             <div class="col-md-12">
              
                <img src="{{$image->content_img}}" class="img-thumbnail" alt="...">
               
                    <h6 class="card-title">{{$image->content_title}}</h6>
                    <p class="card-text">{{$image->content_body}}</p>
                  
                 
            
           </div>
           </div>
    
           <div class="row m-3">
             <div class="col-md-12">
            <div class="row">
              @foreach ($contentImage as $row)
              <div class="col-md-6">
                <a href="{{ URL::to('/singlePost/'.$row->id) }}"><img src="{{ $row->content_img}}" alt="..." class="img-thumbnail"></a>
                <h6 class="card-title">{{ $row->content_title}}</h6></div>
              @endforeach
           
           
            
           </div>
           </div>
         </div>
        </div>

         <!-- footer 2 -->
        <div class="row">
          <div class="col-md-12 wf"></div>
         </div>
         @endsection