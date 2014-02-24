@extends('master')

@section('header')
    @if(isset($breed))
        <a href="{{URL::to('/')}}'">Back to the overview</a>
    @endif
<h2>
    All @if(isset($breed)) {{$breed}} @endif Dogs

    <a href="{{URL::to('dogs/create')}}" class="btn btn-primary pull-right">
        Add a new dog
    </a>
</h2>
@stop

@section('content')
    @foreach($dogs as $dog)
        <div class="dog">
            <a href="{{URL::to('dogs/'.$dog->id)}}">
                <strong> {{{$dog->name}}} </strong> - {{{$dog->breed->name}}}
            </a>
        </div>
    @endforeach
@stop