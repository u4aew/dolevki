<?php
Yii::import("application.modules.realty.models.*");
Yii::app()->getClientScript()->coreScriptPosition = CClientScript::POS_END;
Yii::app()->getClientScript()->defaultScriptFilePosition = CClientScript::POS_END;

?>
<!DOCTYPE html>
<html lang="<?= Yii::app()->language; ?>" itemscope itemtype="http://schema.org/Webpage">
<head>


    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_START); ?>
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_START); ?>
    <?php Yii::app()->getController()->widget(
        'vendor.chemezov.yii-seo.widgets.SeoHead',
        [
            'httpEquivs' => [
                'Content-Type' => 'text/html; charset=utf-8',
                'X-UA-Compatible' => 'IE=edge,chrome=1',
                'Content-Language' => 'ru-RU'
            ],
            'defaultTitle' => $this->yupe->siteName,
            'defaultDescription' => $this->yupe->siteDescription,
            'defaultKeywords' => $this->yupe->siteKeyWords,
        ]
    ); ?>
    <?php
    /*Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/style.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/SettingsStyle.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/lightslider.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/jquery.fancybox.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/sumoselect.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/build/production.min.css');*/
    Yii::app()->getClientScript()->registerCssFile('http://yandex.st/highlightjs/8.2/styles/github.min.css');
    ?>
    <link rel="stylesheet" href="/themes/default/web/css/build/production.min.css">
    <?php
    $absolutePath = Yii::app()->createAbsoluteUrl(Yii::app()->request->url);
    $pos = strpos($absolutePath, "?");
    $path = $absolutePath;
    if ($pos !== false)
        $path = substr($path, 0, $pos);
    if (substr($path, -1) == "/")
        $path = substr($path, 0, strlen($path) - 1);
    ?>
    <link rel="canonical" href="<?= $path; ?>"/>

    <?php
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.li-translit.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery-ui-1.10.3.custom.min.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/lightslider.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/slide.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/sidebar.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/mobile-siderbar.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.fancybox.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.fancybox.pack.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.sumoselect.js');
    //    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/sort-list-apartment.js');
    /*Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/build/production.min.js');*/
    Yii::app()->getClientScript()->registerScriptFile('http://yastatic.net/highlightjs/8.2/highlight.min.js');
    Yii::app()->getClientScript()->registerScriptFile('http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js');
    Yii::app()->getClientScript()->registerScriptFile('https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/1.7.4/jquery.dotdotdot.min.js');
    Yii::app()->getClientScript()->registerScriptFile("https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.3/jquery.sticky.js");
    ?>
    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
    </script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_END); ?>
    <meta name="yandex-verification" content="bda8a7fd3344436b"/>
    <meta name="google-site-verification" content="u3gGXl1TEPgioKt5X68OKZzthepnVEK1aHu54Tjvels"/>
