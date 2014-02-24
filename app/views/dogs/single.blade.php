@extends('master')

@section('header')
    <a href="{{URL::to('/')}}">Back to Overview</a>
    <h2>
        {{$dog->name}}
    </h2>

    <a href="{{URL::to('dogs/'.$dog->id.'/edit')}}">
        <span class="glyphicon glyphicon-edit"></span> Edit
    </a>

    <a href="{{URL::to('dogs/'.$dog->id.'/delete')}}">
        <span class="glyphicon glyphicon-trash"></span> Delete
    </a>

    Last edited: {{$dog->updated_at}}
@stop

@section('content')
    <p> Date of Birth: {{$dog->date_of_birth}} </p>
    <p>
        @if($dog->breed)
            Breed:
            <a href="{{URL::to('dogs/breeds/' . $dog->breed->name)}}">
                {{$dog->breed->name}}
            </a>
        @endif
    </p>
@stop
