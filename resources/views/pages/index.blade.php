
@extends('layouts.common')
@section('content')
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        @foreach($Categories as $category)
            <!-- Single Catagory -->
            <div class="single-products-catagory clearfix">
            <a href="category/{{$category->id}}">
                <img src="{{URL::to('/')}}/img/category/{{$category->pic_name}}" alt="">
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <div class="line"></div>
                    
                    <h4>{{$category->name}}</h4> 
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
<!-- Product Catagories Area End -->


@endsection