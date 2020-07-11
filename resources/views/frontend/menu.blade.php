<div class="row mb-4">
    <div class="col-md-12">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
           </li>
           @if (session()->has('name'))
           <li class="nav-item">
            <a class="nav-link" href="{{url('/content')}}">Admin</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{url('/Login')}}">Login</a>
          </li>
       
           @endif
          
         </ul>
         
       </div>
     </nav>
    </div>
   </div>