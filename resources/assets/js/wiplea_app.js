$(document).ready(function() {

    //All events must be catch when bubbling up to the main section
    var elMain = $("#main");

    //Globals
    var g = {
        recipient: "",
        recipient_id: "",
        goal: "",
        goal_id: ""
    };

    //Load menu
    loadView('menu');

    //Helper functions
    function loadView(view) {
        elMain.fadeOut(400, function() {
            elMain.load('/view/'+view, function() {

                //pre-load views information, draw/init special elements
                if(view === 'plea' && g.recipient !== "" && g.goal !== "") {
                    $('textarea[name="text"]').val('Please, '+g.recipient+', help me with: '+g.goal);
                }

                if(view === 'goals') {
                    $('#check_at').datepicker({
                        autoclose: true,
                        format: "M d, yyyy",
                        weekStart: 1,
                        startDate: new Date(+new Date() + 86400000*2), //starts the day after tomorrow
                        daysOfWeekHighlighted: "0,6",
                        todayHighlight: true
                    });
                }

                elMain.fadeIn();
            });
        });
    }

    //Menu page handlers
    elMain.on('click', '.btn-menu-plea', function() {
        loadView('religions');
    });
    elMain.on('click', '.btn-menu-stats', function() {
        loadView('stats');
    });
    elMain.on('click', '.btn-menu-read', function() {
        loadView('read');
    });

    //Religions page handlers
    elMain.on('click', '.item-religion', function() {
        loadView('recipients/'+$(this).attr('data-id'));
    });

    //Recipients page handlers
    elMain.on('click', '.item-recipient', function() {
        g.recipient = $.trim($(this).text());
        g.recipient_id = $(this).attr("data-id");
        loadView('goals');
    });

    //Goals page handlers
    elMain.on('click', '.item-goal', function() {
        g.goal = $.trim($(this).text());
        g.goal_id = $(this).attr("data-id");
        loadView('plea');
    });
    elMain.on('click', '.btn-more-goals', function() {
        loadView('goals');
    });
    elMain.on('submit', 'form#form-add-goal', function(e) {
        elMain.off('click', '.item-goal');
        var modal = $('#modal-add-goal');
        $.post('/api/goal', $(this).serialize(), function(response) {
            g.goal = response.text;
            g.goal_id = response.id;
            modal.on('hidden.bs.modal', function () {
                loadView('plea');
            });
            modal.modal('hide');
        });
        e.preventDefault();
    });

    //Plea page handlers
    elMain.on('submit', '#form-send-plea', function(e) {
        $('input[name=recipient_id]').val(g.recipient_id);
        $('input[name=goal_id]').val(g.goal_id);
        $('input[name=is_public]').val(($('input[name=public]').prop('checked')) ? "1": "0");
        $.post('/api/plea', $(this).serialize(), function() {
            loadView('done');
        });
        e.preventDefault();
    });

    //Done/read page handlers
    elMain.on('click', '.btn-return-menu', function() {
        loadView('menu');
    });

    //Read pleas page handlers
    elMain.on('click', '.btn-load-new-plea', function() {
        loadView('read');
    });

});