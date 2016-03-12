<!DOCTYPE html>
<html lang="en">
<head>

    {{--Meta--}}
    <meta charset="UTF-8">
    <meta name="description" content="Send your plea to the heavens and see what happens!">
    <meta name="keywords" content="plea, pleas, wiplea, prayer, prayers, gods, religions, god, religion">
    <meta name="author" content="Mitxel">

    {{--Title--}}
    <title>Wiplea</title>

    {{--Favicon--}}
    {{--<link rel="icon" type="image/png" href="" />--}}

    {{--Fonts--}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    {{--CSS--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('css/wiplea_app.min.css') }}" rel="stylesheet">
</head>
<body>

    <div class="corner-ribbon top-right sticky green">wiPlea Alpha</div>
    {{--Each section is a full page view--}}
    <div class="content-wrapper container-fluid">

        <div class="main-wrapper" id="main">
            <div class="row">
                <div class="col-xs-12 text-center" id="wiplea-loading">
                    <p>Loading...</p>
                    <h1 class="animated infinite pulse">wiPlea</h1>
                </div>
            </div>
        </div>

    </div>

    {{--JS libs--}}
    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('js/wiplea_app.min.js')}}"></script>
</body>
</html>
