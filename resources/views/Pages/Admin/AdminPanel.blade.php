
@extends('layouts.AdminLayout')

@section('title') Activity logs @endsection
@section('description') Activity logs @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection




@section('content')



    <div class="col-md-9 ">

        <div class="container">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Search..." value="{{old('keyword')}}" >
                        </div>
                    </div>
                    {{--                    <div class="col-md-2">--}}
                    {{--                        <select name="sortBy" id="" class="form-control">--}}
                    {{--                            <option value="1">Price Ascending</option>--}}
                    {{--                            <option value="2">Price Descending</option>--}}
                    {{--                            <option value="3">Name Ascending</option>--}}
                    {{--                            <option value="4">Name Descending</option>--}}
                    {{--                            <option value="5">Duration Ascending</option>--}}
                    {{--                            <option value="6">Duration Descending</option>--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}

                    <div class="col-md-1">
                        <select name="perPage" id="" class="form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                    </div>



                    <div class="col-lg-3">
                        <label for="FromDateTime">From:</label>
                        <input type="datetime-local" id="FromDateTime" name="FromDateTime" value="{{old('FromDateTime')}}">
                    </div>
                    <div class="col-lg-3">
                        <label for="ToDateTime">To:</label>
                        <input type="datetime-local" id="ToDateTime" name="ToDateTime" value="{{old('ToDateTime')}}" >
                    </div>
{{--                    <button class="btn btn-primary" type="submit" onclick="search()" >Search</button>--}}
                    <button class="btn btn-primary" type="submit"  >Search</button>
                </div>

            </form>

        </div>

        <div class="row m-auto">
            <table class="table table-hover table-responsive align-middle">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Action</th>
                    <th scope="col">URL</th>
                    <th scope="col">User</th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>

                @if(count($data['Activities']) >= 1 )
                    @foreach($data['Activities'] as $a)
                        <tr>
                            <th scope="row">{{$a->id}}</th>
                            <td >{{$a->action}}</td>
                            <td  >{{$a->URL}}</td>
                            <td  >{{$a->User}}</td>
                            <td  >{{$a->created_at}}</td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th>No items</th>
                    </tr>
                @endif

                </tbody>

            </table>
            {{$data['Activities']->links('pagination::bootstrap-4')}}


{{--            <a href="{{route('NavMenu-create')}}" class="btn badge-primary">Create new</a>--}}

        </div>

    </div>

    </div>

@endsection

@section('additionalScripts')
    <script>

        function search() {
            alert('tu')

            $.ajax({
                url : "/admin",
                method: "get",
                data: {
                    // productId : id
                },
                success: function(data) {
                    alert("Dodato")
                },
                error:function() {
                    alert("Došlo je do greške.")
                }
            })
        }
    </script>
@endsection
