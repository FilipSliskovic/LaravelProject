@extends('layouts.AdminLayout')

@section('title') Admin - Categories @endsection
@section('description') Admin - Categories @endsection
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
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($data['categories']) >= 1 )
{{--                        {{dd($data['categories'])}}--}}
                        @foreach($data['categories'] as $menu)
{{--                            {{dd($menu)}}--}}
{{--                        {{dd($menu)}}--}}
                            <tr id="category_{{$menu->id}}" >
                                <th scope="row">{{$menu->id}}</th>
                                <td class="col-2 col-sm-2" ><img class="w-100 mb-1 mb-sm-0" src="{{asset('assets/img/'.$menu->image->Path)}}"></td>
                                <td><input type="text" id="name_{{$menu->id}}" value="{{$menu->name}}" > </td>
                                <td><input type="text" id="desc{{$menu->id}}" value="{{$menu->description}}" > </td>

{{--                                @if($menu->parent == null)--}}
{{--                                    <td>/</td>--}}
{{--                                @else--}}
                                <td>
                                    <select id="parent_{{$menu->id}}" name="Category" class="custom-select bg-transparent border-primary px-4" style="height: 49px;">--}}
                                        <option value="0">No parent</option>
                                        @foreach($data['categories'] as $category)
                                            @if($menu->parent_id == $category->id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                                @endforeach
                                    </select>
                                </td>
{{--                                @endif--}}
                                <td>
{{--                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$menu}}" >Update</button>--}}
                                    <button class="btn btn-primary" onclick="updateCat({{$menu}})" >Update</button>
                                    <button class="btn btn-danger mt-1" onclick="removeCat({{$menu->id}})">Delete</button>
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
                <a href="{{route('Categories-create')}}" class="btn badge-primary">Create new</a>


            </div>
        </div>
    </div></div>
    <!-- Menu End -->
@endsection



{{--@section('modal')--}}

{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">Name:</label>--}}
{{--                            <input type="text" class="form-control" id="cat-name">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">Description:</label>--}}
{{--                            <input type="text" class="form-control" id="cat-desc">--}}
{{--                        </div>--}}
{{--                        <select name="Category" class="custom-select bg-transparent border-primary px-4" style="height: 49px;">--}}
{{--                            <option value="0" selected>Category</option>--}}
{{--                        @foreach($data['categories'] as $category)--}}
{{--                            <option value="{{$category->id}}">{{$category->name}}</option>--}}

{{--                        @endforeach--}}
{{--                        </select>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="message-text" class="col-form-label">Message:</label>--}}
{{--                            <textarea class="form-control" id="message-text"></textarea>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Send message</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}



@section('additionalScripts')
    <script>


        // $('#exampleModal').on('show.bs.modal', function (event) {
        //     var button = $(event.relatedTarget) // Button that triggered the modal
        //     var cat = button.data('whatever') // Extract info from data-* attributes
        //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //     var modal = $(this)
        //     modal.find('.modal-title').text('Update ' + cat.name)
        //     modal.find('#cat-name').val(cat.name)
        //     modal.find('#cat-desc').val(cat.description)
        //
        //
        //
        // })

        function updateCat(cat)
        {
            // console.log($('#parent_'+cat.id).val())
            $.ajax({
                url: "/Categories",
                method: "PATCH",

                data: {
                    id : cat.id,
                    name : $('#name_'+cat.id).val(),
                    description : $('#desc'+cat.id).val(),
                    parent_id : $('#parent_'+cat.id).val()
                },
                success: function() {
                    alert('Updated!');
                    // $("#price_" + productId).html(element.value * price)
                },
                error: function (xhr) {
                    alert('An error occured')
                    console.log(xhr);
                }
            })
        }


        function removeCat(id)
        {
            // alert(id);
            // let trToRemove = $("#rezervation" + id);
            // alert(trToRemove)
            // trToRemove.remove();

            $.ajax({
                method: "DELETE",
                url: "/Categories/" + id,
                success: function() {
                    let catToRemove = $("#category_" + id);

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
