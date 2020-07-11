
 <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li> 
                     <li class="nav-item mt-3 text-danger">{{session('name')}}</li>
					</ul>
                    <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="{{url('/onLogout')}}" class="btn btn-sm btn-danger">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                        <li> <a href="{{url('/home')}}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>
                    <li> <a href="{{url('/content')}}"><span> <i class="fa fa-clipboard" aria-hidden="true"></i> </span><span class="hide-menu">Content</span></a></li>
                        <li> <a href="{{url('/')}}" ><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">View Site</span></a></li>
                        
                        </ul>
                </nav>
            </div>
        </aside>
<div class="page-wrapper">