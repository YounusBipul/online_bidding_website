@extends('layouts.common')
@section('content')
    <div class="single-product-area container-fluid clearfix">
        <div class="container" style="margin-bottom : 40px">
            <h2>Create Post</h2>
        </div>
        
       {{Form::open(["action" => 'PostsController@store', 'method'=> 'post' ,'enctype'=>'multipart/form-data'])}}
       <!-- <form action='posts/store' method='POST'> -->
            <div class="form-group">
                <label>Title</label>
                <input type='text' class="form-control" name='title'><br>
            </div>
            <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name='category'>
                        @foreach($Categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label>Details</label>
                <textarea name="details" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label>Strting Bid</label>
                <input type='number' class="form-control" name="starting_bid" ><br>
            </div>
            <div class="form-group">
                    <label>Ending time</label>
                    <input type='datetime-local' class="form-control" name="ending_time" ><br>
                </div>
            <div class="form-group">
                <label>Picture</label>
                <input type='file' name="product_picture" ><br>
            </div>
            <div class="form-group">
                <input type='submit' value='Create Post' class="form-control btn btn-primary" ><br>
            </div>
        <!-- </form> -->
        {{Form::close()}}
        
                <img src="{{URL::to('/')}}/img/adver2.jpg">
       
    </div>
@endsection