
@extends("layouts.app")
@section("title")Post {{$comment->id}} @endsection
@section("content")
    <!-- Main Content -->
      <!-- Post Card -->
    

    <!-- Comments Section -->
 

      <div class="card mt-4">
        <div class="card-body">
            <form action="{{route('comments.update',["post"=>$post,"comment"=>$comment])}}" method="POST">
              {{-- m4 far2a b3t $post 2w $post->id --}}
                @csrf
                @method('PUT')
            
                <div class="form-group">
                    <textarea  class="form-control" name="body" rows="3" placeholder="Add a comment...">{{$comment->body}}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary mt-2">Edit Comment</button>
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
