<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{



    public function index()
    {
        $logged_user = Auth::user()->id;
        $sentence = '    Very little is needed to make a happy life. - Marcus Aurelius ';
        $dbObject = Post::all();


        // dd($dbObject);

        return view('posts.index', ['sentence' => $sentence, 'posts' => $dbObject, 'loggedUser' => $logged_user]);
    }

    public function show(Post $post) // it doeasnt matter the name of the parameter 
    {
        $logged_user = Auth::user()->email;

        /*
            route model binding hatwfar 3lek 7ata ketabet el query + 2nha hathndel el 404 error 
            bs leha 4erot:
                1- 2esm el url parameter yekon nafs 2esm el passed parameter el fo2 fe el fucntion el 2na feha 
                2- 2n yekon el passed parameter fe el function el 2na feha (el bakteb feha el comment dh) no3o nafs no3 el model el 2nta btst5demo f eel controller dh (we fe el 7ala de hayb2a Post model)
                
        */


        //$comments=Comment::all();





        // $postFromDB = Post::find($id);
        // $postFromDB = Post::where('id', $id);
        // $postFromDB = Post::where('title', "c++ intro")->first();
        // if ($postFromDB == null) {
        //     return view('posts.not_found');
        // }

        $comments = Comment::where('post_id', $post->id)->get();
        return view('posts.show', ['post' => $post, 'comments' => $comments, 'loggedName' => $logged_user]); // fe el 7ala de howa m4 id howa Post model
    }
    public function create()
    {

        $user = Auth::user();
        // $result = '';
        // foreach ($usersFromDB as $user) {
        //     $result .= $user->name . " ";
        // }
        // return $result;
        return view("posts.create", ['user' => $user]);
    }
    public function store()
    {
        $creator_id = Auth::user()->id;
        // validation part
        request()->validate([
            "title" => ["required", "min:3"],
            "desc" => ["required", "min:3"],
        ]);
        $data = request(); // return associative array 
        $title = $data->title;
        $desc = $data->desc;
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
            "user_id" => $creator_id // lw el attribute dh m4 mawgod fe el table ha ignore it we 2store ba2et el attributes 3ady 
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
        request()->validate([
            "title" => ["required", "min:3"],
            "desc" => ["required", "min:3"],
        ]);
        $data = request();

        $post->update([
            'title' => $data->title,
            'description' => $data->desc,
        ]);



        return to_route('posts.show', $post->id);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        // return "post with id " . $id . " is deleted";
        $userRole = Auth::user()->role;
        if ($userRole == 'admin') {
            return to_route('admin.index');
        }
        return to_route('posts.index');
    }
}
