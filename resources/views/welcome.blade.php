@extends('layout')

@section('content')
  <h2>Home {{ $title }}</h2>

  @foreach($tasks as $task)
    <li>{{ $task }}</li>
  @endforeach

@endsection
