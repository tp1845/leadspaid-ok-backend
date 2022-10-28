/*
 *  jquery-input-lettering - v0.0.1
 *  Light-weight jquery input lettering plugin
 *  https://github.com/sergmaestro/jquery-input-lettering
 *
 *  Made by Sergei Kuznetsov
 *  Under MIT License
 */
( function($) {

    "use strict";

    $.fn.letteringInput = function( options ) {
        var settings,
            defaults = {
                inputClass: "letter",
                hiddenInputName: "",
                hiddenInputWrapperID: "",
                forbiddenKeyCodes: [ 9, 16, 17, 18, 20, 27, 32, 33, 34, 38, 40, 45, 144 ],
                onFocusLetter: function() {},
                onBlurLetter: function() {},
                onLetterKeyup: function() {},
                onSet: function() {}
            };

        if ( typeof options === "object" ) {
            settings = $.extend( {}, defaults, options );
        } else {
            settings = defaults;
        }

        var methods = {
            destroy: function( $el ) {
                $( "input." + settings.inputClass, $el ).unbind();
            }
        };

        $.fn.getCursorPosition = function() {
            var input = this.get( 0 );
            if ( !input ) {
                return; // No (input) element found
            }
            if ( "selectionStart" in input ) {
                return input.selectionStart;
            } else if ( document.selection ) {

                // IE
                input.focus();
                var sel = document.selection.createRange();
                var selLen = document.selection.createRange().text.length;
                sel.moveStart( "character", -input.value.length );
                return sel.text.length - selLen;
            }
        };

        $.fn.setCaretPosition = function( caretPos ) {
            var input = this.get( 0 );

            if ( input != null ) {
                if ( input.createTextRange ) {
                    var range = input.createTextRange();
                    range.move( "character", caretPos );
                    range.select();
                } else {
                    if ( input.selectionStart ) {
                        input.focus();
                        input.setSelectionRange( caretPos, caretPos );
                    } else {
                        input.focus();
                    }
                }
            }
        };

        function init( $letter ) {
            var $allLetters = $( "input." + settings.inputClass, $letter );

            $allLetters.on( "keydown", function( event ) {
                var $el = $( this );
                var val = $.trim( $el.val() );
                var caretPosition = $el.getCursorPosition();

                $el.val( val ); // trim and update

                if ( event.keyCode === 37 ) { // Back arrow
                    if ( !caretPosition ) {
                        focusOnPrevious( $el, $allLetters );
                    }
                } else if ( event.keyCode === 39 ) { // Next arrow
                    if ( caretPosition ) {
                        focusOnNext( $el, $allLetters );
                    }
                } else if ( event.keyCode === 8 ) { // Backspace
                    $el = caretPosition ? $el : previousElement( $el, $allLetters );
                    if ( $el ) {
                        focusOnElement( $el );
                    }

                    setValue( $allLetters );
                    if ( caretPosition && $el.val() !== "" ) {
                        setTimeout( function() {
                            focusOnPrevious( $el, $allLetters );
                        }, 20 );
                    }
                } else if ( event.keyCode === 46 ) { // del
                    var next = nextElement( $el, $allLetters );
                    if ( caretPosition && next ) {
                        $( next ).val( "" );
                    }

                    setValue( $allLetters );

                    var updatedNext = nextElement( $el, $allLetters );
                    if ( updatedNext && $( updatedNext ).val() !== "" ) {
                        setTimeout( function() {
                            $el.setCaretPosition( 0 );  // Set caret position
                        }, 20 );
                    }
                } else if ( $.inArray( event.keyCode, settings.forbiddenKeyCodes ) === -1 ) {
                    var keyValue = event.key;
                    var currentCode = event.which || event.code;
                    if ( keyValue === "Unidentified" ) {
                        keyValue = String.fromCharCode( currentCode );
                    }
                    insertNewDigit( $el, caretPosition, keyValue, $allLetters );
                }

                if ( typeof defaults.onSet === "function" ) {
                    setTimeout( function() {
                        settings.onSet.call( null, $( this ), event );
                    }, 40 );
                }
            } ).on( "keyup", function( event ) {
                /**
                 * On keyup user defined function
                 */
                if ( typeof defaults.onLetterKeyup === "function" ) {
                    setTimeout( function() {
                        settings.onLetterKeyup.call( null, $( this ), event );
                    }, 1 );
                }
            } ).on( "focus", function( event ) {
                var $el = $( this );
                var currentIndex = $allLetters.index( $el );

                if ( $el.val() ) {

                    // If current input has value => do nothing
                    return false;
                } else {

                    // Get previous letters with empty value
                    var $previousEmptyLetters = $allLetters.filter( function( index ) {
                        return !this.value && index < currentIndex;
                    } );

                    if ( typeof $previousEmptyLetters[ 0 ] !== "undefined" ) {
                        focusOnElement( $previousEmptyLetters[ 0 ] );
                    }
                }

                /**
                 * On focus user defined function
                 */
                if ( typeof defaults.onFocusLetter === "function" ) {
                    settings.onFocusLetter.call( null, $( this ), event );
                }
            } ).on( "blur", function( event ) {
                /**
                 * On blur user defined function
                 */
                setTimeout( function() {
                    var value = getValue( $allLetters );
                    if ( typeof defaults.onBlurLetter === "function" ) {
                        settings.onBlurLetter.call( null, $( this ), event, value );
                    }
                }, 40 );
            } );
        }

        function setValue( $allLetters, value ) {
            setTimeout( function() {
                var newValue = typeof value !== "undefined" ? value : getValue( $allLetters );

                if ( settings.hiddenInputName && settings.hiddenInputWrapperID ) {

                    // update hidden input
                    $(
                        "input[name=\"" + settings.hiddenInputName + "\"]",
                        "#" + settings.hiddenInputWrapperID )
                        .val( newValue );
                }

                $allLetters.map( function() {
                    this.value = typeof newValue[ 0 ] !== "undefined" ? newValue[ 0 ] : "";
                    newValue = newValue.substr( 1 );
                } );
            }, 30 );
        }

        function focusOnPrevious( $el, $allLetters ) {
            var $prevEl = previousElement( $el, $allLetters );

            if ( !$prevEl ) {
                return false;
            }

            focusOnElement( $prevEl );
        }

        function focusOnNext( $el, $allLetters ) {
            var $nextEl = nextElement( $el, $allLetters );

            if ( !$nextEl ) {
                return false;
            }

            focusOnElement( $nextEl );
        }

        function nextElement( $el, $allLetters ) {
            var currentIndex = $allLetters.index( $el );
            var $nextElem = null;

            if ( currentIndex !== -1 && $allLetters.length - 1 > currentIndex ) {
                var next = $allLetters[ currentIndex + 1 ];

                // If the next input is hidden (e.g. style="display:none") return null
                $nextElem = $( next ).is( ":hidden" ) ? null : next;
            }

            return $nextElem;
        }

        function previousElement( $el, $allLetters ) {
            var currentIndex = $allLetters.index( $el );
            return currentIndex > 0 ? $( $allLetters[ currentIndex - 1 ] ) : null;
        }

        function focusOnElement( $el ) {
            $el.click();
            setTimeout( function() {
                $el.focus();
            }, 1 ); // Safari focus bug fix
        }

        function getValue( $allLetters ) {
            return $allLetters.map( function() {
                return this.value;
            } ).get().join( "" );
        }

        function insertNewDigit( $el, caretPosition, newValue, $inputs ) {
            var index = $inputs.index( $el );
            var value = getValue( $inputs );

            var lettersArray = $inputs.filter( function() {
                return !$( this ).is( ":hidden" ) && !this.value;
            } );

            // No more empty letters
            if ( !lettersArray.length ) {
                setValue( $inputs );
                return false;
            }

            // if new value exists and > than 1 letter/digit => do nothing
            if ( typeof newValue !== "undefined" && newValue.length > 1 ) {
                return false;
            }

            if ( index !== -1 ) {
                index = !caretPosition ? index : index + 1;
            }

            if ( value.length < $inputs.length ) {
                if ( $el.val() !== "" ) { // current input has previous value
                    value = [ value.slice( 0, index ), newValue, value.slice( index ) ].join( "" );
                    setValue( $inputs, value );

                    var next = nextElement( $el, $inputs );
                    if ( next ) {
                        setTimeout( function() {
                            focusOnNext( $el, $inputs );
                        }, 1 );
                    }
                } else {
                    setTimeout( function() {
                        focusOnNext( $el, $inputs );
                    }, 1 );
                    setValue( $inputs );
                }
            }
        }

        /**
         * letteringInput methods processing
         */
        if ( typeof options === "string" ) {
            if ( options && methods[ options ] ) {
                return methods[ options ].call( null, $( this ) );
            }
            $.error( "Method " + options + " does not exist in jQuery.letteringInput" );
            return this;
        }

        /**
         * Initialize letteringInput events
         */
        return this.each( function() {
            init( $( this ) );
        } );
    };

} )(jQuery);
