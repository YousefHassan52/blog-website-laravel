@extends('layouts.app')
   @section("title") Create Post @endsection
@section('content')

    <form action="{{route('posts.store')}}" method="POST" >
        @csrf
        {{-- <h6>{{$user->name}}</h6> --}}

        {{-- el names el t7t de el habtdi 2st3mlha 34an 2get el values beta3 kol input 2w radio --}}
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputTitle" value="{{old('title')}}" required> 
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{old('desc')}}</textarea>
        </div>
        <br>

        
        <button type="submit" class="btn btn-success">Submit</button>    
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
@endsection


  
