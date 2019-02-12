<h1>Create a project</h1>

<form method="POST" action="/projects">
  {{ csrf_field() }}

  <input type="text" name="title" placeholder="Project title">
  <textarea name="description" placeholder="Decription"></textarea>

  <button type="submit">Create a project</button>

</form>
