@extends('layout')
@section('content')
    <form method="POST" action="{{ route('update',['id' => $memo->id]) }}">
        @csrf
        <textarea name="content" rows="4">{{ $memo->content}}</textarea>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        <input type="submit" value="update"/>
        <input type="button" value="back" onclick="location.href='{{route('index')}}'"/>
    </form>
@endsection