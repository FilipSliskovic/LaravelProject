@extends('layouts.AdminLayout')

@section('title') Products @endsection
@section('description') Products @endsection
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
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @if(count($data['proizvodi']) >= 1 )
                    @foreach($data['proizvodi'] as $product)
                        {{--                            {{dd($menu)}}--}}
                        <tr id="product_{{$product->id}}">
{{--                            {{dd($product)}}--}}
                            <th scope="row">{{$product->id}}</th>
                            <td class="col-2 col-sm-2" ><img class="w-100 mb-1 mb-sm-0" src="{{asset('assets/img/'.$product->image->first()->Path)}}"></td>
                            <td>{{$product->Name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->Description}}</td>
                            <td>{{$product->Price}}</td>
                            <td>{{$product->Amount}}</td>
                            <td>
{{--                                <button class="btn btn-primary">Update</button>--}}
                                <button class="btn btn-danger mt-1" onclick="removeProd({{$product->id}})">Delete</button>
                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th>No items</th>
                    </tr>
                @endif

                </tbody>
            </table>
            <a href="{{route('Products-create')}}" class="btn badge-primary">Create new</a>


        </div>
    </div>
    </div></div>
    <!-- Menu End -->
@endsection



@section('additionalScripts')
    <script>

        function removeProd(id)
        {
            // alert(id);
            // let trToRemove = $("#rezervation" + id);
            // alert(trToRemove)
            // trToRemove.remove();

            $.ajax({
                method: "DELETE",
                url: "/products/" + id,
                success: function() {
                    let rezToRemove = $("#product_" + id);

                    rezToRemove.remove();
                },
                error: function(xhr) {
                    console.log(xhr)
                    alert('An error occured');
                    location.reload();
                }
            })
        }



    </script>
@endsection

