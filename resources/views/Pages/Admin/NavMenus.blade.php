@extends('layouts.AdminLayout')

@section('title') Admin - Nav  @endsection
@section('description') Admin - Nav  @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection




@section('content')






    <!-- Menu Start -->




{{--    <div class="container-fluid pt-5">--}}
{{--        <div class="container">--}}
{{--            <div class="section-title">--}}
{{--                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>--}}
{{--                <h1 class="display-4">Competitive Pricing</h1>--}}
{{--            </div>--}}

    <div class="col-md-9 ">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Route</th>
                        <th scope="col">Access Level</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($data['menu']) >= 1 )
                    @foreach($data['menu'] as $menu)
                    <tr>
                        <th scope="row">{{$menu->id}}</th>
                        <td >{{$menu->Name}}</td>
                        <td  >{{$menu->Route}}</td>
                        <td  >{{$menu->AccessLevel}}</td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <th>No items</th>
                    </tr>
                    @endif

                    </tbody>
                </table>
                <a href="{{route('NavMenu-create')}}" class="btn badge-primary">Create new</a>

            </div>

    </div>
        <!-- Menu End -->
@endsection
