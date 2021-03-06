<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
//        $input = $request->all();
//        $input = $request->orderBy('id','DESC')->limit(10)->get();
        $input = $request->except(['_token']);
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
//        $set_order=$input->orderBy('created_at', 'DESC')->paginate(3);
        Comment::create($input);
        return back();
    }
}
