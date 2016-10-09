<?php
/**
 * @var $data Post
 */
?>
<div class="posts-list-block">
    <div class="b-sale__title font-title posts-list-block-header ">
        <?= CHtml::link(
            CHtml::encode($data->title),
            $data->getUrl()
        ); ?>
    </div>
    <div class="posts-list-block-meta">
	        <span>
	            <i style="color: white" class="glyphicon glyphicon-calendar"></i>

                <?= Yii::app()->getDateFormatter()->formatDateTime(
                    $data->publish_time,
                    "long",
                    "short"
                ); ?>
	        </span>
    </div>

</div>
