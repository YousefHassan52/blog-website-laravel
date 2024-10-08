@extends('layouts.app')
   @section("title") Posts @endsection
@section('content')
    
      <div class="text-center">
        <div class="mt-5">  
          <div class="text-center"> 
            <a  href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
            
        
          
          </div>
        </div>
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
            @if ($loggedUser==$post->user_id)
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <form style="display: inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button   type="submit" class="btn btn-danger">Delete</button>

            </form>
            @endif
           
           

          </td>
        </tr>
        @endforeach
       
       
      </tbody>
    </table>
      </div>
      @endsection

  
