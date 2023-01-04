@extends('layouts.AdminLayout')

@section('title') Admin - Products @endsection
@section('description') view create or delete our products @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection



@section('content')





    <!-- Menu Start -->



    <div class="col-md-6">
        {{--    <div class="container-fluid pt-5">--}}
        {{--        <div class="container">--}}
        {{--            <div class="section-title">--}}
        {{--                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>--}}
        {{--                <h1 class="display-4">Competitive Pricing</h1>--}}
        {{--            </div>--}}
        <div class="row">
            <div class="col-lg-12">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>
                    </div>
                @endif

                @if (session('success-msg'))
                    <div class="alert alert-success">
                        <p>{{session('success-msg')}}</p>
                    </div>
                @endif

                @if (session('error-msg'))
                    <div class="alert alert-danger">
                        <p>{{session('error-msg')}}</p>
                    </div>
                @endif



                <form class="mb-5" method="post" action="{{route('Products-store')}}" enctype="multipart/form-data" >

                    @csrf


                    <div class="form-group">

                        <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Name"
                               required="required" name="name" value="{{old('name')}}" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Description"
                               required="required" name="description" value="{{old('description')}}" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Price"
                               required="required" name="Price" value="{{old('Price')}}" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Amount"
                               required="required" name="Amount" value="{{old('Amount')}}" />
                    </div>
                    <div class="form-group">
                        <div class="date" id="date" data-target-input="nearest">
                            <input type="file" class="form-control bg-transparent border-primary p-4 datetimepicker-input"
                                   placeholder="Image" name="image" />
                        </div>
                    </div>
                    {{--                        <div class="form-group">--}}
                    {{--                            <div class="time" id="time" data-target-input="nearest">--}}
                    {{--                                <input type="text" class="form-control bg-transparent border-primary p-4 datetimepicker-input"--}}
                    {{--                                       placeholder="Time" data-target="#time" data-toggle="datetimepicker"/>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <div class="form-group">
                        {{--                            <label for="ParentId">Parent category name</label>--}}
                        <select name="Category" class="custom-select bg-transparent border-primary px-4" style="height: 49px;">
                            <option value="0" selected>Category</option>--}}
                            @foreach($data['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>--}}

                                {{--                                <option selected>Person</option>--}}
                                {{--                                <option value="1">Person 1</option>--}}
                                {{--                                <option value="2">Person 2</option>--}}
                                {{--                                <option value="3">Person 3</option>--}}
                                {{--                                <option value="3">Person 4</option>--}}
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Add a new product</button>
                    </div>
                </form>


                {{--                    {{dd($categories)}}--}}


            </div>
        </div>
        {{--        </div>--}}
    </div>
    <!-- Menu End -->
@endsection
