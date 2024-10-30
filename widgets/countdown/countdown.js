(function($){

	var maeCountDown = function($scope, $) {
		$scope.find('.mae-countdown').each(function () {
			var element = $(this);
			var countDownDate = element.data('time');
			var countDownSync = element.data('sync');
			
			function countdown(){
				var now = new Date().getTime() + (new Date().getTimezoneOffset() + countDownSync*60)*60000;
				var distance = new Date(countDownDate).getTime() - now;	

				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				var daylen = days.toString().length;
				var hourlen =hours.toString().length;
				var minlen = minutes.toString().length;
				var seclen = seconds.toString().length;

				// if two digits are single digits
				if (daylen < 2 ) {
					days = "0" + days;	
				}
				if( hourlen < 2) {
					hours = "0" + hours;
				}
				if( minlen < 2) {
					minutes = "0" + minutes;
				}
				if( seclen < 2) {
					seconds = "0" + seconds;
				}
				if (distance < 0) { // if timestamp is less than 0
					clearInterval(x);
					if(element.next('.mae-expire').attr('data-expire') == 'yes'){
						element.hide();
						element.closest('.mae-countdown-wrapper').find('.mae-expire').show();
					}
				} else {
					element.show();
					element.find('.mae-day .mae-countdown-num').text(days);
					element.find('.mae-hour .mae-countdown-num').text(hours);
					element.find('.mae-minute .mae-countdown-num').text(minutes);
					element.find('.mae-second .mae-countdown-num').text(seconds);


					// match text to plural or singular
					var pluralDay = (days != 1) ? 's': '';
					var pluralHour = (hours != 1) ? 's': '';
					var pluralMin = (minutes != 1) ? 's': '';
					var pluralSec = (seconds != 1) ? 's': '';

					element.find('.mae-day+.mae-countdown-txt').text(element.parent().attr('data-day'+pluralDay));
					element.find('.mae-hour+.mae-countdown-txt').text(element.parent().attr('data-hour'+pluralHour));
					element.find('.mae-minute+.mae-countdown-txt').text(element.parent().attr('data-minute'+pluralMin));
					element.find('.mae-second+.mae-countdown-txt').text(element.parent().attr('data-second'+pluralSec));
				}
			}

			countdown();

			var x = setInterval(function() {
				countdown();
			}, 1000);
		});
	}
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/massive_countdown.default', maeCountDown);
	});
}(jQuery));