@extends('layout')

@section('content')

<h1 class="title">{{ $project->title }}</h1>
<p>{{ $project->description }}</p>

<a href="/projects/{{ $project->id }}/edit">Edit</a>

@if ($project->tasks->count())
  <div class="box">
  @foreach ($project->tasks as $task)
    <div>
      <form method="POST" action="/tasks/{{ $task->id }}">
        @method('PATCH')
        @csrf
        <label class="checkbox" for="description">
          <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
          {{ $task->description }}
        </label>
      </form>
    </div>
  @endforeach
  </div>
@endif


<form method="POST" action="/projects/{{ $project->id }}/tasks" class="box">
  @csrf

  <div class="field">
    <label class="label" for="description">New Task</label>

    <div class="control">
      <input type="text" class="input" name="description" placeholder="description" required>
    </div>

    <div class="field">
      <div class="control">
        <button class="button is-primary" type="submit">Add task</button>
      </div>
    </div>

    @include('errors')
</form>


@endsection
