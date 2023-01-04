@extends('layouts.AdminLayout')

@section('title') Admin - Nav @endsection
@section('description') Admin - Nav  @endsection
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



                    <form class="mb-5" method="post" action="{{route('NavMenu-store')}}"  >

                        @csrf


                        <div class="form-group">

                            <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Name"
                                   required="required" name="name" value="{{old('name')}}" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="Route"
                                   required="required" name="Route" value="{{old('Route')}}" />
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <div class="date" id="date" data-target-input="nearest">--}}
{{--                                <input type="text" class="form-control bg-transparent border-primary p-4 datetimepicker-input"--}}
{{--                                       placeholder="AccessLevel" name="AccessLevel" />--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <select name="AccessLevel" class="custom-select bg-transparent border-primary px-4" style="height: 49px;">
                                <option value="0" selected>0 - Admin</option>
                                <option value="1">1 - Logged in</option>
                                <option value="2">2 - Guest</option>


                            </select>
                        </div>

                        <div>
                            <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Add a new nav item</button>
                        </div>
                    </form>


                    {{--                    {{dd($categories)}}--}}


                </div>
            </div>
{{--        </div>--}}
    </div>
    <!-- Menu End -->
@endsection
