<div class="row text-center" id="read">
    <div class="col-xs-offset-1 col-xs-10
    col-sm-offset-1 col-sm-10
    col-md-offset-2 col-md-8
    col-lg-offset-2 col-lg-8
    ">

        @if(!empty($powerful_recipient) || !empty($indifferent_recipient))
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>Statistics</h1>
                @if(!empty($powerful_recipient))
                <p>
                    {{$powerful_recipient->name}} ({{$powerful_recipient['religion_name']}})
                    <br>The Omnipotent
                    <br>{{$powerful_recipient['stat']}}
                </p>
                @endif
                @if(!empty($indifferent_recipient))
                <p>
                    {{$indifferent_recipient->name}} ({{$indifferent_recipient['religion_name']}})
                    <br>The Indifferent
                    <br>{{$indifferent_recipient['stat']}}
                </p>
                @endif
                <p>More stats coming soon...</p>
            </div>
        </div>
        @else
        <div>
            <div class="col-xs-12 text-center">
                <h1>Statistics</h1>
                <p>
                    Not enough data just yet...<br>
                    Come back in few days!
                </p>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <br>
                <a class="btn-return-menu btn btn-info btn-block" href="javascript:">Return to menu</a>
            </div>
        </div>
    </div>
</div>