<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validated();
        Comment::create($data);
        return back()->with('comment-create-status','Your comment published successfully');
    }
}
