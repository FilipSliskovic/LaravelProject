@extends('layouts.layout')

@section('title') Register @endsection
@section('description') Register page @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection



@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Register</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Register</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Menu Start -->





    <div class="container mt-4 min-vh-30">

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

        <form action="{{route('Login-registerUser')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" />
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Full name</label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
