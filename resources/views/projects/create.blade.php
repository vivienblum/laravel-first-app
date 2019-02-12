@extends('layout')

@section('content')

<h1 class="title">Create a project</h1>

<form method="POST" action="/projects">
  {{ csrf_field() }}
  <div class="field">
    <input class="input" type="text" name="title" placeholder="Project title" required value="{{ old('title') }}">
  </div>

  <div class="field">
    <textarea class="textarea" name="description" placeholder="Decription" required>{{ old('description') }}</textarea>
  </div>

  <button class="button is-primary" type="submit">Create a project</button>

  @include('errors')
</form>

@endsection
