@extends('tracking.app')

@section('content')

<div class="container">
  <br>
  <h2>Create task:</h2>
  <br>
  <form action="/create" method="POST">
      @csrf
    <div class="form-group">
      <label for="title">Task title</label>
      <input type="text" class="form-control" id="title" name="title" autocomplete="off">

      @error('title')
        <small class="text-danger">{{ $message }}</small>
      @enderror

    </div>
    <div class="form-group">
      <label for="comment">Leave a comment</label><br>
      <textarea class="form-control" name="comment" id="comment"></textarea>

      @error('comment')
        <small class="text-danger">{{ $message }}</small>
      @enderror

    </div>
    <div class="form-group">
      <label for="minutes">Time spent (in minutes)</label>
      <input type="text" class="form-control" id="minutes" name="minutes" autocomplete="off">

      @error('minutes')
        <small class="text-danger">{{ $message }}</small>
      @enderror

    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

</div>

@endsection
