@extends('tracking.app')

@section('content')

<div class="container">
	<br>
	<div class="float-right">
		<a href="/create" class="btn btn-success">Add new task</a> <a href="/logout" class="btn btn-danger">Logout</a>
	</div>
	<h2>My tasks:</h2>
	<br>
</div>

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

		<!-- comment modal start -->

		<div class="modal fade" id="commentModal{{$task->id}}" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
      	<div class="modal-content">
        	<div class="modal-header">
          	<h5 class="modal-title" id="commentModalLabel">{{$task->title}} comment:</h5>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	<span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            {{$task->comment}}
          </div>
        </div>
      </div>
    </div>

		<!-- comment modal end -->

		@empty
		<div class="alert alert-danger" role="alert">
			Nothing to show!
		</div>
		@endforelse

	</tbody>
</table>


<div class="d-flex justify-content-center">
    {{ $tasks->links('vendor.pagination.mypagination') }}
</div>

<form method='post' action='/export'>
	@csrf
	<input class="btn btn-primary" type="submit" name="exportexcel" value='Excel Export'>
	<input class="btn btn-primary" type="submit" name="exportcsv" value='CSV Export'>
	<input class="btn btn-primary" type="submit" name="exportpdf" value='PDF Export'>
</form>

@endsection
