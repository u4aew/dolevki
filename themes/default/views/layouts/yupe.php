<?php
Yii::import("application.modules.realty.models.*");
Yii::app()->getClientScript()->coreScriptPosition = CClientScript::POS_END;
Yii::app()->getClientScript()->defaultScriptFilePosition = CClientScript::POS_END;

?>
<!DOCTYPE html>
<html lang="<?= Yii::app()->language; ?>">
<head>
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
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/style.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/lightslider.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/jquery.fancybox.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/sumoselect.css');
    Yii::app()->getClientScript()->registerCssFile('http://yandex.st/highlightjs/8.2/styles/github.min.css');
    ?>

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
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/build/production.min.js');
    Yii::app()->getClientScript()->registerScriptFile('http://yastatic.net/highlightjs/8.2/highlight.min.js');
    Yii::app()->getClientScript()->registerScriptFile('http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js');
    ?>
    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
    </script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_END); ?>
</head>
<body>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter38253635 = new Ya.Metrika({
                    id: 38253635,
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
    <div><img src="https://mc.yandex.ru/watch/38253635" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script>
    window.params =
    {
        currentMinCost: <?=Yii::app()->request->getParam("minimalCost", Yii::app()->realty->getMinimumAvailableCost()); ?>,
        currentMaxCost: <?=Yii::app()->request->getParam("maximalCost", Yii::app()->realty->getMaximumAvailableCost()); ?>,
        currentMinSize: <?=Yii::app()->request->getParam("minimalSize", Yii::app()->realty->getMinimumAvailableSize()); ?>,
        currentMaxSize: <?=Yii::app()->request->getParam("maximalSize", Yii::app()->realty->getMaximumAvailableSize()); ?>,
        minimalAvailableCost: <?=Yii::app()->realty->getMinimumAvailableCost(); ?>,
        maximalAvailableCost: <?=Yii::app()->realty->getMaximumAvailableCost(); ?>,
        minimalAvailableSize: <?=Yii::app()->realty->getMinimumAvailableSize(); ?>,
        maximalAvailableSize: <?=Yii::app()->realty->getMaximumAvailableSize(); ?>,
    }
    function getParams() {
        return window.params;
    }
    function sendFilter() {
        var rooms = "";
        $("input[name=rooms]:checked").each(function () {
            if (rooms != "")
                rooms += ","
            rooms += $(this).val();
        });
        var minimalCost = getParams().minimalAvailableCost;
        $(".amount_two").each(function () {
            var currentVal = parseInt($(this).val().replace(new RegExp('[ ]', 'g'), ""));
            minimalCost = Math.max(minimalCost, currentVal);
        });
        var maximalCost = getParams().maximalAvailableCost;
        $(".amount1_two").each(function () {
            var currentVal = parseInt($(this).val().replace(new RegExp('[ ]', 'g'), ""));
            maximalCost = Math.min(maximalCost, currentVal);
        });
        if (minimalCost > maximalCost) {
            var t = maximalCost;
            maximalCost = minimalCost;
            minimalCost = t;
        }
        var minimalSize = getParams().minimalAvailableSize;
        $(".amount").each(function () {
            var currentVal = $(this).val();
            minimalSize = Math.max(minimalSize, currentVal);
        });
        var maximalSize = getParams().maximalAvailableSize;
        $(".amount1").each(function () {
            var currentVal = $(this).val();
            maximalSize = Math.min(maximalSize, currentVal);
        });
        var url = "/search?";
        $(".select-room-click-cheked").each(function () {
            url += "rooms[]=" + $(this).data("val") + "&";
        });
        $("#status :selected").each(function () {
            url += "status[]=" + $(this).val() + "&";
        });
        $("#readyTime :selected").each(function () {
            url += "time[]=" + $(this).val() + "&";
        });


        if (rooms != "")
            url += "rooms=" + rooms + "&";
        if (minimalCost > getParams().minimalAvailableCost)
            url += "minimalCost=" + minimalCost + "&";
        if (maximalCost < getParams().maximalAvailableCost)
            url += "maximalCost=" + maximalCost + "&";
        if (minimalSize > getParams().minimalAvailableSize)
            url += "minimalSize=" + minimalSize + "&";
        if (maximalSize < getParams().maximalAvailableSize)
            url += "maximalSize=" + maximalSize + "&";
        if (url.substr(url.length - 1, 1) == "&")
            url = url.substr(0, url.length - 1);
        if (url.substr(url.length - 1, 1) == "?")
            url = url.substr(0, url.length - 1);
        window.location = url;
        return false;
    }

</script>
<?php
Yii::app()->clientScript->registerScript("mobile-form", '
            $(".button__show-mobile-filter").click(
                function () {
                    $(".find-form").toggle();
                }
            )
    ');
?>
<main class="main">
    <section class="container-fluid wrapper">
        <div class="row content">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row" style="padding: 10px">
                    <div class="col-lg-3">
                        <div onclick="window.location.href='/'" class="b-logo" style="background-image: url('/themes/shop/web/images/site_logo.png')">

                        </div>
                    </div>
                    <div class="col-lg-9">
                        <header class="row header">
                            <div>
                                <a class="tel:+79520074985">
                                    <div style="color: white; text-align:center;font-size:24px;font-weight:bold;margin-bottom: 10px"><i
                                            class="fa fa-phone" aria-hidden="true"></i> 8-952-007-49-85
                                    </div>
                                </a>
                            </div>
                            <div>
                                <ul class="list-menu-header">
                                    <li><a href="">Квартал</a></li>
                                    <li><a href="">Квартал</a></li>
                                    <li><a href="">Квартал</a></li>
                                    <li><a href="">Квартал</a></li>
                                    <li><a href="">Квартал</a></li>
                                    <li><a href="">Квартал</a></li>
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

        <div class="row sales">
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 sale" style="margin-top: 10px">
                <div class="row">
                    <h1 style="color: black;font-size: 20px;text-align:center">Купить квартиру в Барнауле. Новостройки
                        от застройщика</h1>
                    <h3 style="text-align:center"> Акции и предложения </h2>
                        <hr>
                        <div class="widget last-posts-widget">
                            <!--               <?php /*if($this->beginCache('application.modules.blog.widgets.LastPostsWidget', ['duration' => $this->yupe->coreCacheTime])):*/ ?>
         --> <?php $this->widget(
                                'application.modules.blog.widgets.LastPostsWidget',
                                ["view" => "lastposts", 'cacheTime' => $this->yupe->coreCacheTime, "limit" => 2]
                            ); ?>
                            <!--               <?php /*$this->endCache();*/ ?>
                        <?php /*endif;*/ ?>
             -->       </div>
                </div>
                <hr>
            </div>

        </div>

    </section>
    <section class="containet-fluid footer">
        <div class="row" style="margin:0px">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="col-lg-9 col-md-9 col-sm-9"> © ООО «Гранит», <?= date("Y"); ?><br>Барнаул, ул. Антона
                    Петрова, д 219а, 2 этаж, офис 208
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="text-align: right"><a href="http://vk.com/dolevki22">ВКонтакте</a><br><a
                        href="/pages/vazhnaya-informaciya">Важная информация</a></div>
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
    ');
?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function () {
        var widget_id = 'u3GchnIKqA';
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
</script>
</body >
</html >
