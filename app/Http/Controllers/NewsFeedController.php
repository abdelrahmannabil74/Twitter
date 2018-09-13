<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{
    //
    public function index()
    {
        $following=\Auth::user()->following()->get()->pluck('id')->toArray();
        $following[]=\Auth::user()->id;
        $tweets=Tweet::with('user')->whereIn('user_id',$following)->orderBy('created_at','desc')->get();
        $following_count=\Auth::user()->following()->count();
        $followers_count=\Auth::user()->followers()->count();
        $my_tweets=Tweet::where('user_id',\Auth::user()->id)->get()->count();
        return view('newsfeed.home')->with('tweets',$tweets)->with('current_user',\Auth::user())->with('followers',$followers_count)->with('following',$following_count)->with('my_tweets',$my_tweets);
    }


  public function searchUser( Request $request)
  {
      $current_user=\Auth::user();


      if($request->input('search'))
      {
          $user=User::with(['tweets'=>function($query){
              $query->orderBy('created_at','desc');
          }])->with('following')->with('followers')->where('username',  $request->input('search')  )->first();

          if (!$user)
          {
              return ('No results found');
          }
      }

      $tweets_and_mention=Tweet::where('body','like','%@'.$user->username.'%')->orWhere('user_id',$user->id)->orderBy('created_at','desc')->get();
        $likes=$user->likes;
      return view('profile.profile')->with('user', $user)->with('tweets_and_mention',$tweets_and_mention)->with('current_user',$current_user)->with('likes',$likes);

  }

}
