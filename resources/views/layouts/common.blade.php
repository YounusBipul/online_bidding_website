<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{config('app.name')}} | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{URL::to('/')}}/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{URL::to('/')}}/css/core-style.css">
   
    <link rel="stylesheet" href="{{URL::to('/')}}/css/app.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->
        <!-- ##### Main Content Wrapper Start ##### -->
       
        

      <div class="main-content-wrapper d-flex clearfix">
            
            <!-- Mobile Nav (max width 767px)-->
            <div class="mobile-nav">
                <!-- Navbar Brand -->
                <div class="amado-navbar-brand">
                    <a href="index.html"><img src="{{URL::to('/')}}/img/core-img/logo.png" alt=""></a>
                </div>
                <!-- Navbar Toggler -->
                <div class="amado-navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>
        
            
             <!-- Header Area Start -->
             <header class="header-area clearfix">
                <!-- Close Icon -->
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
                <!-- Logo -->
                <div class="logo">
                    <a href="{{URL::to('/')}}"><img src="{{URL::to('/')}}/img/core-img/logo.png" alt=""></a>
                </div>
                
                
                
                <!-- Amado Nav -->
                <nav class="amado-nav navbar">
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{URL::to('/')}}/img/user.jpg" width='20%'>{{Auth::user()->name}} </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{URL::to('/')}}/myprofile">View Profile</a>
                                <a href="#">Edit info</a>
                                <a href="{{URL::to('/')}}/myposts/{{Auth::user()->id}}">My posts</a>
                                <a href="{{URL::to('/')}}/mybids/{{Auth::user()->id}}">My bids</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                        
                                    
                            </div>
                        </li>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><a href="{{URL::to('/')}}/create_post">Create Post</a></li>
                        <li><a href="{{URL::to('/')}}/category/0">All Product</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($Categories as $category)
                                    <a href="{{URL::to('/')}}/category/{{$category->id}}">{{$category->name}}</a>
                                @endforeach
                                
                                <!--<a href="#">Beds</a>
                                <a href="#">Accesories</a>
                                <a href="#">Furniture</a>
                                <a href="#">Home Deco</a>
                                <a href="#">Dressings</a>
                                <a href="#">Tables</a>-->
                            </div>
                        </li>
                        
                        
                        
                        
                        <li><a href="cart.html">How it works</a></li>
                        
                    </ul>
                </nav>
                <!-- Button Group -->
                <!--<div class="amado-btn-group mt-30 mb-100">
                    <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                    <a href="#" class="btn amado-btn active">New this week</a>
                </div>-->
                <!-- Cart Menu -->
                <hr>
                <div class="cart-fav-search mb-100">
                   <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite <span>(0) </span></a>
                    <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
                </div>
                <!-- Social Button -->
                <!--<div class="social-info d-flex justify-content-between">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>-->
            </header>
            <!-- Header Area End -->

            @yield('content')

        </div>
    <!-- ##### Footer Area Start ##### -->
    
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{URL::to('/')}}/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{URL::to('/')}}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="{{URL::to('/')}}/js/plugins.js"></script>
    <!-- Active js -->
    <script src="{{URL::to('/')}}/js/active.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>    
</html>