<h1>Edit project</h1>

<form method="POST" action="/projects/{{ $project->id }}">
  {{ method_field('PATCH') }}
  {{ csrf_field() }}

  <input type="text" name="title" placeholder="title" value="{{ $project->title }}">
  <textarea name="description" placeholder="description">
    {{ $project->description }}
  </textarea>
  <button type="submit">Edit project</button>
</form>

<form method="POST" action="/projects/{{ $project->id }}">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <button type="submit">Delete project</button>
</form>
