<div class="row text-center" id="read">
    <div class="col-xs-offset-1 col-xs-10
    col-sm-offset-1 col-sm-10
    col-md-offset-2 col-md-8
    col-lg-offset-2 col-lg-8
    ">
        @if(count($plea)>0)
        <div class="row">
            <div class="col-xs-12 text-left breadcrumb">
                <div class="row help-block">
                    <div class="hidden-xs hidden-sm col-md-6 text-left">
                        {{$recipient->name}} ({{$religion->name}})
                    </div>
                    <div class="hidden-xs hidden-sm col-md-6 text-right">
                        {{$goal->text}}
                    </div>
                    <div class="col-xs-12 col-sm-12 hidden-md hidden-lg text-center">
                        {{$recipient->name}} ({{$religion->name}})
                    </div>
                    <div class="col-xs-12 col-sm-12 hidden-md hidden-lg text-center">
                        {{$goal->text}}
                    </div>
                </div>
                <br>

                {{$plea->text}}
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-xs-12 text-center">
                No public plea found!<br>
                Don't forget to make your own plea!<br>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                @if(count($plea)>0)
                <br>
                <a class="btn-load-new-plea btn btn-info btn-block" href="javascript:">Read another plea</a>
                @endif
                <br>
                <a class="btn-return-menu btn btn-info btn-block" href="javascript:">Return to menu</a>
            </div>
        </div>
    </div>
</div>