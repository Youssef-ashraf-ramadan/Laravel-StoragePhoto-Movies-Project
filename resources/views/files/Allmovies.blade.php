@extends('layouts.app')

@section('content')
    <h1 class="text-center text-info"> List movies</h1>
    <div class="container col-12" style="background:rgb(224, 222, 222)">
        <div class="row"  style="width: 1900px; height:2060px;">
            @foreach ($files as $data2)
                <div class="col-3 my-3">
                    <div class="card"   style="background:rgb(224, 222, 222)">
                        <div class="card-body mx-5" style="height:600px">


                            <img class="mx-4 my-2" style="width: 300px; height:350px; border-radius:20px"
                                src="{{ asset("uploads/$data2->mainFile") }}">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mx-5 my-2"> Name : {{ $data2->title }}</h5>
                                    <h5 class="mx-5 my-2"> Story : {{ $data2->desc }}</h5>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
