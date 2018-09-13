<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function store(Request $request){
        \Auth::user()->tweets()->create($request->all());
        return redirect()->back();
    }

    public function deleteTweet($id){
        $tweet=Tweet::find($id);
        if($tweet->user_id=\Auth::user()->id)
            $tweet->delete();

        return redirect()->back();
    }
}
