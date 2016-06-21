<?php
    /**
     *@var Post $model */
?>
<?php foreach ($models as $model): ?>
    <div class="col-lg-6" style="border-top:3px solid gray;padding:10px;">
        <b>
            <?= CHtml::link(
                CHtml::encode($model->title),
                $model->getUrl()
            ); ?>
        </b>
        <p><?=$model->content; ?>
        </p>
    </div>
<?php endforeach; ?>
