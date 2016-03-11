$(document).ready(function() {
    //Vars
    var recipientName = "";
    var recipientId = "";
    var goalText = "";
    var goalId = "";

    //Selectors
    var elLoading = $('#loading');
    var elFullpage = $('#fullpage');
    var elRecipientsWrapper = $('#recipients-wrapper');
    var elReligion = $(".religion");
    var elRecipientName = $('.recipient-name');
    var elFormPlea = $('form#plea-form');
    var elInputCheckAt = $('#check_at');
    var elGoal = $(".goal");
    var elFormGoal = $('form#form-add-goal');
    var elToken = $('#token');
    var elModalGoal = $('#modal-add-goal');
    var elInputGoalId = $('#goal_id');
    var elInputRecipientId = $('#recipient_id');
    var elTextareaPlea = $('#plea');
    var elInputGoalText = $('#text');
    var elInputGoalCurator = $('#curator_email');

    //Start
    elLoading.hide();
    elFullpage.fullpage({ controlArrows: true });
    $.fn.fullpage.setAllowScrolling(false, 'up, down');
    $.fn.fullpage.moveSectionUp();

    //Religion section
    elReligion.click(function() {
        elRecipientsWrapper.load("/view/recipient/religion/"+$(this).attr("data-id"), function() {
            $.fn.fullpage.moveSectionUp();
        });
    });

    //Recipients sections
    elRecipientsWrapper.on('click', '.recipient', function() {
        recipientName = $.trim($(this).text());
        recipientId = $.trim($(this).attr("data-id"));
        elRecipientName.text(recipientName);
        elFormPlea.find('input[name=recipient]').val(recipientId);
        $.fn.fullpage.moveSectionUp();
    });

    //Goal section
    elInputCheckAt.datepicker({
        format: "M d, yyyy",
        weekStart: 1,
        startDate: new Date(+new Date() + 86400000*2),
        daysOfWeekHighlighted: "0,6",
        todayHighlight: true
    });

    elGoal.click(function() {
        goalText = $.trim($(this).text());
        goalId = $.trim($(this).attr("data-id"));
        setDefaultsPlea();
        $.fn.fullpage.moveSectionUp();
    });

    elFormGoal.submit(function(e) {
        setProcessingSubmit();
        $.post('/api/goal', {
            "_token": elToken.val(),
            "text": elInputGoalText.val(),
            "check_at": elInputCheckAt.val(),
            "curator_email": elInputGoalCurator.val()
        }, function(response) {
            goalText = response.text;
            goalId = response.id;
            setDefaultsPlea();
            elModalGoal.on('hidden.bs.modal', function () {
                $.fn.fullpage.moveSectionUp();
            });
            elModalGoal.modal('toggle');
        });
        e.preventDefault();
    });

    //Plea section
    elFormPlea.submit(function(e) {
        setProcessingPleaSubmit();
        $.post('/api/plea', {
            "_token": elToken.val(),
            "goal_id": elInputGoalId.val(),
            "recipient_id": elInputRecipientId.val(),
            "text": elTextareaPlea.val()
        }, function() {
            $.fn.fullpage.moveSectionUp();
        });
        e.preventDefault();
    });

    //Function helpers
    function setDefaultsPlea() {
        if(goalText !== "" && recipientName !== "")
            elTextareaPlea.val('Please, '+recipientName+', help me with: '+goalText);
        if(goalId !== "")
            elInputGoalId.val(goalId);
        if(recipientId !== "")
            elInputRecipientId.val(recipientId);
    }
    function setProcessingSubmit() {
        elLoading.show();
        elFormGoal.children('input, button').prop("disabled", true);
    }
    function setProcessingPleaSubmit() {
        elFormPlea.children('textarea, button').prop("disabled", true);
    }
});
//$(document).ready(function() {
//
//    var debug = true;
//
//    var wiplea_app = wiplea_app || {};
//    (function(w){
//        'use strict';
//        var religionsWrapper = "#section-religion";
//        var recipientsWrapper = "#section-recipient";
//        var goalsWrapper = "#section-goal";
//        var religionClass = "religion";
//        var recipientClass = "recipient";
//        var goalClass = "goal";
//        var colDrawerDefaults = {
//            mode: "section",        //section or slide
//            target: "#",            //items wrapper id (or class)
//            itemsClass: ".",        //name of the items class
//            //section mode options
//            lgColumns: 4,
//            mdColumns: 3,
//            smColumns: 2,
//            xsColumns: 1,
//            //slide mode options
//            columnsPerSlide: 2,
//            itemsPerColumn: 5,
//            itemsPerSection: 10
//        };
//        var content = {
//            pleaForm: $(
//                '<div class="row">'+'\n'+
//                    '<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 text-center">'+'\n'+
//                        '<form class="form" action="javascript:">'+'\n'+
//                            '<div id="plea-wrapper" class="form-group">'+'\n'+
//                                '<textarea id="plea" name="plea" rows="5"></textarea>'+'\n'+
//                            '</div>'+'\n'+
//                            '<button type="submit">Send my plea!</button>'+'\n'+
//                        '</form>'+'\n'+
//                    '</div>'+'\n'+
//                '</div>'+'\n'
//            ),
//            goodBye: $(
//                '<p>Your Plea to <span id="recipient-name"></span> has been sent!</p>'
//            )
//        };
//        w.vault = {
//            religions: [],
//            recipients: [],
//            goals: []
//        };
//
//        w.init = function() {
//
//            fetchData('/api/religion', "religions", function() {
//                var options = colDrawerDefaults;
//                options.target = religionsWrapper;
//                options.itemsClass = religionClass;
//                colDrawer("religions", options);
//            });
//
//            fetchData('/api/recipient', "recipients");
//
//            fetchData('/api/goal',"goals", function() {
//                var options = colDrawerDefaults;
//                options.target = goalsWrapper;
//                options.itemsClass = goalClass;
//                colDrawer("goals", options);
//                buildFullPage();
//            });
//
//            //handlers?
//            //$('<a/>', {
//            //    href: 'javascript:',
//            //    html: religion.name,
//            //    click: function(e) {
//            //        e.preventDefault();
//            //        wiplea.loadRecipients(religion.id);
//            //        wiplea.nextSection();
//            //    }
//            //})
//        };
//
//
//        function fetchData(url, name, callback) {
//            $.getJSON(url, function(data) {
//                w.vault[name] = [];
//                $.each(data, function(i, item) { w.vault[name].push(item); });
//                if(typeof callback == "function") callback();
//            });
//        }
//        function colDrawer(name, options) {
//            //console.log(vault);
//            //console.log(options);
//            // Item distribution calc
//            var items = w.vault[name];
//            var nItems = w.vault[name].length;
//            var nItemsPerColumn = options.itemsPerColumn;
//            var nItemsPerSection = options.itemsPerSection;
//            var columnsPerSlide = options.columnsPerSlide;
//            var itemClass = options.itemsClass;
//
//            if(options.mode === "slides") {
//
//            } else {
//                var lg = Math.floor((options.lgColumns < nItems) ? 12/options.lgColumns : 12/nItems);
//                var md = Math.floor((options.mdColumns < nItems) ? 12/options.mdColumns : 12/nItems);
//                var sm = Math.floor((options.smColumns < nItems) ? 12/options.smColumns : 12/nItems);
//                var xs = Math.floor((options.xsColumns < nItems) ? 12/options.xsColumns : 12/nItems);
//
//                var wrapper = $('<div/>', { class: 'row text-center' }).appendTo(options.target);
//
//                $.each(items, function(i, item) {
//                    wrapper.append(
//                        '<div class="'+itemClass+' col-xs-'+xs+' col-sm-'+sm+' col-md-'+md+' col-lg-'+lg+'">' +
//                            '<a href="javascript:" data-id="'+item.id+'">'+
//                                item.name +
//                            '</a>' +
//                        '</div>'
//                    );
//                });
//            }
//        }
//        function nextSection() {
//            $.fn.fullpage.moveSectionUp();
//        }
//        function previousSection() {
//            $.fn.fullpage.moveSectionDown();
//        }
//        function buildFullPage() {
//            $('#fullpage').fullpage({ controlArrows: true });
//            $.fn.fullpage.setAllowScrolling(debug, 'up, down, left, right');
//        }
//        function removeLoading() {
//            $('#loading-screen').addClass('animated fadeOutDown');
//        }
//    })(wiplea_app);

        //var wiplea = {
        //    loadReligions: function() {
        //        $.each(this.stored.religions, function(i, religion) {
        //            $('<div/>', {
        //                class: 'religion col-xs-12 col-sm-6 col-md-4 col-lg-2'
        //            }).appendTo(
        //                '#religions-wrapper'
        //            ).append(
        //                $('<a/>', {
        //                    href: 'javascript:',
        //                    html: religion.name,
        //                    click: function(e) {
        //                        e.preventDefault();
        //                        wiplea.loadRecipients(religion.id);
        //                        wiplea.nextSection();
        //                    }
        //                })
        //            );
        //        });
        //    },
        //    loadRecipients: function(id) {
        //        $.each(this.stored.recipients, function(i, recipient) {
        //            if(recipient.religion_id == id) {
        //                $('<div/>', {
        //                    class: 'recipient col-xs-12 col-sm-6 col-md-4 col-lg-2'
        //                }).appendTo(
        //                    '#recipients-wrapper'
        //                ).append(
        //                    $('<a/>', {
        //                        href: 'javascript:',
        //                        html: recipient.name,
        //                        click: function(e) {
        //                            e.preventDefault();
        //                            wiplea.loadGoals();
        //                            wiplea.nextSection();
        //                        }
        //                    })
        //                );
        //            }
        //        });
        //    },
        //    loadGoals: function() {
        //        var n_goals = this.stored.goals.length;
        //        var n_goals_per_slide = 10;
        //        var n_slides = Math.floor(n_goals / n_goals_per_slide);
        //        var j = 0;
        //        $.each(this.stored.goals, function(i, goal) {
        //            console.log(i%n_goals_per_slide===0);
        //            if(i%n_goals_per_slide===0) {
        //                j++;
        //                if(j > n_slides) return true;
        //                var current_goals_wrapper_id = "#goals-wrapper-"+j;
        //            }
        //            $('<div/>', {
        //                class: 'goal'
        //            }).appendTo(
        //                current_goals_wrapper_id
        //            ).append(
        //                $('<a/>', {
        //                    href: 'javascript:',
        //                    html: goal.text,
        //                    click: function(e) {
        //                        e.preventDefault();
        //                        wiplea.loadPlea();
        //                        wiplea.nextSection();
        //                    }
        //                })
        //            );
        //        });
        //    },
        //};
//    wiplea_app.init();
//
//    $('#loading-screen').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', $(this).remove());
//});