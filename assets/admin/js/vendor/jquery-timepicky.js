(function ($) {
  'use strict';

  Number.prototype.leftPad = function (len, pad) {
      pad = typeof pad === 'undefined' ? '0' : pad + '';
      var str = this + '';
      while (str.length < len) {
          str = pad + str;
      }
      return str;
  };

  $.fn.timePicky = function (options) {
      var settings = $.extend({
          formatOutput: function (hours, minutes, meridian) {
              if (settings.showMeridian) {
                  hours = Math.min(Math.max(parseInt(hours), 1), 12);
              } else {
                  hours = Math.min(Math.max(parseInt(hours), 0), 23);
              }
              minutes = Math.min(Math.max(parseInt(minutes), 0), 59);

              hours = hours.leftPad(2);
              minutes = minutes.leftPad(2);

              return hours + ':' + minutes + (settings.showMeridian ? ' ' + meridian : '');
          },
          className: '',
          hours: {
              min: 1,
              max: 12,
              step: 1
          },
          minutes: {
              step: 1,
              oveflow: false
          },
          showMeridian: true,
          disableKeyboard: false,
          showResetButton: false
      }, options);

      return this.each(function () {
          var $element = $(this),
              elementHeight = $element.outerHeight() + 10,
              topArrowButton = '<div class="prev action-next"></div>',
              bottomArrowButton = '<div class="next action-prev"></div>';

          $element.wrap('<div class="timepicki time_pick">');
          var $parent = $element.parents('.time_pick');

          var $newElement = $(
              '<div class="timepicker_wrap ' + settings.className + '">' +
              '<div class="arrow_top"></div>' +
              '<div class="time">' +
              topArrowButton +
              '<div class="ti_tx"><input type="text" class="timepicki-input"' + (settings.disableKeyboard ? 'readonly' : '') + '></div>' +
              bottomArrowButton +
              '</div>' +
              '<div class="mins">' +
              topArrowButton +
              '<div class="mi_tx"><input type="text" class="timepicki-input"' + (settings.disableKeyboard ? 'readonly' : '') + '></div>' +
              bottomArrowButton +
              '</div>'
          );

          if (settings.showMeridian) {
              $newElement.append(
                  '<div class="meridian">' +
                  topArrowButton +
                  '<div class="mer_tx"><input type="text" class="timepicki-input" readonly></div>' +
                  bottomArrowButton +
                  '</div>'
              );
          }
          if (settings.showResetButton) {
              $newElement.append('<div><a href="#" class="reset_time">Reset</a></div>');
          }
          $parent.append($newElement);

          var $elementWrapper = $element.next('.timepicker_wrap'),
              $inputs = $parent.find('input');

          $('.reset_time').on('click', function () {
              $element.val('');
              closeTimepicky();
          });

          //-----------------------------------------------------------------------------------
          //  NOTE:.change() event does not work here, as it is called when input looses focus
          //-----------------------------------------------------------------------------------
          $('.timepicki-input').on('keydown', function (event) {
              // enter - prevent form submission and close popup
              if (event.keyCode === 13) {
                  event.preventDefault();

                  closeTimepicky();

                  return;
              }

              // the grand father div specifies the type of input that we are dealing with (time/mins/meridian)
              var $input = $(this),
                  lastValue = $input.val(),
                  $grandfatherDiv = $input.parent().parent();

              // validate input values
              function validate() {
                  var isValidNumber = /^\d+$/.test(lastValue),
                      isEmpty = lastValue === '';

                  // hours
                  if ($grandfatherDiv.hasClass('time')) {
                      if (isValidNumber) {
                          var hours = (settings.showMeridian) ?
                              Math.min(Math.max(parseInt(lastValue), 1), 12) :
                              Math.min(Math.max(parseInt(lastValue), 0), 23);

                          $input.val(hours);
                      } else if (!isEmpty) {
                          $input.val(lastValue);
                      }
                  } else if ($grandfatherDiv.hasClass('mins')) {
                      if (isValidNumber) {
                          var minutes = Math.min(Math.max(parseInt($input.val()), 0), 59);

                          $input.val(minutes);
                      } else if (!isEmpty) {
                          $input.val(lastValue);
                      }
                  } else if ($grandfatherDiv.hasClass('meridian')) { // MERIDIAN
                      // key presses should not affect meridian
                      event.preventDefault();
                  }
              }

              // wrapValidate() ensures that validate() is called only once
              var done = false;
              function wrapValidate() {
                  if (!done) {
                      validate();

                      done = true;
                  }
              }

              // enqueue wrapValidate function before any thing else takes place
              setTimeout(wrapValidate, 0);
          });

          // open or close time picker when clicking
          $(document).on('click', function (event) {
              if (!$(event.target).is($elementWrapper) && isTimepickyVisible() && !$(event.target).is($('.reset_time'))) {
                  if (!isElementInTimepicky($(event.target))) {
                      closeTimepicky();
                  } else if (!$(event.target).is($element) || ($(event.target).is($element) && !$element.val())) {
                      setValue();
                  }
              }
          });

          // open the modal when the user focuses on the input
          $element.on('focus', openTimepicky);

          // select all text in input when user focuses on it
          $inputs.on('focus', function () {
              var input = $(this);
              if (!input.is($element)) {
                  input.select();
              }
          });

          // allow user to increase and decrease numbers using arrow keys
          $inputs.on('keydown', function (e) {
              var direction, input = $(this);

              // arrow key up
              if (e.which === 38) {
                  direction = 'next';
              } else if (e.which === 40) { // arrow key down
                  direction = 'prev';
              }

              if (input.closest('.timepicker_wrap .time').length) {
                  changeHours(null, direction);
              } else if (input.closest('.timepicker_wrap .mins').length) {
                  changeMinutes(null, direction);
              } else if (input.closest('.timepicker_wrap .meridian').length && settings.showMeridian) {
                  changeMeridian(null, direction);
              }
          });

          // close the modal when the time picker loses keyboard focus
          $inputs.on('blur', function () {
              setTimeout(function () {
                  var $focusedElement = $(document.activeElement);

                  if ($focusedElement.is(':input') && !isElementInTimepicky($focusedElement) && isTimepickyVisible()) {
                      closeTimepicky();
                  }
              }, 0);
          });

          function isElementInTimepicky($jqueryElement) {
              return $.contains($parent[0], $jqueryElement[0]) || $parent.is($jqueryElement);
          }

          function setValue(close) {
              // use input values to set the time
              var hoursInputVal = $elementWrapper.find('.ti_tx input').val(),
                  minutesInputVal = $elementWrapper.find('.mi_tx input').val(),
                  meridianInputVal = '';

              if (settings.showMeridian) {
                  meridianInputVal = $elementWrapper.find('.mer_tx input').val();
              }

              if (hoursInputVal.length !== 0 && minutesInputVal.length !== 0 && (!settings.showMeridian || meridianInputVal.length !== 0)) {
                  // store the value so we can set the initial value
                  // next time the picker is opened
                  $element.attr('data-timepicki-tim', hoursInputVal);
                  $element.attr('data-timepicki-mini', minutesInputVal);

                  if (settings.showMeridian) {
                      $element.attr('data-timepicki-meri', meridianInputVal);
                      // set the formatted value
                      $element.val(settings.formatOutput(hoursInputVal, minutesInputVal, meridianInputVal));
                  } else {
                      $element.val(settings.formatOutput(hoursInputVal, minutesInputVal));
                  }
              }

              $element.trigger('timepicky.changed', [hoursInputVal, minutesInputVal, meridianInputVal]);

              if (close) {
                  closeTimepicky();
              }
          }

          function openTimepicky() {
              if (isTimepickyVisible()) {
                  return false;
              }

              setDate();

              $elementWrapper.css({
                  'top': elementHeight + 'px',
                  'left': '0px'
              });

              $elementWrapper.fadeIn();
              // focus on the first input and select its contents
              var firstInput = $elementWrapper.find('input:visible').first();
              firstInput.focus();
              // if the user presses shift+tab while on the first input,
              // they mean to exit the time picker and go to the previous field
              var first_input_exit_handler = function (e) {
                  if (e.which === 9 && e.shiftKey) {
                      firstInput.off('keydown', first_input_exit_handler);

                      var $allFormElements = $(':input:visible:not(.timepicki-input)'),
                          timepickiInputIndex = $allFormElements.index($element),
                          $previousFormElement = $allFormElements.get(timepickiInputIndex - 1);

                      $previousFormElement.focus();
                  }
              };
              firstInput.on('keydown', first_input_exit_handler);

              $element.trigger('timepicky.shown');
          }

          function closeTimepicky() {
              $elementWrapper.fadeOut();

              $element.trigger('timepicky.hidden');
          }

          function isTimepickyVisible() {
              return $elementWrapper.css('display') === 'block';
          }

          function setDate(startTime) {
              var dateObject, hours, minutes, meridian;

              // if a value was already picked we will remember that value
              if ($element.is('[data-timepicki-tim]')) {
                  hours = Number($element.attr('data-timepicki-tim'));
                  minutes = Number($element.attr('data-timepicki-mini'));
                  if (settings.showMeridian) {
                      meridian = $element.attr('data-timepicki-meri');
                  }
                  // developer can specify a custom starting value
              } else if (typeof startTime === 'object') {
                  hours = Number(startTime[0]);
                  minutes = Number(startTime[1]);
                  if (settings.showMeridian) {
                      meridian = startTime[2];
                  }
                  // default is we will use the current time
              } else {
                  dateObject = new Date();
                  hours = dateObject.getHours();
                  minutes = dateObject.getMinutes();
                  meridian = 'AM';
                  if (settings.showMeridian) {
                      if (hours === 0) { // midnight
                          hours = 12;
                      } else if (hours === 12) { // noon
                          meridian = 'PM';
                      } else if (hours > 12) {
                          hours -= 12;
                          meridian = 'PM';
                      }
                  }
              }

              hours = hours.leftPad(2);
              $elementWrapper.find('.ti_tx input').val(hours);

              minutes = minutes.leftPad(2);
              $elementWrapper.find('.mi_tx input').val(minutes);

              if (settings.showMeridian) {
                  $elementWrapper.find('.mer_tx input').val(meridian);
              }
          }

          function changeHours($currentElement, direction) {
              var currentClass = 'time',
                  currentHoursValue = Number($elementWrapper.find('.' + currentClass + ' .ti_tx input').val()),
                  hoursMin = Number(settings.hours.min),
                  hoursMax = Number(settings.hours.max),
                  stepSize = Number(settings.hours.step);

              if (($currentElement && $currentElement.hasClass('action-next')) || direction === 'next') {
                  if (currentHoursValue + stepSize > hoursMax) {
                      var min_value = hoursMin.leftPad(2);

                      $elementWrapper.find('.' + currentClass + ' .ti_tx input').val(min_value);
                  } else {
                      currentHoursValue = (currentHoursValue + stepSize).leftPad(2);

                      $elementWrapper.find('.' + currentClass + ' .ti_tx input').val(currentHoursValue);
                  }
              } else if (($currentElement && $currentElement.hasClass('action-prev')) || direction === 'prev') {
                  var minValue = Number(settings.hours.min);

                  if (currentHoursValue - stepSize < minValue) {
                      var max_value = hoursMax.leftPad(2);

                      $elementWrapper.find('.' + currentClass + ' .ti_tx input').val(max_value);
                  } else {
                      currentHoursValue = (currentHoursValue - stepSize).leftPad(2);

                      $elementWrapper.find('.' + currentClass + ' .ti_tx input').val(currentHoursValue);
                  }
              }
          }

          function changeMinutes($currentElement, direction) {
              var currentInputClass = 'mins',
                  currentMinutesValue = Number($elementWrapper.find('.' + currentInputClass + ' .mi_tx input').val()),
                  minutesMax = 59,
                  stepSize = Number(settings.minutes.step);

              if (($currentElement && $currentElement.hasClass('action-next')) || direction === 'next') {
                  if (currentMinutesValue + stepSize > minutesMax) {
                      $elementWrapper.find('.' + currentInputClass + ' .mi_tx input').val('00');
                      if (settings.minutes.oveflow) {
                          changeHours(null, 'next');
                      }
                  } else {
                      currentMinutesValue = (currentMinutesValue + stepSize).leftPad(2);

                      $elementWrapper.find('.' + currentInputClass + ' .mi_tx input').val(currentMinutesValue);
                  }
              } else if (($currentElement && $currentElement.hasClass('action-prev')) || direction === 'prev') {
                  if (currentMinutesValue - stepSize <= -1) {
                      $elementWrapper.find('.' + currentInputClass + ' .mi_tx input').val(minutesMax + 1 - stepSize);
                      if (settings.minutes.oveflow) {
                          changeHours(null, 'prev');
                      }
                  } else {
                      currentMinutesValue = (currentMinutesValue - stepSize).leftPad(2);

                      $elementWrapper.find('.' + currentInputClass + ' .mi_tx input').val(currentMinutesValue);
                  }
              }
          }

          function changeMeridian($currentElement, direction) {
              var currentInputClass = 'meridian',
                  currentMeridianValue = $elementWrapper.find('.' + currentInputClass + ' .mer_tx input').val();

              if (($currentElement && $currentElement.hasClass('action-next')) || direction === 'next') {
                  if (currentMeridianValue === 'AM') {
                      $elementWrapper.find('.' + currentInputClass + ' .mer_tx input').val('PM');
                  } else {
                      $elementWrapper.find('.' + currentInputClass + ' .mer_tx input').val('AM');
                  }
              } else if (($currentElement && $currentElement.hasClass('action-prev')) || direction === 'prev') {
                  if (currentMeridianValue === 'AM') {
                      $elementWrapper.find('.' + currentInputClass + ' .mer_tx input').val('PM');
                  } else {
                      $elementWrapper.find('.' + currentInputClass + ' .mer_tx input').val('AM');
                  }
              }
          }

          // handle clicking on the arrow icons
          var $actionArrows = $elementWrapper.find('.action-next, .action-prev');
          $($actionArrows).on('click', function () {
              var $element = $(this);

              if ($element.parent().hasClass('time')) {
                  changeHours($element);
              } else if ($element.parent().hasClass('mins')) {
                  changeMinutes($element);
              } else if (settings.showMeridian) {
                  changeMeridian($element);
              }
          });

      });
  };

}(jQuery));
