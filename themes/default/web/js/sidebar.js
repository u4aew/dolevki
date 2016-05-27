$(window).scroll(function()
{

        if (window.scrollY > 215)
	{
		$(".navigation").addClass("navigation-fixed").css('top',-215);
	} else
{
 $(".navigation").removeClass("navigation-fixed").css('top',0);
}
;})