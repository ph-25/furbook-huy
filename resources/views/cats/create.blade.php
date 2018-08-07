@extends('layouts.master')

@section('header')
    <h2>add new cat</h2>
@stop

@section('content')
    {!! Form::open(['url' =>'/cats']) !!}
        @include('partials.forms.cat')
    {!! Form::close() !!}
@stop