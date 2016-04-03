<html>
<head>
    <style>
        body {
            background-color: #93baeb;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div style="background-color: #f8f8f8; overflow: auto; padding-top:50px; padding-bottom: 100px;">
    <div style="text-align: center;">
    <h1>
        wiPlea check!
    </h1>
    <br>
    </div>
    <div style="text-align: center">
        It's time to check if your goals has become true!
        <br><br>
        <span style="font-weight:bold;font-size:16px;">{{$text}}</span>
    </div>
    <br><br><br>
    <div style="text-align: center">
        <a style="padding:15px;background-color:#1E90FF;color:#ffffff;" href="http://wiplea.com/check/goal?id={{$id}}&check_token={{$check_token}}&check=1">
            Yes, it has become true
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a style="padding:15px;background-color:#1E90FF;color:#ffffff;" href="http://wiplea.com/check/goal?id={{$id}}&check_token={{$check_token}}&check=0">
            No, it has not become true
        </a>
    </div>
</div>

</body>
</html>

