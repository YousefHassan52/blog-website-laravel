<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Post $post)
    {

        request()->validate([
            'body' => ['required'],
        ]);

        $body = request()->body;

        Comment::create(
            [
                'body' => $body,
                'post_id' => $post->id,
                'commentator_id' => Auth::user()->id,


            ]
        );

        return to_route('posts.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return to_route('posts.show', $post)->with("Comment deleted successfully");
    }

    public function edit(Post $post, Comment $comment)
    {

        return view('posts.edit_comment', ['post' => $post, 'comment' => $comment]);
    }

    public function update(Post $post, Comment $comment)
    {

        request()->validate(
            [
                "body" => ['required'],
            ]
        );
        $comment->update(
            [
                "body" => request()->body
            ]
        );
        return to_route('posts.show', $post);
    }
}
