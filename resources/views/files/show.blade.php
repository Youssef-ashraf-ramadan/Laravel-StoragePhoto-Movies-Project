@extends('layouts.app')

@section('content')
    <h1 class="text-center text-info">Files Data </h1>
    <div class="container col-12 col-lg-6 col-xl-6 col-md-6">
        <div class="card">
            <div class="card-body">

                <img class="mx-4 my-2" style="width: 300px; height:350px; border-radius:20px"
                    src="{{ asset("uploads/$file->mainFile") }}">
                <h5 class="mx-5 my-2"> Name : {{ $file->title }}</h5>
                <h5 class="mx-5 my-2"> Story : {{ $file->desc }}</h5>
<a href="{{ route('file.download', $file->id ) }}" class="btn btn-block btn btn-info m-1">download</a>

            </div>
        </div>
    </div>
@endsection
