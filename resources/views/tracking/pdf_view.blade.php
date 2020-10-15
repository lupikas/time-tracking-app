@extends('tracking.app')

@section('content')

<!-- table -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
			<th scope="col">Time spent</th>
			<th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
  	@forelse ($tasks as $task)

    <tr>
      <th scope="row">{{$task->id}}</th>
      <td class="font-weight-bold"><a href='#' data-toggle="modal" data-target="#commentModal{{$task->id}}">{{$task->title}}</a></td>
			<td>{{$task->minutes}}</td>
			<td>{{$task->created_at}}</td>
    </tr>

		@empty

		@endforelse

	</tbody>
</table>
<h5>Total spent: {{$minutes}} minutes.</h5>

@endsection
