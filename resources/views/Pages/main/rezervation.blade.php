@extends('layouts.layout')

@section('title') Rezervations @endsection
@section('description') make or see your rezervations @endsection
@section('keywords') caffe, cafe shop, home, shop, best @endsection



@section('content')




    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Rezervations</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{route('Home-index')}}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Rezervations</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->



    <div class="row m-auto">

        @foreach($data['rezervations'] as $r)

        <x-rezervationComponent :tableName="$r->table->name" :seats="$r->table->seats" :dateTime="$r->DateAndTime" :id="$r->id" />
        @endforeach
    </div>

    <div class="row m-auto text-center">
        <div class="col col-md-12 mt-5 ">
            <a href="{{route('Rezervation-create')}}" class="btn btn-primary">Make a new rezervation</a>
        </div>
    </div>

@endsection

@section('additionalScripts')
    <script>

        function removeRez(id)
        {
            // alert(id);
            // let trToRemove = $("#rezervation" + id);
            // alert(trToRemove)
            // trToRemove.remove();

            $.ajax({
                method: "DELETE",
                url: "/rezervations/" + id,
                success: function() {
                    let rezToRemove = $("#rezervation_" + id);

                    rezToRemove.remove();
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            })
        }



    </script>
@endsection

