<div class="row text-center" id="read">
    <div class="col-xs-offset-1 col-xs-10
    col-sm-offset-1 col-sm-10
    col-md-offset-2 col-md-8
    col-lg-offset-2 col-lg-8
    ">
        <div class="row">
            <div class="col-xs-12 col-md-6 text-left">
                {{$recipient->name}} ({{$religion->name}})
            </div>
            <div class="col-xs-12 col-md-6 text-left">
                {{$goal->text}}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-left">
                {{$plea->text}}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br>
                <a class="btn-load-new-plea btn btn-info btn-block" href="javascript:">Read another plea</a>
                <br>
                <a class="btn-return-menu btn btn-info btn-block" href="javascript:">Return to menu</a>
            </div>
        </div>
    </div>
</div>