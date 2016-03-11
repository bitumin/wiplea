<?php
/*View settings*/
$lgColumns = 4;
$mdColumns = 3;
$smColumns = 2;
$xsColumns = 1;
/* Cols distribution */
$rlg = floor(($lgColumns < count($recipients)) ? 12/$lgColumns : 12/count($recipients));
$rmd = floor(($mdColumns < count($recipients)) ? 12/$mdColumns : 12/count($recipients));
$rsm = floor(($smColumns < count($recipients)) ? 12/$smColumns : 12/count($recipients));
$rxs = floor(($xsColumns < count($recipients)) ? 12/$xsColumns : 12/count($recipients));
?>
<div class="row text-center">
    @foreach($recipients as $recipient)
        <div class="col-xs-{{$rxs}} col-sm-{{$rsm}} col-md-{{$rmd}} col-lg-{{$rlg}}">
            <a href="javascript:" class="recipient" data-id="{{$recipient->id}}">
                {{$recipient->name}}
            </a>
        </div>
    @endforeach
</div>
