@extends('tracking.app')

@section('content')
<div class="d-flex justify-content-center">

@if (Route::has('login'))
  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
      <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Dashboard</a>
    @else
      <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>

      @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
      @endif
      @endif
    </div>
@endif

</div>

@endsection
