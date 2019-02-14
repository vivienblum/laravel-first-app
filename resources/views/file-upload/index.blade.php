@extends('layout')

@section('content')
    <h1 class="title">Upload a file</h1>

    <form method="POST" action="/upload" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="field">
        <input class="input" type="file" name="image" required>
      </div>

      <button class="button is-primary" type="submit">Upload</button>

      @include('errors')
    </form>

@endsection
