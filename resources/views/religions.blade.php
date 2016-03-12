<?php

    /*View settings*/
    $lgColumns = 4;
    $mdColumns = 3;
    $smColumns = 2;
    $xsColumns = 1;

    /* Cols distribution */
    if(isset($religions)) {
        $lg = floor(($lgColumns < count($religions)) ? 12/$lgColumns : 12/count($religions));
        $md = floor(($mdColumns < count($religions)) ? 12/$mdColumns : 12/count($religions));
        $sm = floor(($smColumns < count($religions)) ? 12/$smColumns : 12/count($religions));
        $xs = floor(($xsColumns < count($religions)) ? 12/$xsColumns : 12/count($religions));
    }

?>

<div class="row text-center" id="religions-title">
    <div class="col-xs-12">
        <h1>Choose religion...</h1>
    </div>
</div>

<div class="row text-center" id="religions">
    @foreach($religions as $religion)
        <div class="col-xs-{{$xs}} col-sm-{{$sm}} col-md-{{$md}} col-lg-{{$lg}}">
            <a href="javascript:" class="item-religion" data-id="{{$religion->id}}">
                {{$religion->name}}
            </a>
        </div>
    @endforeach
</div>