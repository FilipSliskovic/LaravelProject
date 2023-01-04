@extends('layouts.layout')

@section('title') Author @endsection
@section('description') See our whole menu @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection



@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Author</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{route('Home-index')}}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">author</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-fluid pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-6 pb-5 m-auto">
                    <img width="300" height="400" src="{{asset('assets/img/autor.jpeg')}}" alt="author">
                </div>

                <div class="col-md-6 pb-5">
                    <div class="">
                        <small>Ime</small>
                        <p  class="">Filip</p>

                    </div> <div class="">
                        <small>Prezime</small>
                        <p  class="">Slišković</p>

                    </div>
                    <div class="">
                        <small>Datum rodjenja</small>
                        <p class="" >16.08.2000.</p>

                    </div>
                    <div class="">
                        <small>Srednja skola</small>
                        <p   class="">ITHS</p>

                    </div>
                    <div class="">

                        <a  class="" target="_blank" href="{{asset('assets/documentation.pdf')}}" >Docuemtation</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
