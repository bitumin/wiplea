<div class="row text-left">
    <div class="col-xs-12 col-md-6" id="random-plea-recipient">
        <small>Recipient:</small> {{$recipient->name}} ({{$religion->name}})
    </div>
    <div class="col-xs-12 col-md-6" id="random-plea-goal">
        <small>Goal:</small> {{$goal->text}}
    </div>
</div>
<div class="row text-left">
    <div class="col-xs-12" id="random-plea-text">
        {{$plea->text}}
    </div>
</div>
<div class="row text-center">
    <div class="col-xs-12" id="random-plea-text">
        <form class="form" role="form" action="javascript:" id="load-new-random-plea">
            <button class="btn btn-info btn-block">Read another plea</button>
        </form>
    </div>
</div>

