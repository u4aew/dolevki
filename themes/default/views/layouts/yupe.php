<?php
Yii::import("application.modules.realty.models.*");
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
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/blog.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/bootstrap-notify.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.li-translit.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery-ui-1.10.3.custom.min.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/lightslider.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/slide.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/sidebar.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/mobile-siderbar.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.fancybox.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.fancybox.pack.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.sumoselect.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/leanding.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.maskedinput.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/sort-list-apartment.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.maskedinput.js');
    
    ?>
    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
    </script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://yandex.st/highlightjs/8.2/styles/github.min.css">
    <script src="http://yastatic.net/highlightjs/8.2/highlight.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_END); ?>
</head>
<body>
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
            var currentVal = $(this).val();
            minimalCost = Math.max(minimalCost, currentVal);
        });
        var maximalCost = getParams().maximalAvailableCost;
        $(".amount1_two").each(function () {
            var currentVal = $(this).val();
            maximalCost = Math.min(maximalCost, currentVal);
        });
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
        $(".select-room-click-cheked").each(function()
        {
            url += "rooms[]="+$(this).data("val")+"&";
        });
        $("#status :selected").each(function(){
            url+= "status[]="+$(this).val()+"&";
        });
        $("#readyTime :selected").each(function(){
            url+= "time[]="+$(this).val()+"&";
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
<script>
    $(document).ready(
        function () {
            $(".button__show-mobile-filter").click(
                function () {
                    $(".find-form").toggle();
                }
            )
        }
    )
</script>
<div id="nav_js" class="navigation">
    <a href="/">
        <img class="image-logo" style="display:block; margin: 0 auto;max-width: 250px"
             src="<?=$this->mainAssets?>/images/site_logo.png" alt="logo"></a>
    <button class="button__show-mobile-filter"> Поиск квартиры</button>
    <div class="nav-list">
        <ul class="nav-iteam-list">
            <li><a href="/pages/o-nas">О компании</a></li>
            <li><a href="/districts">Кварталы</a></li>
            <li><a href="/builders">Застройщики</a></li>
            <li><a href="/">Дома</a></li>
            <li><a href="#"> Пункт 5 </a></li>
        </ul>
    </div>
    <div class="find-form">
        <p align="center" style="margin:0px;font-size:20px;font-weight:bold;padding-top:10px">Подбор квартиры</p>
        <hr style="margin:5px 20px 10px 20px;">
        <form id="searchForm" action="/search" method="get">
            <div style="width:90%;margin:0px auto;">
                <p align="center" style="font-size:18px;font-weigth:bold">Количество комнат </p>
                <ul class="select-room">
                    <?php
                    if (!isset($_GET["rooms"]))
                        $_GET["rooms"] = [];
                    $rooms = [0 => "Студия", "1", "2", "3", "4+"];
                    ?>
                    <?php foreach ($rooms as $key => $value):?>
                        <?php

                        $flag = array_search($key,$_GET["rooms"]);
                        ?>
                        <li class="select-room-click <?= ($flag !== false) ? "select-room-click-cheked" : "" ?>" data-val = "<?=$key;?>"><?=$value; ?></li>
                    <?php endforeach; ?>
                </ul>
                <div style="clear:both">
                </div>
                <hr style="margin:5px 20px 10px 20px;">
                <div>
                    <p align="center" style="font-size:18px;font-weigth:bold">Стоимость, <span class="rubl"> руб.</span></p>
                    <div style="width:95%;margin:0px auto;">
                        <div style="margin:0px;float: left"><b>ОТ</b><input type="text" id="amount_two"
                                                                            class="amount_two"></div>

                        <div style="margin:0px;float: right"><b>ДО</b><input type="text" id="amount_1_two"
                                                                             class="amount1_two"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div style="clear:both"></div>
                    <div id="slider-range_two"></div>
                    <hr style="margin:25px 20px 10px 20px;"
                    <div>
                        <p align="center" style="font-size:18px;font-weigth:bold">Площадь, м<sup>2</sup></p>
                        <div style="width:95%;margin:0px auto;">
                            <div style="margin:0px;float: left"><b>ОТ</b> <input type="text" id="amount" class="amount">
                            </div>
                            <div style="margin:0px;float: right"><b>ДО</b> <input type="text" id="amount_1"
                                                                                  class="amount1"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div style="clear:both"></div>
                        <div id="slider-range"></div>
                    </div>
                    <hr style="margin:25px 20px 10px 20px;"
                </div>
                <div style="width: 90%;margin: 0 auto 20px auto" >
                    <p align="center" style="font-size:18px;font-weigth:bold">Тип жилья</p>
                    <select multiple class="sumoSelect" name="" id="status" data-placeholder = "Тип искомого жилья">
                        <option id = "inProgress" value="<?=STATUS_IN_PROGRESS?>"   <?php if (isset($_GET["status"]) && array_search(STATUS_IN_PROGRESS,$_GET["status"])!==false) echo "selected" ?>>Строящееся жилье</option>
                        <option value="<?=STATUS_READY?>"  <?php if (isset($_GET["status"]) && array_search(STATUS_READY,$_GET["status"])!==false) echo "selected" ?> >Готовые новостройки</option>
                        <option value="<?=STATUS_RESELL?>" <?php if (isset($_GET["status"]) && array_search(STATUS_RESELL,$_GET["status"])!==false) echo "selected" ?> >Вторичная продажа</option>
                    </select>
                </div>
                <div style="width: 90%;margin: 0 auto 20px auto" id = "readyTime__container">
                    <p align="center" style="font-size:18px;font-weigth:bold">Срок сдачи </p>
                    <select multiple class="sumoSelect" name="" id="readyTime" data-placeholder = "Интересующее время готовности жилья">
                        <?php
                        $times = ReadyTime::model()->findAll();
                        ?>
                        <?php foreach ($times as $item):?>
                            <option value="<?=$item->id;?>"  <?php if (isset($_GET["time"]) && array_search($item->id,$_GET["time"])!==false) echo "selected" ?>><?=$item->text;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="nav__find" onclick="sendFilter(); return false;"> Найти квартиры</button>
        </form>
    </div>
</div>
</div>
<main class="main">
    <section class="container-fluid wrapper">
        <div class="row content">
            <div class="col-lg-10 col-lg-offset-1">
                <header class="row header">
                    <a class="tel:+78005553535"><div style="color: white; text-align:right;font-size:24px;font-weight:bold;"><i class="fa fa-phone" aria-hidden="true"></i> 8 800 5555 35 35</div></a>
                </header>
            </div>
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 content-page">
                <?= $content; ?>
            </div>

        </div>

        <div class="row sales">
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 sale" style="margin-top: 10px">
                <div class="row">
                    <h2 style="text-align:center"> Акции и предложения </h2>
                    <hr>
                    <div class="widget last-posts-widget">
                        <!--               <?php /*if($this->beginCache('application.modules.blog.widgets.LastPostsWidget', ['duration' => $this->yupe->coreCacheTime])):*/?>
         -->                   <?php $this->widget(
                            'application.modules.blog.widgets.LastPostsWidget',
                            ["view" => "lastposts", 'cacheTime' => $this->yupe->coreCacheTime, "limit" => 2]
                        ); ?>
                        <!--               <?php /*$this->endCache();*/?>
                        <?php /*endif;*/?>
             -->       </div>
                </div>
                <hr>
            </div>

        </div>

    </section>
    <section class="containet-fluid footer">
        <div class="row" style="margin:0px">
            <div class="col-lg-8 col-lg-offset-2" style="text-align:center">
                <div class="col-lg-3 col-md-3 col-sm-3"> © Долёвки22, 2016</div>
                <div class="col-lg-3 col-md-3 col-sm-3"><a href="http://vk.com/dolevki22"> Вконтакте</a></div>
                <div class="col-lg-3 col-md-3 col-sm-3"><a href=""> О нас</a>  </div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px"> <a href=""> Ссылка 2</a> </div>

            </div>
    </section>
</main>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox();
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop:true,
            slideMargin: 0,
            thumbItem: 9
        });
    });
</script>
<div class='notifications top-right' id="notifications"></div>

</body>
</html>
