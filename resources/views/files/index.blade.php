@extends('layouts.app')

@section('content')
    <h1 class="text-center text-info"> Files Page</h1>
    <div class="container col-12 col-lg-6 col-xl-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table text-center">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th colspan="3">Action</th>
                        <th colspan="3">All movies</th>
                    </tr>
                    @foreach ($files as $data)

                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->title }}</td>
                            <td>
                                <a href="{{ route('file.show', $data->id ) }}">
                                    <i style="cursor: pointer" class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('file.edit', $data->id ) }}">
                                    <i style="cursor: pointer" class="fas fa-edit"></i>
                                </a>
                            </td>
                           
                                <td> <a href="{{ route('file.destroy', $data->id )  }}"> <i style="cursor: pointer" class="fas fa-trash-alt"></i> </a>
                             </td>
                            <td>
                                <a href="{{ route('file.index2')}}">
                                    <i style="cursor: pointer" class="far fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
