<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
	<link href="{{asset('css/mdb.min.css')}}" rel="stylesheet" >
	<link href="{{asset('css/sidenav.css')}}" rel="stylesheet" >
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet" >
	<link href="{{asset('css/datatables.min.css')}}" rel="stylesheet" >
	<link href="{{asset('css/datatables-select.min.css')}}" rel="stylesheet" >
	<link href="{{asset('css/style.css')}}" rel="stylesheet" >

	 <!-- Fonts -->
	 <link rel="dns-prefetch" href="//fonts.gstatic.com">
	 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
 
	 <!-- Styles -->
	 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	 

</head>
<body class="fix-header fix-sidebar">
	   

 <!-- left side navigavion menu -->
@include('admin.Layout.menu')


<!-- Right side page content -->

@yield('content')






</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sidebarmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sticky-kit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.min-2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Scripts for datatable -->
<script>

 $('#datatable').DataTable();
     $('.dataTables_length').addClass('bs-select');
     

   </script>
   <!-- Scripts for notification -->
   <script>
	@if(Session::has('messege'))
	  var type="{{Session::get('alert-type','info')}}"
	  switch(type){
		  case 'info':
			   toastr.info("{{ Session::get('messege') }}");
			   break;
		  case 'success':
			  toastr.success("{{ Session::get('messege') }}");
			  break;
		  case 'warning':
			  toastr.warning("{{ Session::get('messege') }}");
			  break;
		  case 'error':
			  toastr.error("{{ Session::get('messege') }}");
			  break;
	  }
	@endif
  </script>
<!-- Scripts for delete-->
<script>  
	$(document).on("click", "#delete", function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		   swal({
			 title: "Are you Want to delete?",
			 text: "Once Delete, This will be Permanently Delete!",
			 icon: "warning",
			 buttons: true,
			 dangerMode: true,
		   })
		   .then((willDelete) => {
			 if (willDelete) {
				  window.location.href = link;
			 } else {
			   swal("Safe Data!");
			 }
		   });
	   });
</script>
@yield('script')

</body>
</html>