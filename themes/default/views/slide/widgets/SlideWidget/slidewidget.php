<div class="camera_wrap" <?php if ($height > 0): ?> data-height= <?= $height; ?><?php endif; ?>>
    <?php foreach ($items as $item): ?>
        <div data-src="<?= $item["image"] ?>">
            <div class="camera__desc camera_caption fadeFromBottom">
               <div style="display: block">
                <em> <?= $item["label"] ?></em>
                <br>
                <?= $item["caption"] ?>
               </div>
                <div  class="b-next-reader" style="display: block"> 
                    <a href="#" class="next-reader-slider">  Читать далее </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>