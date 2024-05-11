@extends('layout')
@section('content')
    <form method="POST" action="{{ route('store') }}">
    @crsf
        <textarea name="content" rows="4"></textarea>
        @if($errors->any())
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        @endif
        <input type="submit" value="create">
        <input type="button" value="back" onclick="location.href='{{ route('index')}}'">
    </form>
@endsection