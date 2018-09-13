<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Twitter Wall</title>
    <link href="https://necolas.github.io/normalize.css/7.0.0/normalize.css" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}"></script>
</head>
@include('logout')
<body class="segoe" style="background: rgb(230, 236, 240);">
<div>
    <div class="wallcontainer">
        <div class="profilecard">
            <div class="profilecardhead"></div>
            <div class="profilecardimagediv">
                <a href="{{route('my_profile')}}">
                <img src="{{asset('uploads/avatar/'.$current_user->avatar)}}">
                </a>
            </div>

            <div class="profilecardnameidcont">
                <div class="profilecardnamecont">
                    <span id="profilecardname"></span>
                </div>
                <span id="profilecarduid"></span>
            </div>

            <form method="GET" action="{{ route('search') }}">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>

            <div class="profilecardstatsdiv">
                <ul class="profilecardstatslist">
                    <li class="profilecardstatslistitem">
                                 <span class="dispblk">
                                     <span class="statslistitemhead">Tweets</span>
                                     <span id="statslistitemcount" class="statslistitemcount">{{$my_tweets}}</span>
                                 </span>
                    </li>

                    <li class="profilecardstatslistitem">
                                 <span class="dispblk">
                                     <span class="statslistitemhead">Following</span>
                                     <span class="statslistitemcount">{{$following}}</span>
                                 </span>
                    </li>

                    <li class="profilecardstatslistitem">
                                 <span class="dispblk">
                                     <span class="statslistitemhead">Followers</span>
                                     <span class="statslistitemcount">{{$followers}}</span>
                                 </span>
                    </li>
                </ul>
            </div>
        </div>


        <div class="rightcontainer">
            <div class="posttweetcontainer">
                <img class="posttweetprofimg" src="{{asset('uploads/avatar/'.$current_user->avatar)}}">
                <div class="ml56px">
                    <form action="{{route('create_tweet')}}" method="post">
                    <div class="posttweettacontainer">
                        <textarea id="posttweetta" name="body" class="posttweetta" placeholder="What's happening?"></textarea>
                        <div class="posttweetcountcont">
                            <span class="posttweetcount"><span id="totalchars">0</span>/250</span>
                        </div>
                    </div>
                    <div class="posttweetbutcont">
                        <button type="submit" id="posttweetbut" class="posttweetbut">Tweet</button>
                    </div>
                    </form>
                </div>
            </div>
            <div>
                <ul id="tweetscontainer" class="tweetscontainer">
                @foreach($tweets as $tweet)
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
                            </div>

                            @if($tweet->user_id==$current_user->id)
                                <a href="{{route('delete_tweet',[$tweet->id])}}"> delete
                              </a>
                            @endif

                        </div>

                    @endforeach
                </ul>

            </div>
            </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>