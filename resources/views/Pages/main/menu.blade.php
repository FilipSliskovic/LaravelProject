@extends('layouts.layout')

@section('title') Menu @endsection
@section('description') See our whole menu @endsection
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

{{--                {{dd($data['categories'])}}--}}

                @foreach($data['categories'] as $c)
                <div class="col-lg-6">
                    <h1 class="mb-5">{{$c->name}}</h1>

                    @foreach($data['proizvodi']->where('category_id','=',$c->id) as $product)
                        {{--                    {{dd($product->image->first()->Path)}}--}}
                        <x-product-card  :title="$product->Name" :alt="$product->Name" :description="$product->Description" :image="$product->image->first()->Path" :price="$product->Price" />
                    @endforeach
                </div>
                @endforeach


{{--                {{dd($data['categories'])}}--}}
{{--                @foreach($data['proizvodi'] as $product)--}}
{{--                    {{dd($product->image->first()->Path)}}--}}
{{--                    <x-product-card  :title="$product->Name" :alt="$product->Name" :description="$product->Description" :image="$product->image->first()->Path" :price="$product->Price" />--}}
{{--                @endforeach--}}


{{--                <div class="row align-items-center mb-5">--}}
{{--                    <div class="col-4 col-sm-3">--}}
{{--                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-1.jpg" alt="">--}}
{{--                        <h5 class="menu-price">$5</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-8 col-sm-9">--}}
{{--                        <h4>Black Coffee</h4>--}}
{{--                        <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row align-items-center mb-5">--}}
{{--                    <div class="col-4 col-sm-3">--}}
{{--                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-2.jpg" alt="">--}}
{{--                        <h5 class="menu-price">$7</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-8 col-sm-9">--}}
{{--                        <h4>Chocolete Coffee</h4>--}}
{{--                        <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row align-items-center mb-5">--}}
{{--                    <div class="col-4 col-sm-3">--}}
{{--                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="img/menu-3.jpg" alt="">--}}
{{--                        <h5 class="menu-price">$9</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-8 col-sm-9">--}}
{{--                        <h4>Coffee With Milk</h4>--}}
{{--                        <p class="m-0">Sit lorem ipsum et diam elitr est dolor sed duo guberg sea et et lorem dolor</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
{{--            <div class="col-lg-6">--}}
{{--                <h1 class="mb-5">Cold Coffee</h1>--}}
{{--                @foreach($data['products'] as $product)--}}
{{--                    <x-product-card  :title="$product->title" :alt="$product->alt" :description="$product->description" :image="$product->image" :price="$product->price" />--}}
{{--                @endforeach--}}
{{--            </div>--}}

    </div>
</div>
<!-- Menu End -->
@endsection
