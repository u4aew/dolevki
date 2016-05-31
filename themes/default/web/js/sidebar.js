$(window).scroll(function()
{
    var changeMenuStyleConst = 928 - window.innerHeight;
    if (window.scrollY > changeMenuStyleConst)
    {
        $(".navigation").addClass("navigation-fixed").css('top',-changeMenuStyleConst);
    } else
    {
        $(".navigation").removeClass("navigation-fixed").css('top',0);
    }
    ;
})