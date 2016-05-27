$(window).scroll(function()
{

        if (window.scrollY > 160)
	{
		$(".navigation").addClass("navigation-fixed").css('top',-160);
	} else
{
 $(".navigation").removeClass("navigation-fixed").css('top',0);
}
;})