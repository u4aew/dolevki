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
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <?php
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/style.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/lightslider.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/jquery.fancybox.css');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/blog.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/bootstrap-notify.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.li-translit.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery-ui-1.10.3.custom.min');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/lightslider.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/slide.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/sidebar.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/mobile-siderbar.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.fancybox.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.fancybox.pack.js');
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
    }

</script>
<div id="nav_js" class="navigation">
    <a href="/">
    <img class="image-logo" style="display:block; margin: 0 auto;max-width: 250px"
         src="/uploads/image/3a3de38f91509e3c02ac8f27c74dad74.PNG" alt="logo"></a>
    <div class="find-form">
        <p align="center" style="margin:0px;font-size:20px;font-weight:bold;padding-top:10px">Поиск по параметрам</p>
        <hr style="margin:5px 20px 10px 20px;">
        <form id="searchForm" action="/search" method="get">
            <div style="width:90%;margin:0px auto;">
                <p align="center" style="font-size:18px;font-weigth:bold">Количество комнат </p>
                <div style="width:25%;float:left;">
                    <input type="checkbox" id="one-room" name="one-room" value="1"/>
                    <label for="one-room">1</label>
                </div>
                <div style="width:25%;float:left;">
                    <input type="checkbox" id="two-room" name="two-room" value="2"/>
                    <label for="two-room">2</label>
                </div>
                <div style="width:25%;float:left;">
                    <input type="checkbox" id="three-room" name="three-room" value="3"/>
                    <label for="three-room">3</label>
                </div>
                <div style="width:25%;float:left;">
                    <input type="checkbox" id="four-room" name="four-room" value="4"/>
                    <label for="four-room">4</label>
                </div>
                <div style="float:left;margin-top:10px;margin-bottom:5px">
                    <input type="checkbox" id="studio-room" name="four-room" value="studio"/>
                    <label for="studio-room">Студия</label>
                </div>
                <div style="clear:both">
                </div>
                <hr style="margin:5px 20px 10px 20px;">
                <div>
                    <p align="center" style="font-size:18px;font-weigth:bold">Стоимость, РУБ </p>
                    <div style="width:95%;margin:0px auto;">
                        <div style="margin:0px;float: left"><b>ОТ</b><input type="text" id="amount_two"
                                                                            class="amount_two"></div>

                        <div style="margin:0px;float: right"><b>ДО</b><input type="text" id="amount_1_two"
                                                                             class="amount1_two"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div style="clear:both"></div>
                    <div id="slider-range_two"></div>
                    <hr style="margin:5px 20px 10px 20px;">
                    <div>
                        <p align="center" style="font-size:18px;font-weigth:bold">ПЛОЩАДЬ от, <sup>М 2</sup></p>
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
                    <hr style="margin:5px 20px 10px 20px;"
                </div>
                <div style="width: 90%;margin: 0 auto 20px auto" >
                    <p align="center" style="font-size:18px;font-weigth:bold">Срок сдачи </p>
                    <div style="width:95%;margin:0px auto;">
                        <div style="margin:0px;float: left"><b>C</b><input type="text" id="amount_three"
                                                                            class="amount_two"></div>

                        <div style="margin:0px;float: right"><b>ПО</b><input type="text" id="amount_1_three"
                                                                             class="amount1_two"></div>
                        <div class="clearfix"></div>
                        <div id="slider-range_three"></div>
                    </div>

                    <div style="clear:both"></div>

                </div>
            </div>
            <button type="submit" class="nav__find" onclick="sendFilter(); return false;"> Найти квартиры</button>
        </form>
    </div>
</div>
<div class="nav-list">
    <ul class="nav-iteam-list">
        <li><a href="#"> Пункт 1 </a></li>
        <li><a href="#"> Пункт 2 </a></li>
        <li><a href="#"> Пункт 3 </a></li>
        <li><a href="#"> Пункт 4 </a></li>
        <li><a href="#"> Пункт 5 </a></li>
    </ul>
</div>
</div>
<main class="main">
    <section class="container-fluid wrapper">
        <div class="row" style="background-color:#e5e5e5;">
            <div class="col-lg-10 col-lg-offset-1">
                <header class="row header">
                    <div style="text-align:center;font-size:30px;font-weight:bold;"> 8 800 5555 35 35</div>
                </header>
            </div>
        </div>
        <div class="row content">
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 content-page">
                <?= $content; ?>
            </div>

        </div>

        <div class="row sales">
            <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12 sale" style="margin-top: 10px">
                <div class="row">
                    <h2 style="text-align:center"> Акции и предложения </h2>
                    <hr>
                    <div class="col-lg-6" style="border-top:3px solid gray;padding:10px;">
                        <b>Lorem ipsum dolor </b>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet pellentesque urna. In
                            placerat mi et consectetur viverra. Phasellus fermentum dictum dui eu luctus. Curabitur
                            venenatis velit ligula, consectetur ullamcorper nisi efficitur ac. Integer nulla nibh,
                            sagittis quis viverra eget, accumsan blandit eros. Vivamus et lobortis lorem. Etiam arcu
                            sapien, efficitur a erat at, luctus eleifend dui. In at ante ultrices, vulputate purus nec,
                            iaculis urna. Fusce fringilla id dui sit amet sodales. Nunc ultricies auctor dignissim.
                            Curabitur nulla ante, vestibulum eu lacinia a, varius non odio. Phasellus efficitur vel
                            dolor nec cursus. Ut tincidunt nisi dolor, ut tempus justo lacinia bibendum.
                        </p>
                    </div>
                    <div class="col-lg-6" style="border-bottom:3px solid gray;padding:10px;">
                        <b>Lorem ipsum dolor </b>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet pellentesque urna. In
                            placerat mi et consectetur viverra. Phasellus fermentum dictum dui eu luctus. Curabitur
                            venenatis velit ligula, consectetur ullamcorper nisi efficitur ac. Integer nulla nibh,
                            sagittis quis viverra eget, accumsan blandit eros. Vivamus et lobortis lorem. Etiam arcu
                            sapien, efficitur a erat at, luctus eleifend dui. In at ante ultrices, vulputate purus nec,
                            iaculis urna. Fusce fringilla id dui sit amet sodales. Nunc ultricies auctor dignissim.
                            Curabitur nulla ante, vestibulum eu lacinia a, varius non odio. Phasellus efficitur vel
                            dolor nec cursus. Ut tincidunt nisi dolor, ut tempus justo lacinia bibendum.</p>
                    </div>

                </div>
                <hr>
            </div>

        </div>

    </section>
    <section class="containet-fluid footer">
        <div class="row" style="margin:0px">
            <div class="col-lg-8 col-lg-offset-2" style="text-align:center">
                <div class="col-lg-3 col-md-3 col-sm-3"> © название, 2016</div>
                <div class="col-lg-3 col-md-3 col-sm-3"><a href="#"> Ссылка 1</a></div>
                <div class="col-lg-3 col-md-3 col-sm-3"><a href="#"> Ссылка 2 </a></div>
                <div class="col-lg-3 col-md-3 col-sm-3"> Разработка</div>

            </div>
    </section>
    </div>
    </div>
</main>
<script>
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 9
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>
