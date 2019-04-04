<!DOCTYPE html>
<html>
    <head>
        <title>Companies</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{asset("css/app.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset("css/mdb.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset("css/mdb.lite.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset("css/addons/datatables.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="{{asset("js/jquery-3.3.1.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("js/bootstrap.min.js")}}" type="text/javascript"></script>

        <style>
            html, body {
                background-color: whitesmoke;
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

            .help-block,
            .error{
                color: red !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('home') }}"><strong>Home</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('company-list') }}"><strong>Companies</strong><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoice-list') }}"><strong>Invoices</strong></a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-success btn-flat" href="{{ URL::previous() }}"><strong>Back</a>
        </nav>
        @yield('content')
        <!-- Footer -->
        <style>
            .footer{
                position:inherit;
                bottom:0;
                width:100%;
                height:60px;   /* Height of the footer */
                background:#6cf;
            }
        </style>
        <footer class="footer page-footer font-small bg-dark" style="bottom:0;">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3"><strong>&COPY; {{date('Y')}} Invoice Generator</strong>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
        <script src="{{asset("js/addons/datatables.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("js/jquery.validate.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("js/additional-methods.min.js")}}" type="text/javascript"></script>
    </body>

</html>
