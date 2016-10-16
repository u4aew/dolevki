<div class="camera_wrap" <?php if ($height > 0): ?> data-height= <?= $height; ?><?php endif; ?>>
    <?php foreach ($items as $item): ?>
        <div data-src="<?= $item["image"] ?>">
            <div class="camera_caption fadeFromBottom">
                <em> <?= $item["caption"] ?></em>
                <br>
                <?= $item["label"] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>