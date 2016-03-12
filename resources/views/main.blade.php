<!DOCTYPE html>
<html lang="en">
<head>

    {{--Meta--}}
    <meta charset="UTF-8">

    {{--Title--}}
    <title>Wiplea</title>

    <?php
    /*Religious icons collection*/
    $icons = [
            'Bahá\'i-icon.png', 'Hinduism-icon.png', 'Paganism-icon.png', 'Taoism-Icon.png',
            'Buddhism-icon.png', 'Islam-icon.png', 'Shinto-icon.png', 'Christian-icon.png',
            'Jainism-icon.png', 'Sikhism-icon.png', 'Confucian-icon.png', 'Judaism-icon.png',
            'Swastika-Icon.png'
    ];
    ?>
    {{--Favicon--}}
    <link rel="icon" type="image/png" href="{{ asset('/img/religions/'. $icons[array_rand($icons)]) }}" />

    {{--Fonts--}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    {{--CSS--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.8/jquery.fullPage.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="corner-ribbon top-right sticky green">wiPlea Alpha</div>
    {{--Each section is a full page view--}}
    <div class="content-wrapper container-fluid">

        <div class="main-wrapper" id="main">
            <div class="row">
                <div class="col-xs-12 text-center" id="wiplea-loading">
                    <p>Loading...</p>
                    <h1 class="animated infinite pulse">wiPlea</h1>
                </div>
            </div>
        </div>

    </div>


    {{--JS libs--}}
    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.8/jquery.fullPage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script type="application/javascript">
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

            //Init
            $('#fullpage').fullpage();

            //Load menu
            loadView('menu');

            //Helper functions
            function loadView(view) {
                elMain.fadeOut(400, function() {
                    elMain.load('/view/'+view, function() {
                        if(view == 'plea' && g.recipient !== "" && g.goal !== "") {
                            $('textarea[name="text"]').val('Please, '+g.recipient+', help me with: '+g.goal);
                        }
                        elMain.fadeIn();
                    });
                });
            }

            //Menu page handlers
            elMain.one('click', '.btn-menu-plea', function() {
                loadView('religions');
            });
            elMain.one('click', '.btn-menu-stats', function() {
                loadView('stats');
            });
            elMain.one('click', '.btn-menu-read', function() {
                loadView('read');
            });

            //Religions page handlers
            elMain.one('click', '.item-religion', function() {
                loadView('recipients/'+$(this).attr('data-id'));
            });

            //Recipients page handlers
            elMain.one('click', '.item-recipient', function() {
                g.recipient = $.trim($(this).text());
                g.recipient_id = $(this).attr("data-id");
                loadView('goals');
            });

            //Goals page handlers
            elMain.one('click', '.item-goal', function() {
                g.goal = $.trim($(this).text());
                g.goal_id = $(this).attr("data-id");
                loadView('plea');
            });
            elMain.on('click', '.btn-more-goals', function() {
                loadView('goals');
            });
            elMain.one('submit', 'form#form-add-goal', function(e) {
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
            elMain.one('submit', '#form-send-plea', function(e) {
                $('input[name=recipient_id]').val(g.goal_id);
                $('input[name=goal_id]').val(g.recipient_id);
                $('input[name=is_public]').val(($('input[name=public]').prop('checked')) ? "1": "0");
                console.log($(this).serialize());
                $.post('/api/plea', $(this).serialize(), function() {
                    loadView('done');
                });
                e.preventDefault();
            });

            //Done page handlers
            elMain.one('click', '.btn-load-menu', function() {
                loadView('menu');
            });

        });

//
//            //Selectors
//            var elLoading = $('#loading');
//            var elFullpage = $('#fullpage');
//            var elRecipientsWrapper = $('#recipients-wrapper');
//            var elReligion = $(".religion");
//            var elRecipientName = $('.recipient-name');
//            var elFormPlea = $('form#plea-form');
//            var elInputCheckAt = $('#check_at');
//            var elGoal = $(".goal");
//            var elFormGoal = $('form#form-add-goal');
//            var elToken = $('#token');
//            var elModalGoal = $('#modal-add-goal');
//            var elInputGoalId = $('#goal_id');
//            var elInputRecipientId = $('#recipient_id');
//            var elTextareaPlea = $('#plea');
//            var elInputGoalText = $('#text');
//            var elInputGoalCurator = $('#curator_email');
//            var elInputPleaIsPublic = $('#is_public');
//            var elSectionRandomPlea = $('wiplea-random-plea');
//            var elSectionLoadingWiPlea = $('wiplea-loading');
//            var elSectionWiPleaStatistics = $('wiplea-statistics');




            //Religion section
//            elReligion.click(function() {
//                elRecipientsWrapper.load("/web/recipient/religion/"+$(this).attr("data-id"), function() {
//                    $.fn.fullpage.moveSectionUp();
//                });
//            });
//
//            //Recipients sections
//            elRecipientsWrapper.on('click', '.recipient', function() {
//                recipientName = $.trim($(this).text());
//                recipientId = $.trim($(this).attr("data-id"));
//                elRecipientName.text(recipientName);
//                elFormPlea.find('input[name=recipient]').val(recipientId);
//                $.fn.fullpage.moveSectionUp();
//            });
//
//            //Goal section
//            elInputCheckAt.datepicker({
//                format: "M d, yyyy",
//                weekStart: 1,
//                startDate: new Date(+new Date() + 86400000*2),
//                daysOfWeekHighlighted: "0,6",
//                todayHighlight: true
//            });
//
//            elGoal.click(function() {
//                goalText = $.trim($(this).text());
//                goalId = $.trim($(this).attr("data-id"));
//                setDefaultsPlea();
//                $.fn.fullpage.moveSectionUp();
//            });
//
//            elFormGoal.submit(function(e) {

//            });
//
//            //Plea section
//            elFormPlea.submit(function(e) {
//                setProcessingPleaSubmit();
//                $.post('/api/plea', {
//                    "_token": elToken.val(),
//                    "goal_id": elInputGoalId.val(),
//                    "recipient_id": elInputRecipientId.val(),
//                    "is_public": elInputPleaIsPublic.val(),
//                    "text": elTextareaPlea.val()
//                }, function() {
//                    $.fn.fullpage.moveSectionUp();
//                });
//                e.preventDefault();
//            });
//
//            //Function helpers
//            function setDefaultsPlea() {
//                if(goalText !== "" && recipientName !== "")
//                    elTextareaPlea.val('Please, '+recipientName+', help me with: '+goalText);
//                if(goalId !== "")
//                    elInputGoalId.val(goalId);
//                if(recipientId !== "")
//                    elInputRecipientId.val(recipientId);
//            }
//            function setProcessingSubmit() {
//                elLoading.show();
//                elFormGoal.children('input, button').prop("disabled", true);
//            }
//            function setProcessingPleaSubmit() {
//                elFormPlea.children('textarea, button').prop("disabled", true);
//            }
    </script>
</body>
</html>
