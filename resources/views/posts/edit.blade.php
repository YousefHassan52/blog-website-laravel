@extends('layouts.app')
   @section("title") Create Post @endsection
@section('content')

    <form action="{{route('posts.update',$post['id'])}}" method="POST" >
        @csrf
        @method('PUT')
        <h1>{{$post['title']}}</h1>

        {{-- el names el t7t de el habtdi 2st3mlha 34an 2get el values beta3 kol input 2w radio --}}
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputTitle" value={{ old('desc', $post['title'] ?? '') }}> 
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('desc', $post['desc'] ?? '') }}</textarea>
        </div>
        <br>

        <label for="postCreator">Post Creator</label>
        <select name="creator" class="form-control" id="postCreator">
            <option value="Ahmed">Ahmed</option>
            <option value="Mohammed">Mohammed</option>
            <option value="Alaa">Alaa</option>
        </select>
        <br> 
        <button type="submit" class="btn btn-primary">Update</button>    
    </form>

@endsection

  
