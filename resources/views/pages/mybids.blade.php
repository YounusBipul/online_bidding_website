@extends('layouts.common')
@section('content')
    
    <div class="shop_sidebar_area">
        <h3>Advertisement</h3>
       <img src="{{URL::to('/')}}/img/adver1.jpg">
       <br><br><br><br><br>
       <img src="{{URL::to('/')}}/img/adver1.jpg">

        
    </div>

    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                @if(count($posts)>0)

                    @foreach($posts as $post)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                            <img src="{{URL::to('/')}}/storage/img/product_images/{{$post->pic_name}}" alt="">
                                <!-- Hover Thumb -->
                                <!--<img class="hover-img" src="{{URL::to('/')}}/img/product-img/product2.jpg" alt=""> -->
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">{{$post->starting_bid}} TK</p>
                                    <a href="{{URL::to('/')}}/show_product/{{$post->id}}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <h5>Bidding ends at : {{$post->ends_at}}</h5>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="cart">
                                        <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{URL::to('/')}}img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else 
                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <h2>No post in this category</h2>
                    </div>
                </div>>
                @endif
                    
              
              <!-- ##### Main Content Wrapper End ##### -->

@endsection