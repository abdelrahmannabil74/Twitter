<!doctype html>
<html>

<head>
    <title>Twitter - Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- main styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main_.css')}}">
</head>

<body>
<!-- tabs row -->
<div class="tabs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-7 col-md-offset-3">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#tweets" aria-controls="tweets" role="tab" data-toggle="tab">Tweets
                            <span class="counter">

                                </span>
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#mention" aria-controls="mention" role="tab" data-toggle="tab">Tweets & Mentions
                            <span class="counter">

                                </span>
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#likes" aria-controls="likes" role="tab" data-toggle="tab">Likes
                            <span class="counter">

                                </span>
                        </a>
                    </li>
                             <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li> -->
                </ul>
                @if($current_user->following->contains($user->id))
                    <button class="follow" user_id="{{$user->id}}" >Follow</button>
                    @else
                    <button class="follow" user_id="{{$user->id}}" >Following</button>
                    @endif
                @include('logout')
            </div>
        </div>
    </div>
</div>

<!-- profile section -->
<section class="profile">

    <div class="container">
        <div class="row">
            <!-- user details -->
            <div class="col-xs-12 col-sm-6 col-md-3">
                <aside>
                    <div class="profile-img">
                        <img src="{{asset('uploads/avatar/'.$user->avatar)}}" class="" alt="profile photo">
                    </div>
                    <div class="details">
                        <!-- name -->
                        <a href="{{route('profile',[$user->id])}}" class="name">
                            <h1>{{$user->name}}</h1>
                        </a>
                        <!-- username -->
                        <a href="#" class="username">
                            <span>{{$user->username}}</span>
                        </a>
                        <!-- bio -->
                        {{--<p class="bio">You are looking at most badass backend developer!</p>--}}
                        <!-- location -->
                        <span class="additional-details"><i class="	fa fa-map-marker fa-2x"></i>{{$user->phone}}</span>
                        <!-- date -->
                        <span class="additional-details"><i class="fa fa-calendar"></i>{{$user->email}}</span>
                        <!-- birthday -->

                    </div>
                </aside>
            </div>
            <!-- tab contetn -->
            <div class="col-xs-12 col-sm-6 col-md-7">
                <!-- Tabs content -->
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="tweets">

                      @foreach($user->tweets as $tweet)
                        <!-- each tweet -->
                        <div class="media">
                            <div class="media-left">
                                <a href="{{route('profile',[$user->id])}}">
                                    <img class="media-object" src="{{asset('uploads/avatar/'.$user->avatar)}}" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{route('profile',[$user->id])}}">
                                    <h4 class="media-heading">{{$user->name}} <span>{{$user->username}}</span></h4>
                                </a>
                                <p>{{$tweet->body}}.</p>
                                @if($tweet->likes->contains($current_user->id))
                                <i id="{{$tweet->id}}" class="favourite fa fa-heart like-btn liked"> <span>{{$tweet->likes()->count()}}</span></i>
                                    @else
                                    <i id="{{$tweet->id}}" class="favourite fa fa-heart-o like-btn unlike"> <span>{{$tweet->likes()->count()}}</span></i>
                                    @endif
                                @if($tweet->user_id==$current_user->id)
                                    <a href="{{route('delete_tweet',[$tweet->id])}}"> delete
                                    </a>
                                @endif
                            </div>
                        </div>

        @endforeach
                    </div>

                    <div role="tabpanel" class="tab-pane" id="mention">
                    @foreach($tweets_and_mention as $tweet)
                        <!-- each tweet -->
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{route('profile',[$tweet->user->id])}}">
                                        <img class="media-object" src="{{asset('uploads/avatar/'.$tweet->user->avatar)}}" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{route('profile',[$tweet->user->id])}}">
                                        <h4 class="media-heading">{{$tweet->user->name}} <span>{{$tweet->user->username}}</span></h4>
                                    </a>
                                    <p>{{$tweet->body}}.</p>
                                    @if($tweet->likes->contains($current_user->id))
                                        <i id="{{$tweet->id}}" class="favourite fa fa-heart like-btn liked"> <span>{{$tweet->likes()->count()}}</span></i>
                                    @else
                                        <i id="{{$tweet->id}}" class="favourite fa fa-heart-o like-btn unlike"> <span>{{$tweet->likes()->count()}}</span></i>
                                    @endif
                                    @if($tweet->user_id==$current_user->id)
                                        <a href="{{route('delete_tweet',[$tweet->id])}}"> delete
                                        </a>
                                    @endif
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="likes">
                    @foreach($likes as $tweet)
                        <!-- each tweet -->
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{route('profile',[$tweet->user->id])}}">
                                        <img class="media-object" src="{{asset('uploads/avatar/'.$tweet->user->avatar)}}" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{route('profile',[$tweet->user->id])}}">
                                        <h4 class="media-heading">{{$tweet->user->name}} <span>{{$tweet->user->username}}</span></h4>
                                    </a>
                                    <p>{{$tweet->body}}.</p>
                                    @if($tweet->likes->contains($current_user->id))
                                        <i id="{{$tweet->id}}" class="favourite fa fa-heart like-btn liked"> <span>{{$tweet->likes()->count()}}</span></i>
                                    @else
                                        <i id="{{$tweet->id}}" class="favourite fa fa-heart-o like-btn unlike"> <span>{{$tweet->likes()->count()}}</span></i>
                                    @endif
                                    @if($tweet->user_id==$current_user->id)
                                        <a href="{{route('delete_tweet',[$tweet->id])}}"> delete
                                        </a>
                                    @endif
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- main scripts -->
<script src="{{asset('js/main.js')}}"></script>
</body>


</html>