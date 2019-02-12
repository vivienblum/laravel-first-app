@extends('layout')

@section('content')

<h1 class="title">Projects</h1>

<button class="button"><a href="/projects/create">Add</a></button>
<div class="box">
  <ul>
  @foreach ($projects as $project)
    <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
  @endforeach
  </ul>
</div>

@endsection
