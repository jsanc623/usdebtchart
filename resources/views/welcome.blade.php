<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The US National Debt, Graphed</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height { height: 100vh; }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref { position: relative; }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .content { text-align: center; }
            .graph { text-align: center; }
            .title { font-size: 84px; }
            .m-b-md { margin-bottom: 30px; }
            hr.breaker {
                height: 30px;
                border: 0 solid #8c8b8b;
                border-top-width: 1px;
                border-radius: 20px;
                margin-left: 10%;
                margin-right: 10%;
            }
            hr.breaker:before {
                display: block;
                content: "";
                height: 30px;
                margin-top: -31px;
                border: 0 solid #8c8b8b;
                border-bottom-width: 1px;
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="{{ url('http://juanleonardosanchez.com') }}" target="_blank">Author</a>
            </div>

            <div class="content">
                <div class="m-b-md">
                    <img src="{{ url('images/white-house-logo-lg-bl.png') }}" alt="Logo" title="Logo" height='80px'/>
                </div>
                <div class="title m-b-md">
                    The US National Debt
                </div>

                <div class="links">
                    <a href="https://treasurydirect.gov">Treasury Direct</a>
                    <a href="https://whitehouse.gov">White House</a>
                    <a href="https://bea.gov">US BEA</a>
                    <a href="https://github.org">Source Code</a>
                </div>
            </div>
        </div>

        <hr class="breaker">

        <div class="flex-center position-ref full-height">
            <div class="graph m-b-md">
                asdfasdf
            </div>
        </div>
    </body>
</html>
