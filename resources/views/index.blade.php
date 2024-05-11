@extends('layout')
@section('content')
    <input type="button" value="Create Memo" onclick="location.href='{{ route('create') }}'">
    {{-- @foreach($memos as $memo)
    <div>
    	<span>{{ $memo->content}}</span>
        <input type="button" onclick="location.href='{{route('edit', ['id' => $memo->id]) }}'" value="edit">
        <input type="button" onclick="location.href='{{route('delete', ['id' => $memo->id]) }}'" value="delete">
	</div>
    @endforeach --}}
@endsection