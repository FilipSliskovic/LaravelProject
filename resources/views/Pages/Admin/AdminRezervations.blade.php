@extends('layouts.AdminLayout')

@section('title') Admin - Rezervations @endsection
@section('description') Rezervations @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection




@section('content')



    {{--    <!-- Page Header Start -->--}}
    {{--    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">--}}
    {{--        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">--}}
    {{--            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>--}}
    {{--            <div class="d-inline-flex mb-lg-5">--}}
    {{--                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>--}}
    {{--                <p class="m-0 text-white px-2">/</p>--}}
    {{--                <p class="m-0 text-white">Menu</p>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- Page Header End -->--}}


    <!-- Menu Start -->



    <div class="col-md-6">
        {{--    <div class="container-fluid pt-5">--}}
        {{--        <div class="container">--}}
        {{--            <div class="section-title">--}}
        {{--                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>--}}
        {{--                <h1 class="display-4">Competitive Pricing</h1>--}}
        {{--            </div>--}}
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Table</th>
                    <th scope="col">Date and Time</th>
                </tr>
                </thead>
                <tbody>

                @if(count($data['rezervation']) >= 1 )
                    @foreach($data['rezervation'] as $t)
                        {{--                            {{dd($menu)}}--}}
                        <tr>
                            <th scope="row">{{$t->id}}</th>
                            <td>{{$t->user->name}}</td>
                            <td>{{$t->table->name}}</td>
                            <td>{{$t->DateAndTime}}</td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th>No items</th>
                    </tr>
                @endif

                </tbody>
            </table>
{{--            <a href="{{route('Categories-create')}}" class="btn badge-primary">Create new</a>--}}
            {{$data['rezervation']->links('pagination::bootstrap-4')}}

        </div>
    </div>
    </div></div>
    <!-- Menu End -->
@endsection
