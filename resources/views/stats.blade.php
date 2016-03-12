<div class="row text-center" id="read">
    <div class="col-xs-offset-1 col-xs-10
    col-sm-offset-1 col-sm-10
    col-md-offset-2 col-md-8
    col-lg-offset-2 col-lg-8
    ">
        <div class="row">
            <div class="col-xs-12 col-md-6 text-center">
                <h1>Statistics</h1>
                <p>
                    {{$powerful_recipient->name}} ({{$powerful_recipient['religion_name']}})
                    <br>The Omnipotent
                    <br>{{$powerful_recipient['stat']}}
                </p>
                <p>
                    {{$indiferent_recipient->name}} ({{$indiferent_recipient['religion_name']}})
                    <br>The Indifferent
                    <br>{{$indiferent_recipient['stat']}}
                </p>
                <p>More stats coming soon...</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br>
                <a class="btn-return-menu btn btn-info btn-block" href="javascript:">Return to menu</a>
            </div>
        </div>
    </div>
</div>