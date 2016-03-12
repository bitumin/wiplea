<div class="row">
    <div class="text-center
    col-xs-offset-1 col-xs-10
    col-sm-offset-2 col-sm-8
    col-md-offset-3 col-md-6
    col-lg-offset-4 col-lg-4
    ">

        <form id="form-send-plea" class="form" action="javascript:">

            {!! csrf_field() !!}

            <input type="hidden" name="goal_id" value="">
            <input type="hidden" name="recipient_id" value="">
            <input type="hidden" name="is_public" value="">

            <div class="form-group">
                <textarea class="form-control" rows="10" name="text" maxlength="8000" required></textarea>
            </div>

            <div class="checkbox">
                <label><input name="public" type="checkbox"> People can read this plea (is public)</label>
            </div>

            <button type="submit" class="btn btn-block btn-info">Send my plea!</button>

        </form>

    </div>
</div>
