@extends('layouts.master')

@section('header')
    <h2>Edit new cat</h2>
@stop

@section('content')


    {!! Form::open($cat, ['url' => '/cats/'.$cat->id]) !!},
        'method' => 'put')!!}
    @include('partials.forms.cat')

    {!! Form::close() !!}
@stop