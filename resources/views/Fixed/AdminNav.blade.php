<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 200px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Admin Panel</h1>

    </div>
</div>
<!-- Page Header End -->

<div class="row m-auto">
    <div class="col-md-3">
{{--        <ul>--}}
{{--        @foreach($data['menu'] as $menu)--}}
{{--            @if($menu->AccessLevel == 0)--}}
{{--            <div class="row">--}}
{{--                 <li class="m-2"> <a class="p-2" href="{{route($menu->Route)}}">{{$menu->Name}}</a></li>--}}
{{--                <hr>--}}
{{--            </div>--}}
{{--                @endif--}}
{{--        @endforeach--}}
{{--        </ul>--}}

        <div class="list-group">
            @foreach($data['menu'] as $menu)
                @if($menu->AccessLevel == 0)
            <a href="{{route($menu->Route)}}" class="list-group-item list-group-item-action">{{$menu->Name}}</a>
                @endif
            @endforeach
        </div>
    </div>


