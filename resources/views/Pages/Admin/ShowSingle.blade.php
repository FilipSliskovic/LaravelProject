@extends('layouts.layout')

@section('title') Home @endsection
@section('description') The main page of our Cafe @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection



@section('content')



    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Menu</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Menu Start -->




    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
                <h1 class="display-4">Competitive Pricing</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="mb-5" method="post" action=""  >

                        @csrf
{{--                        {{dd($data)}}--}}

                        <div class="form-group">

                            <input type="text" class="form-control bg-transparent border-primary p-4" value="{{$data->name}}"
                                   required="required" name="name" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent border-primary p-4" value="{{$data->description}}"
                                   required="required" name="description" />
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control bg-transparent border-primary p-4" value="{{$data->image_id}}"
                                   required="required" name="image" />
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="time" id="time" data-target-input="nearest">--}}
                        {{--                                <input type="text" class="form-control bg-transparent border-primary p-4 datetimepicker-input"--}}
                        {{--                                       placeholder="Time" data-target="#time" data-toggle="datetimepicker"/>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-group">
                            {{--                            <label for="ParentId">Parent category name</label>--}}
                            <select name="ParentCategory" class="custom-select bg-transparent border-primary px-4" style="height: 49px;">
                                <option value="{{$data->parent_id}}" selected>Select parent category</option>--}}
                                @foreach($categories as $category)
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
                            <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Update</button>
                        </div>
                    </form>


                    {{--                    {{dd($categories)}}--}}


                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
@endsection
