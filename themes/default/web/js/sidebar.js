$(window).scroll(function()
{

        if (window.scrollY > 145)
	{
		$(".navigation").addClass("navigation-fixed").css('top',-145);
	} else
{
 $(".navigation").removeClass("navigation-fixed").css('top',0);
}
;})