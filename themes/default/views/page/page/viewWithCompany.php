<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = [$model->title, Yii::app()->getModule('yupe')->siteName];
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $model->description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;
?>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="row" style="padding-top: 50px">

            <div class="js-box-company">
                <hr>
                <div class="col-lg-4">
                    <div class="js-box-company__logo">
                        <img class="image-logo" style="display:block; margin: 0 auto;max-width: 250px"
                             src="<?= $this->mainAssets ?>/images/site_logo.png" alt="logo">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="js-box-company__description">
                        Агентство недвижемости специализируется на продаже, покупке на первичном и вторичном рынках
                        жилья, аренде,
                        коммерческой недвижимости.
                        Высококвалифицированные специалисты агентства осуществляют помощь в получении ипотеки,
                        юридическое
                        сопровождение сделок, покупку жилья при помощи субсидий.
                    </div>
                </div>
                <div style="clear: both"></div>
                <hr>
            </div>
        </div>


        <div class="row" style="margin-top: 20px">
            <div class="js-box-Motivation">
                <h2 style="text-align: center;margin-bottom: 40px">Что мы можем предложить нашим клиентам ?</h2>
                <div class="col-lg-4">
                    <div class="js-box-Motivation__one">
                        <img src="/uploads/image/fpIconPrice.png" alt="" style="width: 100px">
                        <div style="margin-top: 10px;font-weight: bold"> АКТУАЛЬНЫЕ ЦЕНЫ</div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="js-box-Motivation__two" style="text-align: center">
                        <img src="/uploads/image/workmen.png" alt="" style="width: 100px">
                        <div style="margin-top: 10px;font-weight: bold"> ПОМОЩЬ В ОФОРМЛЕНИЕ ДОКУМЕНТОВ</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="js-box-Motivation__three" style="text-align: center">
                        <img src="/uploads/image/time.png" alt="" style="width: 100px">
                        <div style="margin-top: 10px;font-weight: bold"> МИНИМАЛЬНЫЕ СРОКИ ВЫПОЛНИЯ</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="js-box-work">
                <hr>
                <h2 style="text-align: center">С чего начинается сотрудничество ?</h2>
                <div class="col-lg-12">
                    <div class="js-box-work__one" style="font-size: 25px">
                        Ознакомьтесь с нашим <a href="/">каталогом</a> и позвоните нам по 8 800 555 35 35
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row" style="margin-top: 80px">
        <div class="js-box-contacts-company">
        <div class="col-lg-12">
            <hr>
            <div class="js-box-contacts-company__one">
            <h2 style="text-align: center">Где мы находимся ?</h2>
            <div style="text-align: center;font-size: 20px">Нащ адрес Барнаул ул Ленина 4654</div>
            <hr>
            </div>
            <div class="js-box-contacts-company__map">
            <div style="padding: 10px;margin:0 auto;max-width: 100%;overflow: hidden">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=HwWFWmIe0Tv_eGfqbE2rmeWh1rOUdkHA&width=1000&height=400&lang=ru_RU&sourceType=constructor&scroll=true"></script>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

