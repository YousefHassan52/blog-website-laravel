<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{

    private $post = [
        [
            'id' => 1,
            'title' => 'Introduction to PHP',
            'posted_by' => 'John Doe',
            'created_at' => '2024-07-31 10:00:00',
            'desc' => 'This post provides an overview of PHP, a popular server-side scripting language used for web development. You will learn about PHP syntax, basic programming constructs, and how to start creating dynamic web pages.'
        ],
        [
            'id' => 2,
            'title' => 'Advanced Laravel Techniques',
            'posted_by' => 'Alice Johnson',
            'created_at' => '2024-07-31 11:00:00',
            'desc' => 'In this post, we delve into advanced Laravel techniques, including service containers, dependency injection, and custom package development. Perfect for developers looking to enhance their Laravel skills.'
        ],
        [
            'id' => 3,
            'title' => 'Understanding Arrays in PHP',
            'posted_by' => 'Charlie Lee',
            'created_at' => '2024-07-31 12:00:00',
            'desc' => 'Arrays are a fundamental data structure in PHP. This post explains different types of arrays, how to create them, and how to manipulate array elements using built-in PHP functions.'
        ]
    ];

    public function index()
    {
        $sentence = '    Very little is needed to make a happy life. - Marcus Aurelius ';
        $dbObject = Post::all();
        // dd($dbObject);

        return view('posts.index', ['sentence' => $sentence, 'articles' => $dbObject]);
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
            "sdkfj" => $creator // lw el attribute dh m4 mawgod fe el table ha ignore it we 2store ba2et el attributes 3ady 
        ]);
        return to_route('posts.index');
    }
    public function edit($id)
    {

        if ($id < 1) {
            $id = 1;
        } else if ($id > count($this->post) - 1) {
            $id = count($this->post);
        }
        return view('posts.edit', ['post' => $this->post[$id - 1]]);
    }
    public function update($id)
    {
        // return "this is update function";
        // return $this->post[$id]['title'];
        return to_route('posts.show', $id);
    }
    public function destroy($id)
    {

        // return "post with id " . $id . " is deleted";
        return to_route('posts.index');
    }
}
