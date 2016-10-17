<div class="camera_wrap" <?php if ($height > 0): ?> data-height= <?= $height; ?><?php endif; ?>>
    <?php foreach ($items as $item): ?>
        <div data-src="<?= $item["image"] ?>">
            <div class="camera_caption fadeFromBottom">
                <em> <?= $item["label"] ?></em>
                <br>
                <?= $item["caption"] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>