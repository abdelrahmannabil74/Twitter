<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index($id)
    {

        $user = User::where('id', $id)->with(['tweets'=>function($query){
            $query->orderBy('created_at','desc');
        }])->with('following')->with('followers')->first();
        $current_user=\Auth::user();
        $tweets_and_mention=Tweet::where('body','like','%@'.$user->username.'%')->orWhere('user_id',$user->id)->orderBy('created_at','desc')->get();
        $likes=$user->likes;
        dd($likes);
        return view('profile.profile')->with('user', $user)->with('current_user',$current_user)->with('tweets_and_mention',$tweets_and_mention)->with('likes',$likes);
    }


      public function like(Request $request)
      {
          $user=\Auth::user();
          $tweet=Tweet::find($request->input('tweet_id'));
          if ($tweet->likes->contains($user->id)) {
              $tweet->likes()->detach([$user->id]);
          }
          else{
              $tweet->likes()->attach([$user->id]);
          }

          return $tweet->likes()->count();

      }


    public function follow(Request $request)
    {
        $user=\Auth::user();
        $follower=User::find($request->input('follower_id'));
        if ($follower->followers->contains($user->id)) {
            $follower->followers()->detach([$user->id]);
            return 'true';
        }
        else{
            $follower->followers()->attach([$user->id]);
            return 'false';
        }


    }


    public function profile()
    {
        $current_user=\Auth::user();

       $user=User::where('id',$current_user->id)->with(['tweets'=>function($query){
           $query->orderBy('created_at','desc');
       }])->with('following')->with('followers')->first();
        $tweets_and_mention=Tweet::where('body','like','%@'.$user->username.'%')->orWhere('user_id',$user->id)->orderBy('created_at','desc')->get();
        $likes=$user->likes;
        return view('profile.profile')->with('user', $user)->with('current_user',$current_user)->with('tweets_and_mention',$tweets_and_mention)->with('likes',$likes);

    }

}
