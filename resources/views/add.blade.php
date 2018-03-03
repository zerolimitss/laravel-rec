@extends('layouts.admin')

@section('content')
    @if(isset($message)) {{$message}} @endif
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
            @can('addEmployee', $e)
            <form action="{{route('add')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="name">
                <button type="submit" >Send!</button>
            </form>
            @endcan
@endsection
