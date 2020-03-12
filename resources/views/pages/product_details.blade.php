@extends('layouts.common')
@section('content')


 <!-- Product Details Area Start -->
 <div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        @foreach ($posts as $post)
      
        <h3 id="demo" align='center'></h3>
        <div class="row">
                
            <div class="col-12 col-lg-6">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <!--<ol class="carousel-indicators">
                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{URL::to('/')}}/img/product-img/pro-big-1.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{URL::to('/')}}/img/product-img/pro-big-2.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url({{URL::to('/')}}/img/product-img/pro-big-3.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url({{URL::to('/')}}/img/product-img/pro-big-4.jpg);">
                            </li>
                        </ol>-->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="{{URL::to('/')}}/storage/img/product_images/{{$post->pic_name}}">
                                <img class="d-block w-100" src="{{URL::to('/')}}/storage/img/product_images/{{$post->pic_name}}" alt="First slide">
                                </a>
                                <h4>Posted by: {{$post_creator[0]->name}} <br> at {{$post_creator[0]->created_at}}</h4>
                                <!-- storing seller info-->
                                <p id='seller_info' style="display : none">
                                    Sller contact info: <br>
                                    {{$post_creator[0]->name}}<br>{{$post_creator[0]->email}}
                                
                                </p>
                                <input type="hidden" value="{{$post_creator[0]->id}}" id="seller_id">
                            </div>
                            @if (count($bids)>0)
                                <div class="container">
                                        <br> <br> <br>
                                        <h2> <span id="win_change">Highest Bid By</span>: {{$bids[0]->name}} </h2>
                                        <h3>Bidded : {{$bids[0]->bid_amount}} Tk</h3>
                                        <!-- storing winner info-->
                                        <p id= 'winner_info' style="display : none">
                                            winner contact info: <br>
                                            {{$bids[0]->name}} <br> {{$bids[0]->email}}
                                           
                                        </p>
                                        <input type="hidden" value="{{$bids[0]->wid}}" id="winner_id">
                                </div>
                                    
                            @endif
                            <!-- storing user info-->
                            <input type="hidden" value="{{Auth::user()->id}}" id="user_id">
                                <!--  <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                    <img class="d-block w-100" src="{{URL::to('/')}}/img/product-img/pro-big-2.jpg" alt="Second slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                    <img class="d-block w-100" src="{{URL::to('/')}}/img/product-img/pro-big-3.jpg" alt="Third slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                    <img class="d-block w-100" src="{{URL::to('/')}}/img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">{{$post->starting_bid}} TK</p>
                        
                        <h2>{{$post->title}}</h2>
                        
                       <!-- hidden input of time -->
                    <input type="hidden" id='duration' value="{{$post->ends_at}}">
                    </div>

                    <div class="short_overview my-5">
                        <p>{{$post->details}}</p>
                    </div>
                   
                    <!-- Bid on the post -->
                    
                    {{Form::open(["action" => 'BidsController@store', 'method'=> 'post'])}}
                        <div class="cart-btn d-flex mb-50">
                            <h4>Bid </h4>
                            <input type="number" name="bid_amount" id='bid_box' class="form-control">

                        <input type="hidden" name="post_id" value="{{$post->id}}">
                            
                        </div>
                    @if($post->user_id == auth()->user()->id)
                        <button type="submit" name="addtocart" id='bid_button' value="5" class="btn amado-btn" disable='true'>BID</button>
                    @else
                    <button type="submit" name="addtocart" id='bid_button' value="5" class="btn amado-btn" >BID</button>
                    {{Form::close()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--bidded amount of others -->
    <hr>
   
    
    <div class="container">
        
            <img src="{{URL::to('/')}}/img/adver2.jpg">
    </div>
    @if (count($bids)>0)
    <div class="container clearfix" style="margin-top: 20px">
        <table class="table table-dark" >
            <tr> <th scope="col">Name</th> <th scope="col">Bidded amount</th> </tr>
        @foreach ($bids as $bid)
            <tr>
                <td>{{$bid->name}}</td> <td> {{$bid->bid_amount}}</td>
            </tr>
        @endforeach
        </table>

    </div>
    @else
    <div class="container clearfix" style="margin-top: 20px">
        <h2 align='center'> Be the first person to Bid on this post !!! </h2>
    </div>
    @endif
    @endforeach
   
</div>
    
</div>
<!-- Product Details Area End -->

@endsection

<script>
    window.onload = function() {
    // Set the date we're counting down to
    var duration= document.getElementById('duration').value;
    var countDownDate = new Date(duration).getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get todays date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = "Ends in : "+days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
    
      // If the count down is finished, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        document.getElementById("bid_box").disabled = true;
        document.getElementById("bid_button").disabled = true;
        document.getElementById("win_change").innerHTML = "The winner is ";
        
        var winner= document.getElementById("winner_id").value;
        var user= document.getElementById("user_id").value;
        var seller= document.getElementById("seller_id").value;
        
        if(user==winner){
        document.getElementById('seller_info').style.display= 'block';
        }
        else if(user==seller){
          
          document.getElementById('winner_info').style.display= 'block';
        }
      }
    }, 1000);
    
    /*function viewinfo(){
     
      var winner= document.getElementById("winner_id").value;
        var user= document.getElementById("user_id").value;
        var seller= document.getElementById("seller_id").value;
       if(user==winner){
       var s=document.getElementById('seller_info').innerHTML;
       alert(s);
       }
       if(user==seller){
       var s=document.getElementById('winner_info').innerHTML;
       alert(s);
       }
    }*/
    }
</script>