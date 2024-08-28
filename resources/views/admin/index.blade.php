@extends('layouts.app')
   @section("title") Admin Home @endsection
@section('content')
        {{-- tableeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Post ID</th>
          <th scope="col">Title</th>
          <th scope="col">Posted By</th>
          <th scope="col">Created At</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
             <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->created_at->addYears(15)->format("Y-m-d")}}</td>
          <td>
            <a href="{{route('posts.show',$post->id)}}"  class="btn btn-info">View</a>{{--lw 3ayez te pass more than url parameter put them in associative array and the key must be the same as the url parameter in route (web.php file) --}}
              <form style="display: inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button   type="submit" class="btn btn-danger">Delete</button>

            </form>
           
           

          </td>
        </tr>
        @endforeach
       
       
      </tbody>
    </table>
      </div>
      @endsection

  
