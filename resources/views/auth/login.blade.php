
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://necolas.github.io/normalize.css/7.0.0/normalize.css" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="login.js"></script>
</head>
<body class="segoe">
<div class="topcontainer">
    <div class="topbar">
        <i class="fa fa-twitter logocenter" aria-hidden="true"></i>
    </div>

    <div class="AppContent wrapper wrapper-signup" id="page-container">
        <link rel="stylesheet" href="https://abs.twimg.com/a/1511833274/css/t1/t1_signup.bundle.css">
        <div class="page-canvas">
            <div class="signup-wrapper">
                <h1>
                    Join Twitter Clone today.
                </h1>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
                <form method="POST" action="{{ route('login') }}">
                <div class="t1-form signup " id="phx-signup-form">

                        <div class="prompt email">
                            <div data-fieldname="email" class="field">
                                <div class="sidetip">
                                    <p id="emailerror" role="alert" class="invalid error">Please enter a valid email.</p>
                                </div>
                                <input name="email"  type="text" placeholder="Email" aria-required="true" class="email-input" id="email">

                            </div>
                        </div>
                        <div class="prompt password">
                            <div data-fieldname="password" class="field">
                                <div class="sidetip">
                                    <p id="passerror" role="alert" class="blank error">Please enter a password.</p>
                                </div>
                                <input name="password" type="password" placeholder="Password" aria-required="true" id="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="doit">
                        <div class="sign-up-box">
                            <input type="submit" value="Sign in" id="submit_button" class="signup EdgeButton EdgeButton--primary EdgeButton--large submit">
                        </div>
                    </div>
                </form>

                <br>

                <div class="doit">
                    <div class="sign-up-box">
                        <a href="{{route('register')}}" id="submit_button" class="signup EdgeButton EdgeButton--primary EdgeButton--large submit"> Sign up</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
