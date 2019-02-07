(function($) {

	if ($(window).width() > ms_data.screen_size ) {

        /* MS Popup */

        /* initialize popup */

        $(document).ready(

            setTimeout(function() {

                $('#popup_options2').lightlayer({

                    backgroundColor : ms_data.layer_background,

                    opacity : ms_data.layer_opacity,

                    position : ms_data.popup_position

                });   // give user metabox for custom id

            }, ms_data.time)

        );

        /* popup close */

        $(".custom-close").click(function() {

            $.lightlayer.exit();

        });



        /* initialize countdown timer */



        $(document).ready(
            setTimeout(
                function() {

                    // countdown js

                    var cd = new Countdown({
                        cont: document.querySelector('.ms-clock'),
                        endDate: {
                            year: ms_data.expire_year,
                            month: ms_data.expire_month,
                            day: ms_data.expire_days,
                            hour: ms_data.expire_hours,
                            minute: ms_data.expire_min,
                            second: ms_data.expire_sec,
                        },
                        outputTranslation: {
                            year: 'Years',
                            week: 'Weeks',
                            day: 'Days',
                            hour: 'Hours',
                            minute: 'Minutes',
                            second: 'Seconds',
                        },
                        endCallback: null,
                        outputFormat: 'day|hour|minute|second',
                    });
                    cd.start();
                }, ms_data.time
            )
        );

        $(document).ready(function(){

            // MS Slider

            /* Start poping up the slider */

            setTimeout(function() {
                $( ".ms-popup-slider" ).css({
                    "display" : "block",
                });
            }, 0 );

            // close the popup slider

            $(".ms-popup-slider-close").click(function() {
                $(".ms-popup-slider-container").css({
                    "display" : "none"
                });
            });

            /* End popping up the slider */

            function initMSSlider() {
                $(".owl-carousel").owlCarousel({
                    autoplay: ms_slider_data.ms_slider_autoplay,
                    autoplayTimeout: ms_slider_data.ms_slider_autoplay_interval,
                    autoplayHoverPause: ms_slider_data.ms_slider_stop_hover,
                    loop: ms_slider_data.ms_slider_slides_loop,
                    //margin: ms_slider_data.ms_slider_slides_margin,
                    mouseDrag: ms_slider_data.ms_slider_mouse_drag,
                    touchDrag: ms_slider_data.ms_slider_touch_drag,
                    slideBy: ms_slider_data.ms_slider_slide_by,
                    responsiveClass:true,
                    navText: ["<i class='ms-fas ms-fa-arrow-left'></i>", "<i class='ms-fas ms-fa-arrow-right'></i>"],
                    nav: ms_slider_data.ms_slider_nav_button_laptop,
                    dots: ms_slider_data.ms_slider_nav_dots_laptop,
                    responsive:{
                        0:{
                            items:ms_slider_data.ms_slider_slides_per_view_in_mobile,
                            nav:ms_slider_data.ms_slider_nav_button_mbl,
                            dots: ms_slider_data.ms_slider_nav_dots_mbl,
                            loop: true
                        },
                        400:{
                            items:ms_slider_data.ms_slider_slides_per_view_in_tab,
                            nav:ms_slider_data.ms_slider_nav_button_tab,
                            dots: ms_slider_data.ms_slider_nav_dots_tab,
                            loop: true
                        },
                        768:{
                            items: ms_slider_data.ms_slider_slides_per_view_ipad,
                            nav: ms_slider_data.ms_slider_nav_button_ipad,
                            loop:true,
                            dots: ms_slider_data.ms_slider_nav_dots_ipad,
                        },
                        1024:{
                            items: ms_slider_data.ms_slider_slides_per_view_in_pc,
                            nav: ms_slider_data.ms_slider_nav_button_laptop,
                            dots: ms_slider_data.ms_slider_nav_dots_laptop,
                            loop:true,
                        }
                    }
                });
            }

            // initialize the functions for the popup slider

            setTimeout(function() {
                initMSSlider();
            }, 0 );
        })

        /* MS Notifications */

        /* pop notifications up after specified time */

        if( ms_data.note_delay_type == 0 ) {
            setTimeout(function() {
                $(".ms-notification").each(function( index ) {
                    $("#" + ms_data.note_custom_id ).css({
                        "display" : "block",
                    });
                });
            }, ms_data.note_delay_type );
        } 

        if( ms_data.note_delay_type == 'after_seconds' ) {
            setTimeout(function() {
                $(".ms-notification").each(function( index ) {
                    $("#" + ms_data.note_custom_id ).css({
                        "display" : "block",
                    });
                });
            }, ms_data.note_delay_milli_sec );
        } 

        if( ms_data.note_delay_type == 'after_scroll' ) {

            /* on scroll */

            $(window).on('scroll', function() {
                $st = $(this).scrollTop();
                $wh = $(document).height() - $(window).height();
                /*
                    st/wh = X/100
                    x/100 = st/wh
                    x = (st*100)wh
                */

                $percent = ($st*100)/$wh;
                if( $percent >= ms_data.note_delay_scroll ) {
                    $(".ms-notification").each(function( index ) {
                        $("#" + ms_data.note_custom_id ).css({
                            "display" : "block",
                        });
                    });
                    //console.log( "The percentage of scroll is: " + $percent );
                } 

            });
        }

        /* hide after clicking close button */

        $(".ms_close_box").each(function( i ) {
            $(".ms-notification").each(function( j ) {
                $(this).click(function() {
                    $(this).css({
                        "display" : "none"
                    });
                });
            });
        });

        /*********************************************
                    Feedback TOOL
        **********************************************/

        /**
         * @name Multi-step form - WIP
         * @description Prototype for basic multi-step form
         * @deps jQuery, jQuery Validate
         */

        var app = {
            init: function(){
                this.cacheDOM();
                this.setupAria();
                this.nextButton();
                this.prevButton();
                this.validateForm();
                this.startOver();
                this.editForm();
                this.killEnterKey();
                this.handleStepClicks();
            },
            cacheDOM: function(){
                if($(".multi-step-form").size() === 0){ return; }
                this.$formParent = $(".multi-step-form");
                this.$form = this.$formParent.find("form");
                this.$formStepParents = this.$form.find("fieldset"),
                this.$nextButton = this.$form.find(".ms-btn-next");
                this.$prevButton = this.$form.find(".ms-btn-prev");
                this.$editButton = this.$form.find(".ms-btn-edit");
                this.$resetButton = this.$form.find("[type='reset']");
                this.$stepsParent = $(".steps");
                this.$steps = this.$stepsParent.find("button");
            },

            htmlClasses: {
                activeClass: "active",
                hiddenClass: "hidden",
                visibleClass: "visible",
                editFormClass: "edit-form",
                animatedVisibleClass: "animated fadeIn",
                animatedHiddenClass: "animated fadeOut",
                animatingClass: "animating"
            },

            setupAria: function(){

                // set first parent to visible

                this.$formStepParents.eq(0).attr("aria-hidden",false);

                // set all other parents to hidden

                this.$formStepParents.not(":first").attr("aria-hidden",true);

                // handle aria-expanded on next/prev buttons

                app.handleAriaExpanded();

            },

            nextButton: function(){

                this.$nextButton.on("click", function(e){
                    e.preventDefault();

                    // grab current step and next step parent

                    var $this = $(this),
                            currentParent = $this.closest("fieldset"),
                            nextParent = currentParent.next();

                            // if the form is valid hide current step

                            // trigger next step

                            if(app.checkForValidForm()){
                                currentParent.removeClass(app.htmlClasses.visibleClass);
                                app.showNextStep(currentParent, nextParent);
                            }
                });
            },

            prevButton: function(){

                this.$prevButton.on("click", function(e){

                    e.preventDefault();

                    // grab current step parent and previous parent

                    var $this = $(this),

                            currentParent = $(this).closest("fieldset"),

                            prevParent = currentParent.prev();

                            // hide current step and show previous step

                            // no need to validate form here

                            currentParent.removeClass(app.htmlClasses.visibleClass);

                            app.showPrevStep(currentParent, prevParent);

                });
            },
            showNextStep: function(currentParent,nextParent){

                // hide previous parent

                currentParent

                    .addClass(app.htmlClasses.hiddenClass)

                    .attr("aria-hidden",true);



                // show next parent

                nextParent

                    .removeClass(app.htmlClasses.hiddenClass)

                    .addClass(app.htmlClasses.visibleClass)

                    .attr("aria-hidden",false);



                // focus first input on next parent

                nextParent.focus();



                // activate appropriate step

                app.handleState(nextParent.index());



                // handle aria-expanded on next/prev buttons

                app.handleAriaExpanded();
            },
            showPrevStep: function(currentParent,prevParent){

                // hide previous parent

                currentParent

                    .addClass(app.htmlClasses.hiddenClass)

                    .attr("aria-hidden",true);

                // show next parent

                prevParent

                    .removeClass(app.htmlClasses.hiddenClass)

                    .addClass(app.htmlClasses.visibleClass)

                    .attr("aria-hidden",false);



                // send focus to first input on next parent

                prevParent.focus();

                // activate appropriate step

                app.handleState(prevParent.index());

                // handle aria-expanded on next/prev buttons

                app.handleAriaExpanded();

            },

            handleAriaExpanded: function(){

                /*

                    Loop thru each next/prev button

                    Check to see if the parent it conrols is visible

                    Handle aria-expanded on buttons

                */

                $.each(this.$nextButton, function(idx,item){

                    var controls = $(item).attr("aria-controls");

                    if($("#"+controls).attr("aria-hidden") == "true"){

                        $(item).attr("aria-expanded",false);

                    }else{

                        $(item).attr("aria-expanded",true);

                    }

                });

                $.each(this.$prevButton, function(idx,item){

                    var controls = $(item).attr("aria-controls");

                    if($("#"+controls).attr("aria-hidden") == "true"){

                        $(item).attr("aria-expanded",false);

                    }else{

                        $(item).attr("aria-expanded",true);

                    }

                });

            },

            validateForm: function(){

                // jquery validate form validation

                this.$form.validate({

                    ignore: ":hidden", // any children of hidden desc are ignored

                    errorElement: "span", // wrap error elements in span not label

                    invalidHandler: function(event, validator){ // add aria-invalid to el with error

                        $.each(validator.errorList, function(idx,item){

                            if(idx === 0){

                                $(item.element).focus(); // send focus to first el with error

                            }

                            $(item.element).attr("aria-invalid",true); // add invalid aria

                        })

                    },

                    //submitHandler: function(form) {

                       // $(".ms-feedback-tool.multi-step-form form").empty();

                       // $(".ms-feedback-tool.multi-step-form form").text("Thank you for giving feedback");

                   // }

                });

            },

            checkForValidForm: function(){
                if(this.$form.valid()){
                    return true;
                }
            },
            startOver: function(){

                var $parents = this.$formStepParents,
                        $firstParent = this.$formStepParents.eq(0),
                        $formParent = this.$formParent,
                        $stepsParent = this.$stepsParent;

                        this.$resetButton.on("click", function(e){

                            // hide all parents - show first

                            $parents

                                .removeClass(app.htmlClasses.visibleClass)

                                .addClass(app.htmlClasses.hiddenClass)

                                .eq(0).removeClass(app.htmlClasses.hiddenClass)

                                .eq(0).addClass(app.htmlClasses.visibleClass);

                                // remove edit state if present

                                $formParent.removeClass(app.htmlClasses.editFormClass);

                                // manage state - set to first item

                                app.handleState(0);

                                // reset stage for initial aria state

                                app.setupAria();

                                // send focus to first item

                                setTimeout(function(){

                                    $firstParent.focus();

                                },200);

                        }); // click

            },

            handleState: function(step){

                this.$steps.eq(step).prevAll().removeAttr("disabled");
                this.$steps.eq(step).addClass(app.htmlClasses.activeClass);

                // restart scenario

                if(step === 0){

                    this.$steps

                        .removeClass(app.htmlClasses.activeClass)

                        .attr("disabled","disabled");

                    this.$steps.eq(0).addClass(app.htmlClasses.activeClass)

                }

            },

            editForm: function(){

                var $formParent = this.$formParent,

                        $formStepParents = this.$formStepParents,

                        $stepsParent = this.$stepsParent;

                        this.$editButton.on("click",function(){

                            $formParent.toggleClass(app.htmlClasses.editFormClass);

                            $formStepParents.attr("aria-hidden",false);

                            $formStepParents.eq(0).find("input").eq(0).focus();

                            app.handleAriaExpanded();

                        });

            },

            killEnterKey: function(){

                $(document).on("keypress", ":input:not(textarea,button)", function(event) {

                    return event.keyCode != 13;

                });

            },

            handleStepClicks: function(){

                var $stepTriggers = this.$steps,

                        $stepParents = this.$formStepParents;

                        $stepTriggers.on("click", function(e){

                            e.preventDefault();

                            var btnClickedIndex = $(this).index();

                                // kill active state for items after step trigger

                                $stepTriggers.nextAll()

                                    .removeClass(app.htmlClasses.activeClass)

                                    .attr("disabled",true);



                                // activate button clicked

                                $(this)

                                    .addClass(app.htmlClasses.activeClass)

                                    .attr("disabled",false)



                                // hide all step parents

                                $stepParents

                                    .removeClass(app.htmlClasses.visibleClass)

                                    .addClass(app.htmlClasses.hiddenClass)

                                    .attr("aria-hidden",true);

                                // show step that matches index of button

                                $stepParents.eq(btnClickedIndex)

                                    .removeClass(app.htmlClasses.hiddenClass)

                                    .addClass(app.htmlClasses.visibleClass)

                                    .attr("aria-hidden",false)

                                    .focus();

                        });
            }
        };
        app.init();

        /*

            By Osvaldas Valutis, www.osvaldas.info

            Available for use under the MIT License

        */

        'use strict';

        ;( function ( document, window, index )

        {

            var inputs = document.querySelectorAll( '.inputfile' );

            Array.prototype.forEach.call( inputs, function( input )

            {

                var label    = input.nextElementSibling,
                    labelVal = label.innerHTML;
                input.addEventListener( 'change', function( e )
                {
                    var fileName = '';

                    if( this.files && this.files.length > 1 )

                        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );

                    else

                        fileName = e.target.value.split( '\\' ).pop();

                    if( fileName )

                        label.querySelector( 'span' ).innerHTML = fileName;

                    else

                        label.innerHTML = labelVal;

                });

                // Firefox bug fix

                input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
                input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });

            });

        }( document, window, 0 ));

        $('input:radio[name="radio-group"]').change(function(){

            if($(this).is(":checked")) {

                $(".ms-step-one-all").css({

                    "display" : "block"

                });

            }

            var iz_checked = true;

            $('input:radio[name="radio-group"]').each(function(){

               iz_checked = iz_checked && $(this).is(':checked');

               if ( ! iz_checked ) {

                    $(this).addClass("not-selected-radio");

                }

            });

        });

        /* feedback tool open and close */

        $(".ms-feedback-tool-close").click(function() {
            $(".ms-feedback-tool").css({
                "display" : "none"
            });
        })

        $(".ms-feedback-tool-init").click(function() {
            $(".ms-feedback-tool").css({
                "display" : "block"
            });
        })

        $("input[name='radio-group']").change(function () {
            $(".ms-feedback-footer .ms-arrow-next").prop("disabled", false);
        });
        
    }

})(jQuery);