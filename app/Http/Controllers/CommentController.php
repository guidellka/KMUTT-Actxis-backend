<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        $data['comment'] = $comment;
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->document_step_id = $request['document_step_id'];
        $comment->reply_id = $request['reply_id'];
        $comment->user_id = $request['user_id'];
        $comment->text = $request['text'];
        $comment->save();
        return $comment->id;
    }

    public function show($id)
    {
        $club = Comment::find($id);
        return $comment;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->document_step_id = $request['document_step_id'];
        $comment->reply_id = $request['reply_id'];
        $comment->user_id = $request['user_id'];
        $comment->text = $request['text'];
        $comment->save();
        return $id;
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return $id;
    }
}