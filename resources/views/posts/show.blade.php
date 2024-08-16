
@extends("layouts.app")
@section("title")Post {{$post->id}} @endsection
@section("content")
    <!-- Main Content -->
      <!-- Post Card -->
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">{{$post->title}}</h5>
          <span class="badge bg-secondary">{{$post->created_at}}</span>
        </div>
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Posted by: {{$post->user->name}}</h6>
          <p class="card-text mt-3">{{$post->description}}</p>
          <a href="{{route('posts.index')}}" class="btn btn-outline-primary mt-3">Back to Posts</a>
        </div>
      </div>
@endsection
