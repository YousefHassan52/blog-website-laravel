@extends('layouts.app')
   @section("title") Create Post @endsection
@section('content')

    <form action="{{route('posts.store')}}" method="POST" >
        @csrf

        {{-- el names el t7t de el habtdi 2st3mlha 34an 2get el values beta3 kol input 2w radio --}}
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputTitle"> 
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <br>

        <label for="postCreator">Post Creator</label>
        <select name="creator" class="form-control" id="postCreator">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>

                
            @endforeach
        </select>
        <br> 
        <button type="submit" class="btn btn-success">Submit</button>    
    </form>

@endsection

  
