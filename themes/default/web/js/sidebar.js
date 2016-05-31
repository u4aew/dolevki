$(document).ready(function () {
		if($(window).width() < '1280') {
			$(".description-building").css('top',-150);
		}
		else {
		}
	}
)
$(window).scroll(function () {

	if (window.scrollY > 145) {
		$(".navigation").addClass("navigation-fixed").css('top', -145);
	} else {
		$(".navigation").removeClass("navigation-fixed").css('top', 0);
	}
	;
})

