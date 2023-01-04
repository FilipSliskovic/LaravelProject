@extends('layouts.AdminLayout')

@section('title') Users @endsection
@section('description') Users @endsection
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
            @if (session('error-msg'))
                <div class="alert alert-danger">
                    <p>{{session('error-msg')}}</p>
                </div>
            @endif



            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
{{--                    <th scope="col">Parent id</th>--}}
                </tr>
                </thead>
                <tbody>

                @if(count($data['users']) >= 1 )
                    @foreach($data['users'] as $u)
                        {{--                            {{dd($menu)}}--}}
                        <tr id="user_{{$u->id}}">
                            <th scope="row">{{$u->id}}</th>
{{--                            <td class="col-2 col-sm-2" ><img class="w-100 mb-1 mb-sm-0" src="{{asset('assets/img/'.$menu->Path)}}"></td>--}}
                            <td>{{$u->email}}</td>
                            <td>{{$u->name}}</td>
                            <td>
                                @if($u->role == 0)
                                    Admin
                                @else
                                    Registrovan korisnik
                                @endif
                            </td>
                            <td>
{{--                                <button class="btn btn-primary">Update</button>--}}
                                <button class="btn btn-danger mt-1" onclick="removeUser({{$u->id}})">Delete</button>
                            </td>


{{--                            <td>{{$menu->parent_id}}</td>--}}
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th>No items</th>
                    </tr>
                @endif

                </tbody>
            </table>


        </div>
    </div>
    </div></div>
    <!-- Menu End -->
@endsection


@section('additionalScripts')
    <script>

        function removeUser(id)
        {
            // alert(id);
            // let trToRemove = $("#rezervation" + id);
            // alert(trToRemove)
            // trToRemove.remove();

            $.ajax({
                method: "DELETE",
                url: "/users/" + id,
                success: function() {
                    let catToRemove = $("#user_" + id);

                    catToRemove.remove();
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
