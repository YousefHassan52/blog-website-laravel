<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{



    public function index()
    {
        $sentence = '    Very little is needed to make a happy life. - Marcus Aurelius ';
        $dbObject = Post::all();


        // dd($dbObject);

        return view('posts.index', ['sentence' => $sentence, 'posts' => $dbObject]);
    }

    public function show(Post $postId) // it doeasnt matter the name of the parameter 
    {
        /*
            route model binding hatwfar 3lek 7ata ketabet el query + 2nha hathndel el 404 error 
            bs leha 4erot:
                1- 2esm el url parameter yekon nafs 2esm el passed parameter el fo2 fe el fucntion el 2na feha 
                2- 2n yekon el passed parameter fe el function el 2na feha (el bakteb feha el comment dh) no3o nafs no3 el model el 2nta btst5demo f eel controller dh (we fe el 7ala de hayb2a Post model)
                
        */





        // $postFromDB = Post::find($id);
        // $postFromDB = Post::where('id', $id);
        // $postFromDB = Post::where('title', "c++ intro")->first();
        // if ($postFromDB == null) {
        //     return view('posts.not_found');
        // }
        return view('posts.show', ['post' => $postId]); // fe el 7ala de howa m4 id howa Post model
    }
    public function create()
    {
        $usersFromDB = User::all();
        // $result = '';
        // foreach ($usersFromDB as $user) {
        //     $result .= $user->name . " ";
        // }
        // return $result;
        return view("posts.create", ['users' => $usersFromDB]);
    }
    public function store()
    {
        //native way of getting data 
        // $data = $_POST; // get data from form in html that have action with name = "posts.store"
        // return $data;

        // laravel way to get data as the previous way but with global helper function
        // $data = request()->all();
        // return $data;

        // second laravel way
        $data = request(); // return associative array 
        $title = $data->title;
        $desc = $data->desc;
        $creator = $data->creator;

        // first way in storing record to database 

        // $post = new Post;
        // $post->title = $title;
        // $post->description = $desc;
        // $post->save();

        // second way
        // lazem 2stdem el $fillable parameter fe el model we 25leh yesway array of all the pramaters el 2nta3yazha tetmli fe el database
        Post::create([
            "title" => $title,
            "description" => $desc,
            "user_id" => $creator // lw el attribute dh m4 mawgod fe el table ha ignore it we 2store ba2et el attributes 3ady 
        ]);
        return to_route('posts.index');
    }
    public function edit($id)
    {
        $usersFromDb = User::all();
        $postFromDB = Post::find($id);
        return view('posts.edit', ['post' => $postFromDB, 'users' => $usersFromDb]);
    }
    public function update(Post $post)
    {
        $data = request();

        $post->update([
            'title' => $data->title,
            'description' => $data->desc,
            'user_id' => $data->creator,
        ]);



        return to_route('posts.show', $post->id);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        // return "post with id " . $id . " is deleted";
        return to_route('posts.index');
    }
}
