<!DOCTYPE html>
<html lang="en">
        <head>
            {{-- <script nonce="50225685-8cb8-4ba1-9613-6b26ec5dc4f2">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]},a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script> --}}
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> @yield('dashboardtitle') </title>
            <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css"> --}}
            <!-- Font Awesome Icons -->
            {{-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}

            <link rel="stylesheet" href="{{asset('css/app.css')}}">
            <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

        </head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">

                                    <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                    </button>

                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                             <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger rounded-pill navbar-badge ">{{$messages->count()}}</span>
                    </a>
                    

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end " style="width: 20rem;">
                    @foreach ($messages as $message)
                <a href="{{action('MessageController@show', $message->id)}}" class="dropdown-item">
                    <div class="media">
                        
                        <div class="media-body">
                            <h3 class="dropdown-item-title fw-bold">
                                {{$message->senderName}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm mt-1">{{$message->message}}.</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  {{$message->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </a>

            <div class="dropdown-divider"></div>
                    @endforeach
            <a href="{{action('MessageController@index')}}" class="dropdown-item dropdown-footer">See All Messages</a>
           
        </div>
          
    </li> 




    <li class="nav-item dropdown ">
        <a class="nav-link  dropdown-toggle" data-bs-toggle="dropdown" href="#">
            <i class="far fa-bell mr-1"></i>
            <span class="badge badge-warning rounded-pill navbar-badge">15</span>
        </a>



        <div class="dropdown-menu dropdown-menu-lg-end" style="width: 17rem;">

            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>

        </div>
    </li>



    <li class="nav-item dropdown no-arrow">
                    
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 medium">{{Auth::user()->username}}</span>
            <img class="img-profile rounded-circle" src="../1.jpg">
        </a>
                   
        <!-- Dropdown - User Information -->
                   
        <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
           
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>

                       
            <div class="dropdown-divider"></div>

                        
            <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </li>


</ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow:hidden">

    <a href="#" class="brand-link text-decoration-none">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}

            <div  class="brand-image img-circle elevation-3" style="opacity: .8">
                <img src="" class="img-circle elevation-2" >
            </div>

        <span class="brand-text font-weight-light ">brand here...</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" class="img-circle elevation-2" >
            </div>

            <div class="info">
                <a href="#" class="d-block text-decoration-none">{{Auth::user()->member->fullName}}</a>
            </div>

        </div>


        {{-- <div class="form-inline">

            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}


  
                      <!-- Sidebar Menu -->
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{action('UserAccountController@user')}}" class="nav-link">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-money-bill-alt"></i>
                                    <p>
                                        Financial Issues
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{action('MemberController@donate')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Donate</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('MemberController@status')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Promise Status</p>
                                        </a>
                                    </li>
                                    
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-bible"></i>
                                    <p>
                                        Educational Material
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{action('EducMaterialController@displayBooks')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Books</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{action('EducMaterialController@displayArticles')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Articles</p>
                                        </a>
                                    </li>
                                    
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{action('MessageController@index')}}" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Message
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('editMember',['id'=>Auth::user()->member_id])}}" class="nav-link">
                                        <i class="nav-icon fas fa-cog"></i>
                                        <p>
                                            Update Profile
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                 </ul>
                </nav>
        </div>
</aside>

<div class="content-wrapper">
    <div class="content-header">
      
    </div>



    <div class="content">
        
        @yield('content')
        @include('layouts.messages')

    </div>

</div>


 <footer class="main-footer">
    <!-- To the right -->
    
    <div class="float-center text-center">
                  <strong> Copyright: &copy; 2022 <a class="text-success fw-bold" href="#">ምስካየ ህዙናን መዳናሌም ገዳም</a> </strong>.
                  All rights reserved.
    </div>

    <!-- Default to the left -->
  </footer>

</div>

    {{-- <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> --}}
    <!-- AdminLTE App -->
    
    {{-- <script src="dist/js/adminlte.min.js"></script> --}}

<script src="{{asset('js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>
