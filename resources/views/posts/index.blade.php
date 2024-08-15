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
        @foreach ($articles as $article)
             <tr>
          <th scope="row">{{$article['id']}}</th>
          <td>{{$article->title}}</td>
          <td>{{$article->posted_by}}</td>
          <td>{{$article->created_at}}</td>
          <td>
            <a href="{{route('posts.show',$article->id)}}"  class="btn btn-info">View</a>{{--lw 3ayez te pass more than url parameter put them in associative array and the key must be the same as the url parameter in route (web.php file) --}}
            <a href="{{route('posts.edit',$article->id)}}" class="btn btn-primary">Edit</a>
           
           <form style="display: inline" action="{{route('posts.destroy',$article->id)}}" method="POST">
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

  
