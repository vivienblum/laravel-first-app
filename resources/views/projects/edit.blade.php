@extends('layout')

@section('content')

<h1 class="title">Edit project</h1>

<form method="POST" action="/projects/{{ $project->id }}">
  {{ method_field('PATCH') }}
  {{ csrf_field() }}
  <div class="field">
    <input class="input" type="text" name="title" placeholder="title" value="{{ $project->title }}">
  </div>

  <div class="field">
    <textarea class="textarea" name="description" placeholder="description">{{ $project->description }}</textarea>
  </div>

  <button class="button is-primary" type="submit">Edit project</button>
</form>

<form method="POST" action="/projects/{{ $project->id }}">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <button class="button is-danger" type="submit">Delete project</button>
</form>

@endsection
