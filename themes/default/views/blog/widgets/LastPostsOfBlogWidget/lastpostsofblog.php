<?php Yii::import('application.modules.blog.BlogModule'); ?>
<div class="row">
    <?php foreach ($posts as $post): ?>
        <div class="col-lg-12">
            <div class="b-post">
                <div class="b-post-header font-title">
                    <?= CHtml::link(
                        CHtml::encode($post->title),
                        $post->getUrl()
                    ); ?>
                </div>
                <div class="row">
                    <div class="col-lg-3" style="padding: 0">
                        <div class="post__img" style="background-image: url('<?= $post->getImageUrl();?>')">

                        </div>
                    </div>
                    <div class="col-lg-9">
                    <div class="b-post-text">
                        <?= strip_tags($post->getQuote()); ?>
                        <div class="b-post-text__next-read">
                            <a href="<?=$post->getUrl();?>">Читать далее</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!--
<?php /*Yii::import('application.modules.blog.BlogModule'); */ ?>
<div class="posts">
    <div class="posts-list">
        <?php /*foreach ($posts as $post): */ ?>
            <div class="posts-list-block">
                <div class="posts-list-block-header">
                    <? /*= CHtml::link(
                        CHtml::encode($post->title),
                        $post->getUrl()
                    ); */ ?>
                </div>

                <div class="posts-list-block-meta">
                    <span>
                        <i class="glyphicon glyphicon-user"></i>
                        <?php /*$this->widget(
                            'application.modules.user.widgets.UserPopupInfoWidget',
                            [
                                'model' => $post->createUser
                            ]
                        ); */ ?>
                    </span>

                    <span>
                        <i class="glyphicon glyphicon-pencil"></i>

                        <? /*= CHtml::link(
                            CHtml::encode($post->blog->name),
                            [
                                '/blog/blog/view/',
                                'slug' => CHtml::encode($post->blog->slug)
                            ]
                        ); */ ?>
                    </span>

                    <span>
                        <i class="glyphicon glyphicon-calendar"></i>

                        <? /*= Yii::app()->getDateFormatter()->formatDateTime(
                            $post->publish_time,
                            "long",
                            "short"
                        ); */ ?>
                    </span>
                </div>

                <div class="posts-list-block-text">
                    <p>
                        <? /*= $post->getImageUrl() ? CHtml::image($post->getImageUrl(), CHtml::encode($post->title), ['class' => 'img-responsive']) : ''; */ ?>
                    </p>
                    <? /*= strip_tags($post->getQuote()); */ ?>
                </div>

                <div class="posts-list-block-tags">
                    <div>
                        <span class="posts-list-block-tags-block">
                            <i class="glyphicon glyphicon-tags"></i>

                            <? /*= Yii::t('BlogModule.blog', 'Tags'); */ ?>:

                            <?php /*foreach ((array)$post->getTags() as $tag): */ ?>
                                <span>
                                    <? /*= CHtml::link(
                                        CHtml::encode($tag),
                                        ['/posts/', 'tag' => CHtml::encode($tag)]
                                    ); */ ?>
                                </span>
                            <?php /*endforeach; */ ?>
                        </span>

                        <span class="posts-list-block-tags-comments">
                            <i class="glyphicon glyphicon-comment"></i>

                            <? /*= CHtml::link(
                                $post->getCommentCount(),
                                $post->getUrl(['#' => 'comments'])
                            ); */ ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php /*endforeach; */ ?>
    </div>
</div>
-->