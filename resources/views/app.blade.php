<?php
/*Religious icons collection*/
$icons = [
    'Bahá\'i-icon.png',
    'Hinduism-icon.png',
    'Paganism-icon.png',
    'Taoism-Icon.png',
    'Buddhism-icon.png',
    'Islam-icon.png',
    'Shinto-icon.png',
    'Christian-icon.png',
    'Jainism-icon.png',
    'Sikhism-icon.png',
    'Confucian-icon.png',
    'Judaism-icon.png',
    'Swastika-Icon.png',
];
/*View settings*/
$lgColumns = 4;
$mdColumns = 3;
$smColumns = 2;
$xsColumns = 1;
/* Cols distribution */
if(isset($religions)) {
    $rlg = floor(($lgColumns < count($religions)) ? 12/$lgColumns : 12/count($religions));
    $rmd = floor(($mdColumns < count($religions)) ? 12/$mdColumns : 12/count($religions));
    $rsm = floor(($smColumns < count($religions)) ? 12/$smColumns : 12/count($religions));
    $rxs = floor(($xsColumns < count($religions)) ? 12/$xsColumns : 12/count($religions));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    {{--Meta--}}
    <meta charset="UTF-8">

    {{--Title--}}
    <title>Wiplea</title>

    {{--Favicon--}}
    <link rel="icon" type="image/png" href="/img/religions/{{ $icons[array_rand($icons)] }}" />

    {{--Fonts--}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    {{--CSS--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.8/jquery.fullPage.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="corner-ribbon top-right sticky green">wiPlea Alpha</div>
    {{--Each section is a full page view--}}
    <div id="fullpage">
        <div class="section" id="section-done">
            <div class="row">
                <div class="col-xs-12 text-center">
                    Your plea to <span class="recipient-name"></span> has been sent!
                </div>
            </div>
        </div>
        <div class="section" id="section-plea">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4 text-center">
                    <form class="form" id="plea-form" action="javascript:">
                        <input type="hidden" id="goal_id" name="goal_id" value="0">
                        <input type="hidden" id="recipient_id" name="recipient_id" value="0">
                        <div class="form-group">
                            <label for="plea"></label><textarea class="form-control" rows="5" id="plea" name="plea" maxlength="8000"></textarea>
                        </div>
                        <button type="submit" id="btn-send-plea" class="btn btn-block btn-info">Send my plea!</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section" id="section-goal">
        @for($i=0; $i<count($goals); ++$i)
            @if(false)<div><div>@endif
            @if(($i%20===0 && $i!==0))
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <br><a href="javascript:" data-toggle="modal" data-target="#modal-add-goal" class="btn-add-goal">Add a new goal</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($i%20===0)
                <div class="slide">
                    <div class="row text-center">
            @endif
                @if($i%2===0)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <a class="goal" href="javascript:" data-id="{{$goals[$i]->id}}">
                            {{$goals[$i]->text}}
                        </a>
                    </div>
                @else
                    <div class="hidden-xs hidden-sm col-md-6 col-lg-6">
                        <a class="goal" href="javascript:" data-id="{{$goals[$i]->id}}">
                            {{$goals[$i]->text}}
                        </a>
                    </div>
                @endif
            @if($i===count($goals)-1)
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <br><a href="javascript:" data-toggle="modal" data-target="#modal-add-goal" class="btn-add-goal">Add a new goal</a>
                        </div>
                    </div>
                    </div>
                </div>
            @endif
        @endfor
        </div>
        <div class="section" id="section-recipient">
            <div class="row">
                <div id="recipients-wrapper" class="col-xs-12">

                </div>
            </div>
        </div>
        <div class="section" id="section-religion">
            <div class="row text-center">
            @foreach($religions as $religion)
                <div class="col-xs-{{$rxs}} col-sm-{{$rsm}} col-md-{{$rmd}} col-lg-{{$rlg}}">
                    <a href="javascript:" class="religion" data-id="{{$religion->id}}">
                        {{$religion->name}}
                    </a>
                </div>
            @endforeach
            </div>
        </div>
        <div class="section active" id="section-loading">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <p>Loading...</p>
                    <h1 class="animated infinite pulse">wiPlea</h1>
                </div>
            </div>
        </div>
    </div>

    {{--Modals--}}
    <div id="modal-add-goal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" class="form" id="form-add-goal" action="javascript:">
                <input type="hidden" id="token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="text">Your goal:</label>
                        <input class="form-control" type="text" id="text" name="text" placeholder="Donald Trump becomes president of the USA." required>
                        <p class="help-block">Set your own goal</p>
                    </div>
                    <div class="form-group">
                        <label for="check_at">Check date:</label>
                        <input id="check_at" name="check_at" class="form-control" type="text" placeholder="Nov 8, 2016" required>
                        <p class="help-block">When you will know the goal has become true?</p>
                    </div>
                    <div class="form-group">
                        <label for="curator_email">E-mail:</label>
                        <input class="form-control" type="email" id="curator_email" name="curator_email" placeholder="my@email.com" required>
                        <p class="help-block">
                            On the selected date you will receive an email to check if your goal has become true.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="loading" style="display: inline-block;" class="animated infinite pulse">loading&nbsp;&nbsp;&nbsp;</div>
                    <button id="btn-submit" type="submit" class="btn btn-info">Add goal</button>
                    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{--JS libs--}}
    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.8/jquery.fullPage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/wiplea_app.min.js') }}"></script>
</body>
</html>
