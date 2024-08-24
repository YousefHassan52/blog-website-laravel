
@extends("layouts.app")
@section("title")Post {{$post->id}} @endsection
@section("content")
{{-- <h1>{{$loggedName}}</h1> --}}
    <!-- Main Content -->
      <!-- Post Card -->
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">{{$post->title}}</h5>
          <span class="badge bg-secondary">{{$post->created_at}}</span>
        </div>
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Posted by: {{$post->postCreator->name}}</h6>
          <p class="card-text mt-3">{{$post->description}}</p>
          <a href="{{route('posts.index')}}" class="btn btn-outline-primary mt-3">Back to Posts</a>
        </div>
      </div>

    <!-- Comments Section -->
    <div class="mt-5">
      <h5>Comments</h5>
      @foreach($comments as $comment)
          <div class="card mb-3">
              <div class="card-body">
                <h5>{{$comment->user->name}}</h5>
                

                  <div class="d-flex justify-content-between">
                      <p class="card-text">{{ $comment->body }}</p>
                      @if($comment->commentator_id==Auth::user()->id)
                      <div >
                          <!-- Edit Button -->
                          <a href="{{route('comments.edit',["post"=>$post,"comment"=>$comment])}}" class="btn btn-sm btn-outline-secondary">Edit</a>

                          <!-- Delete Form -->
                          <form action="{{route('comments.destroy',["post"=>$post,"comment"=>$comment])}}" method="POST" style="display:inline;">
                           
                               @csrf
                              @method('DELETE') 
                              <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                          </form>
                      </div>
                      @endif
                      
                  </div>
                  {{-- <footer class="blockquote-footer">{{ $comment->user->name }} on {{ $comment->created_at }}</footer> --}}
              </div>
          </div>
      @endforeach
  </div>

      <div class="card mt-4">
        <div class="card-body">
            <form action="{{route('comments.store',$post)}}" method="POST">
              {{-- m4 far2a b3t $post 2w $post->id --}}
                @csrf
            
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="3" placeholder="Add a comment..."></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
            </form>
            <br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          </div>

@endsection
