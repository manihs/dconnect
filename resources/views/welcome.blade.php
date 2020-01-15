<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            .container{
            flex-direction: column;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            }

            span{
            padding: 10px;
            box-shadow:0 0 3px 0px gray , 0 0 10px 0px black;
            }

            .search-input-container{
            display: flex;
            padding: 6px 17px 6px 13px;
            box-shadow:0 0 3px 0px gray , 0 0 5px 0px black;
            border-radius: 25px;
            }

            button, input{
            font-family: Nunito;
            padding: 0;
            margin: 0;
            border: 0;
            background-color: transparent;
            }

            .search-ion{
            min-width: 16px;
            max-width: 20px;
            }

            .search-button{
            margin-left: 15px;
            }

            .search-input{
                padding: 5px;
                font-size: 16px;
                color: darkslategray;
                width: 80%;
                min-width: 365px;
                max-width: 500px;
            }

            input:focus,
            select:focus,
            textarea:focus,
            button:focus {
                outline: none;
            }

        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else

                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div>
                <div class="container">  
                    <div>
                    <h2>Owl's Communities</h2>
                    </div>   
                    <form action="{{ route('queryredirectform') }}" method="post">
                    @csrf        
                        <div class="search-input-container">
                            <input name="tags" type="text" class="search-input" placeholder="Find Community For....">
                            <button class="search-button">
                                <img src="https://img.icons8.com/ios-glyphs/50/000000/search.png" class="search-ion">
                            </button>
                        </div>        
                    </form>                                             
                </div>
            </div>
        </div>
    </body>
</html>