</head>
<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter41171564 = new Ya.Metrika({
                    id: 41171564,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {
            }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/41171564" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script>
    function addDotdotdot() {
        $(".dotdotdot").dotdotdot({
            height: 76,
        });
    }

</script>

<main class="main">
    <section class="container-fluid wrapper">
        <div class="row content wrapperColor">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row" style="padding: 10px">
                    <div class="col-lg-2">
                        <div class="b-logo">
                            <a href="/">
                                <img class="b-logo__pic" src="/themes/default/web/images/logo_black.png" alt="Логотип">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <header class="row header">
                            <div>
                                <div class="row">
                                    <div class="col-md-7" style="padding: 0">
                                        <div class="tel">
                                            <div class="b-number-phone">
                                                <i style="color: black"
                                                   class="fa fa-phone"
                                                   aria-hidden="true"></i> <?= Yii::app()->getModule("realty")->phone; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="callback-phone-main">
                                            <?php $this->widget('application.modules.callback.widgets.CallbackWidget'); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <ul class="list-menu-header font-menu" itemscope
                                    itemtype="http://schema.org/SiteNavigationElement">
                                    <li><a itemprop="url" href="/pages/o-kompanii">О компании</a></li>
                                    <li><a href="#" id="catalog">Каталог <span class="caret caret-menu"
                                                                               style="color: black"></span></a>
                                        <ul class="list-menu-header__bottom">
                                            <li><a itemprop="url" href="/zhilie-kompleksy">Жилые комплексы</a></li>
                                            <li><a itemprop="url" href="/zastroyschiki">Застройщики</a></li>
                                            <li><a itemprop="url" href="/stroyaschiesya-doma">Строящиеся дома</a></li>
                                            <li><a itemprop="url" href="/novostoyki">Готовые новостройки</a></li>
                                            <li><a itemprop="url" href="/vtorichniy-rinok">Вторичный рынок</a></li>
                                        </ul>
                                    </li>
                                    <li><a itemprop="url" href="/poisk" class="">Поиск</a></li>
                                    <li><a itemprop="url" href="/pages/kontakty">Контакты</a></li>
                                </ul>
                            </div>
                        </header>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 content-page">
                <?= $content; ?>
            </div>
        </div>
    </section>
    <section class="containet-fluid footer footerColor font-footer">
        <div class="row" style="margin:0px">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer__title">
                        О нас
                    </div>
                    <div class="footer__item">
                        <a href="/pages/brend">Бренд</a>
                    </div>
                    <div class="footer__item">
                        <a href="/pages/nashi-celi">Наши цели</a>
                    </div>
                    <div class="footer__item">
                        <a href="/pages/partneram">Партнерам</a>
                    </div>
                    <div class="footer__item">
                        <a href="/pages/kontakty">Контакты</a>
                    </div>
                    <div class="footer__item">
                        <a href="/pages/vazhnaya-informaciya">Важная информация</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer__title">
                        Мы в соц. сетях
                    </div>
                    <div class="footer__item">
                        <a href="http://vk.com/ladom_novostroiki">ВКонтакте</a><br>
                    </div>
                    <div class="footer__item">
                        <a href="https://ok.ru/group/53341514891438">Одноклассники</a><br>
                    </div>
                    <div class="footer__item">
                        <a href="https://www.facebook.com/groups/ladomdom/">Facebook</a><br>
                    </div>
                    <div class="footer__item">
                        <a href="https://www.instagram.com/ladomnovostroiki/">Instagram</a><br>
                    </div>
                    <div class="footer__item">
                        <a href="https://www.youtube.com/channel/UCWpvlOpEaLERfW0S6KWKNtA">Youtube</a><br>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                © ООО «ЛаДом», <?= date("Y"); ?>
                <?= Yii::app()->getModule("realty")->adres; ?>
            </div>

        </div>
    </section>
</main>
<?php
Yii::app()->clientScript->registerScript("launch-fancy-and-lightslider", '
        $(".fancybox").fancybox();
        $("#lightSlider").lightSlider({
            gallery: true,
            item: 1,
            loop:true,
            slideMargin: 0,
            thumbItem: 9
        });
        (function(w,doc) {
if (!w.__utlWdgt ) {
w.__utlWdgt = true;
var d = doc, s = d.createElement(\'script\'), g = \'getElementsByTagName\';
s.type = \'text/javascript\'; s.charset=\'UTF-8\'; s.async = true;
s.src = (\'https:\' == w.location.protocol ? \'https\' : \'http\') + \'://w.uptolike.com/widgets/v1/uptolike.js\';
var h=d[g](\'body\')[0];
h.appendChild(s);
}})(window,document);
        addDotdotdot();
        $("#catalog").on("click", function () {
            $(".list-menu-header__bottom").toggleClass("js-list-menu-header__bottom");
            $(".caret-menu").toggleClass("js-caret-menu");
        });
        if ($(".camera_wrap").length)
        {
            $(".camera_wrap").camera(
                {
                    height: "30%",
                    pagination: false
                }
            );
        }
    ');
?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script>

</script>
<script type='text/javascript'>
    (function () {
        var widget_id = 'J5EZBNJEPZ';
        var d = document;
        var w = window;

        function l() {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = '//code.jivosite.com/script/widget/' + widget_id;
            var ss = document.getElementsByTagName('script')[0];
            ss.parentNode.insertBefore(s, ss);
        }

        if (d.readyState == 'complete') {
            l();
        } else {
            if (w.attachEvent) {
                w.attachEvent('onload', l);
            } else {
                w.addEventListener('load', l, false);
            }
        }
    })();</script>
<!-- {/literal} END JIVOSITE CODE -->

</body>
<script src="/themes/default/web/js/build/production.min.js"></script>
<style>
    .js-is-in-view-false {
        display: none;
    }
</style>
</html>
