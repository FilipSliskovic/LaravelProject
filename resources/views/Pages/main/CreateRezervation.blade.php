@extends('layouts.layout')

@section('title') Rezervations @endsection
@section('description') Create a new rezervation @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection



@section('content')




    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Rezervation</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{route('Home-index')}}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Rezervation</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->





    <!-- Menu Start -->




        {{--    <div class="container-fluid pt-5">--}}
        {{--        <div class="container">--}}
        {{--            <div class="section-title">--}}
        {{--                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>--}}
        {{--                <h1 class="display-4">Competitive Pricing</h1>--}}
        {{--            </div>--}}
        <div class="row">
            <div class="col-lg-5 m-auto">


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



                <form class="mb-5" method="post" action="{{route('Rezervation-store')}}" enctype="multipart/form-data" >

                    @csrf


{{--                    <div class="form-group">--}}

{{--                        <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Name"--}}
{{--                               required="required" name="name" value="{{old('name')}}" />--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <input type="datetime-local" class="form-control bg-transparent border-primary p-4"
                               required="required" name="dateAndTime" value="{{old('dateAndTime')}}" />
                    </div>

                    <div class="form-group">
                        {{--                            <label for="ParentId">Parent category name</label>--}}
                        <select name="table" class="custom-select bg-transparent border-primary px-4" style="height: 49px;">
                            <option value="0" selected>Table</option>--}}
                            @foreach($data['tables'] as $t)
                                <option value="{{$t->id}}">{{$t->name}}: Seats: {{$t->seats}}</option>

{{--                                                                <option selected>Person</option>--}}
{{--                                                                <option value="1">Person 1</option>--}}
{{--                                                                <option value="2">Person 2</option>--}}
{{--                                                                <option value="3">Person 3</option>--}}
{{--                                                                <option value="3">Person 4</option>--}}
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

    <!-- Menu End -->
@endsection
