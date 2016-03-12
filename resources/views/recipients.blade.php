<?php

/*View settings*/
$lgColumns = 4;
$mdColumns = 3;
$smColumns = 2;
$xsColumns = 1;

/* Cols distribution */
if(isset($recipients)) {
    $lg = floor(($lgColumns < count($recipients)) ? 12/$lgColumns : 12/count($recipients));
    $md = floor(($mdColumns < count($recipients)) ? 12/$mdColumns : 12/count($recipients));
    $sm = floor(($smColumns < count($recipients)) ? 12/$smColumns : 12/count($recipients));
    $xs = floor(($xsColumns < count($recipients)) ? 12/$xsColumns : 12/count($recipients));
}

?>

<div class="row text-center" id="religions-title">
    <div class="col-xs-12">
        <h1>Choose recipient...</h1>
    </div>
</div>

<div class="row text-center">
    @foreach($recipients as $recipient)
        <div class="col-xs-{{$xs}} col-sm-{{$sm}} col-md-{{$md}} col-lg-{{$lg}}">
            <a href="javascript:" class="item-recipient" data-id="{{$recipient->id}}">
                {{$recipient->name}}
            </a>
        </div>
    @endforeach
</div>
