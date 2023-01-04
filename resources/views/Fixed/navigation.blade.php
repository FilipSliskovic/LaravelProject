<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
{{--        <a href="{{route('Home-index')}}" class="navbar-brand px-lg-4 m-0">--}}
            <h1 class="m-0 display-4 text-uppercase text-white">Expresso</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
{{--                <a href="{{route('Home-index')}}" class="nav-item nav-link active">Home</a>--}}
{{--                <a href="about.html" class="nav-item nav-link">About</a>--}}
{{--                <a href="service.html" class="nav-item nav-link">Service</a>--}}
{{--                <a href="{{route('Menu-index')}}" class="nav-item nav-link">Menu</a>--}}
{{--                <div class="nav-item dropdown">--}}
{{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>--}}
{{--                    <div class="dropdown-menu text-capitalize">--}}
{{--                        <a href="reservation.html" class="dropdown-item">Reservation</a>--}}
{{--                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a href="{{route('Contact-index')}}" class="nav-item nav-link">Contact</a>--}}
{{--                {{dd($data['menu'])}}--}}
{{--                {{dd($data['AccessLevel'])}}--}}

                @foreach($data['menu'] as $menu)
{{--                    {{dd($menu)}}--}}
                    @if($menu->AccessLevel == 2)
                    <a href="{{route($menu->Route)}}" class="nav-item nav-link">{{$menu->Name}}</a>
{{--                    @elseif(\Illuminate\Support\Facades\Auth::check() &&\Illuminate\Support\Facades\Auth::user()->role <= $menu->AccessLevel )--}}
{{--                        <a href="{{route($menu->Route)}}" class="nav-item nav-link">{{$menu->Name}}</a>--}}
                    @endif
                @endforeach
                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 0)
                    <a href="{{route('Admin-index')}}" class="nav-item nav-link">ADMIN</a>
                @endif
                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 1)
                    <a href="{{route('Rezervation-index')}}" class="nav-item nav-link">Rezervations</a>
                @endif
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <a href="{{route('Login-index')}}" class="nav-item nav-link">Log in</a>
                @else
                    <a href="{{route('Login-Logout')}}" class="nav-item nav-link">Log out</a>
                @endif
            </div>
        </div>
    </nav>
</div>


