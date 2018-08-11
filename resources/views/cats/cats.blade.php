@extends('layouts.master')
@section('header')
    <h2>list meo</h2>
@stop
@section('content')
    {{--<p>there are over {{$number_of_cats}} cats on this site</p>--}}
    <a href="#"><p>add mèo</p></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">BirthDay</th>
            <th scope="col">BreedName</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cats as $cat)

            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->date_of_birth}}</td>
                <td><a href="/cats/breeds/{{$cat->breed->name}}">{{$cat->breed->name}}</a></td>
                <td><a href="{{ route('cats.edit',$cat->id) }}" class="btn btn-primary">edit</a></td>
                {{--<td><a href="/cats/{{$cat->id}}" class="btn btn-danger">delete</a></td>--}}
                {{--<td><a data-method="delete" href="{{ route('cats.destroy',$cat->id) }}" class="btn btn-danger">delete</a></td>--}}
                <td>
                    {!! Form::open(
                    ['url' => route('cats.destroy',$cat->id),
                    'method' => 'delete'
                    ]
                    )
                    !!}
                        <button class="btn btn-danger" type="submit">delete</button>
                    {!! Form::close() !!}


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
