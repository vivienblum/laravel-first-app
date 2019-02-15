@extends('layout')

@section('content')

<h1 class="title">Projects</h1>

<button class="button is-primary"><a href="/projects/create">Add Project</a></button>
<button class="button is-info"><a href="/file">Upload file</a></button>

<div class="box" style="margin-top: 20px;">
  <ul>
  @foreach ($projects as $project)
    <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
  @endforeach
  </ul>
</div>

<button class="button is-warning"><a href="/email">Launch a Job</a></button>

@endsection
