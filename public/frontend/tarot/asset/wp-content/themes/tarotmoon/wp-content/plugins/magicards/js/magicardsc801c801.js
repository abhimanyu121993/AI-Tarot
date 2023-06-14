/*
 * MagiCards - WordPress Plugin
 * version: 1.5
 * Main js plugin
 *  
 * Copyright 2017-2018 Nicola Franchini - @nicolafranchini
 */

 /* global jQuery */
 /* global imagesLoaded */
if (!jQuery.fn.magicardsIsotope && jQuery.fn.isotope) {
    jQuery.fn.magicardsIsotope = jQuery.fn.isotope;
}
(function($){
    'use strict';
    $.fn.extend({
        // plugin name - magicardJs
        magicardJs: function(options) {
            // default options
            // var defaults = {
            // };
            // var option = $.extend(defaults, options);
            return this.each(function() {

                var obj = $(this);

                // Prevent double initialization
                if (obj.data('magicards')) {
                    return true;
                }
                var stack_id = obj.attr('id');
                var deck = obj.find('.magicard-wrap');

                var flipper = obj.find('.magicard-flipper');

                var shuffler = obj.parent('.magicards-deck-wrap').find('.magicard-shuffle');
                var toggler = obj.parent('.magicards-deck-wrap').find('.magicard-toggle');

                var urlList = $.map(window[stack_id], function(value, index) {
                    return [value];
                });

                var $grid = obj.magicardsIsotope({
                    itemSelector: '.magicard-wrap',
                    percentPosition: true,
                    // stagger: 30,
                    layoutMode: 'packery',
                    hiddenStyle: {
                        opacity: 0,
                        transform: 'translate(0px, -20px)',
                    },
                    visibleStyle: {
                        opacity: 1,
                        transform: 'translate(0px, 0px)',
                    }
                });

                obj.data('magicards', true);

                $grid.imagesLoaded( function() {
                    fadeInItems();
                    flipper.addClass('magicard-clicker');
                });

                // Toggle cards
                toggler.on('click', function(e){
                    if ($(deck).hasClass('magicard-hover')) {
                        $(deck).removeClass('magicard-toggle-open').removeClass('magicard-hover');
                    } else {
                        $(deck).addClass('magicard-hover');
                    }
                });

                // Call Shuffle deck
                shuffler.on('click', function(e){
                    shuffleItems();
                });

                // Convert \n to br
                function nl2br (str) {   
                    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '<br>');
                }

                // Shuffle deck
                function shuffleItems(){

                    flipper.removeClass('magicard-clicker');
                    urlList = shuffle(urlList);

                    // Check if any card is flipped
                    var ritardo = 0;
                    var girati = obj.find('.magicard-hover').length;
                    if (girati > 0) {
                        ritardo = 200;
                    }
                    // Flip back all cards.
                    $(deck).removeClass('magicard-hover');
                    $(deck).removeClass('magicard-toggle-open');

                    setTimeout(function() {
                        // Reset random upside down.
                        $(flipper).removeClass('magicard-reversed');

                        // Set new cards.
                        $.each(flipper, function(i, item) {
                            // Update images
                            var image = $(item).find('.magicard-back img');

                            var infopanel = $(item).find('.magicard-tooltip');

                            if(urlList[i].caption || urlList[i].description) {
                                infopanel.removeClass('magicards-hide-info'); 
                            } else {
                                infopanel.addClass('magicards-hide-info');
                            }

                            var newImgUrl = window.decodeURIComponent(urlList[i].url);
                            image.attr('src', newImgUrl);

                            var attr_srcset = $(this).attr('srcset');
                            var attr_srcorig = $(this).attr('src-orig');

                            if ( attr_srcset !== 'undefined' && attr_srcset !== false) {
                                image.attr('srcset', newImgUrl);
                            }

                            if ( attr_srcorig !== 'undefined' && attr_srcorig !== false) {
                                image.attr('src-orig', newImgUrl);
                            }

                            infopanel.find('.magicard-caption').html(window.decodeURIComponent(urlList[i].caption));
                            infopanel.find('.magicard-description').html(window.decodeURIComponent(urlList[i].description));
                            infopanel.find('.magicard-description-reversed').html(window.decodeURIComponent(urlList[i].reversed_description));
                            
                            image.load(function(){
                                // Flip card
                                $(item).addClass('magicard-clicker');
                            });

                            // Reset upside down panel show
                            infopanel.find('.magicard-description-reversed').addClass('magicards-hide-info');
                            infopanel.find('.magicard-description').removeClass('magicards-hide-info');

                            // Random upside down cards.
                            if (obj.hasClass('magicards-updown')) {
                                var random_reversed = Math.random() >= 0.5;
                                if (random_reversed) {
                                    $(item).addClass('magicard-reversed');

                                    if (urlList[i].reversed_description) {
                                        infopanel.find('.magicard-description-reversed').removeClass('magicards-hide-info');
                                        infopanel.find('.magicard-description').addClass('magicards-hide-info');
                                    }
                                }
                            }
                        });
                        fadeOutItems();
                    }, ritardo);
                }

                /**
                * Toggle info panel
                */
                obj.on('click', '.magicard-hover .magicard-flipper', function(){
                    if (!$(this).find('.magicard-tooltip.magicards-hide-info').length) {
                        $(this).parent('.magicard-hover').toggleClass('magicard-toggle-open');
                    }
                });

                /**
                * Flip card
                */
                obj.on('click', '.magicard-clicker', function(){
                    if ($(this).find('.magicard-tooltip.magicards-hide-info').length > 0) {
                        $(this).parent('.magicard-wrap').toggleClass('magicard-hover');
                    } else {
                        $(this).parent('.magicard-wrap').addClass('magicard-hover');
                    }
                });

                /**
                * Retire cards
                */
                function fadeOutItems() {
                    deck.addClass('hidecard');
                    setTimeout(function() {
                        fadeInItems();
                    }, 300);
                }

                /**
                * Distribute cards
                */
                function fadeInItems() {
                    // console.log(deck);
                    $grid.magicardsIsotope('layout');

                    var a = $.Deferred(function(d){
                        d.resolve();
                    });
                    deck.each(function(i, item){
                        var $li = $(this);
                        a = a.then(function() {
                            return $.Deferred(function(defer) {
                                setTimeout(function() {
                                    $li.removeClass('hidecard');
                                    defer.resolve();
                                }, 1 * 80); 
                            });
                        });
                    });                
                    a.done(function(){
                        // Cards ready
                    });
                }
            }); // each

            /*
            * Shuffle array
            */
            function shuffle(array) {
              var currentIndex = array.length, temporaryValue, randomIndex;

              // While there remain elements to shuffle...
              while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
              }
              return array;
            }

        } // magicardJs
    }); // extend

    $('.magicards-deck').magicardJs();

})(jQuery);
