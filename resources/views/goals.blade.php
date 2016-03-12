<div class="row text-center">
    <div class="col-xs-12">
        <h1>Choose your goal...</h1>
    </div>
</div>

<div class="row text-center">
<?php $i=0; ?>
@foreach($goals as $goal)
    @if($i%2===0)
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <a class="item-goal" href="javascript:" data-id="{{$goal->id}}">
            {{$goal->text}}
        </a>
    </div>
    @else
    <div class="hidden-xs hidden-sm col-md-6 col-lg-6">
        <a class="item-goal" href="javascript:" data-id="{{$goal->id}}">
            {{$goal->text}}
        </a>
    </div>
    @endif
<?php $i++; ?>
@endforeach
</div>

<div class="row text-center">
    <div class="col-xs-12">
        <br>
        <a href="javascript:" class="btn btn-info btn-block btn-more-goals">
            Load more goals
        </a>
        <br>
        <a href="javascript:" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-add-goal">
            ...or add a new goal
        </a>
    </div>
</div>

{{--Modal: add new goal--}}
<div id="modal-add-goal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="form-add-goal" role="form" class="form" action="javascript:">

                {!! csrf_field() !!}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="text">Your goal:</label>
                        <input id="text" name="text" class="form-control" type="text" placeholder="Donald Trump becomes president of the USA." required>
                        <p class="help-block">Set your own goal</p>
                    </div>
                    <div class="form-group">
                        <label for="check_at">Choose date:</label>
                        <input id="check_at" name="check_at" class="form-control" type="text" placeholder="Nov 8, 2016" required>
                        <p class="help-block">Date when you'll know the goal has become true</p>
                    </div>
                    <div class="form-group">
                        <label for="curator_email">E-mail:</label>
                        <input id="curator_email" name="curator_email" class="form-control" type="email" placeholder="my@email.com" required>
                        <p class="help-block">
                            On the selected date you will receive an email to check if your goal has become true.
                        </p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Add goal</button>
                    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
                </div>

            </form>

        </div>
    </div>
</div>
