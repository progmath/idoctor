<div class="srtabanutun_banner">
    <p><?= $category->arm_title; ?></p>
</div>

<div class="lab_main">
    <? $i = 1; ?>

    <div class="line">
        <? foreach ($centers as $center): ?>

            <div class="bl zoom center_mob">
                <a href="/center/view/<?= $center['alias']; ?>">
                    <? if ($center['img']): ?>
                        <img src="Images/<?= $center['img']; ?>" alt="No image">
                    <? else: ?>
                        <img src="Images/no-image.jpg" alt="No image">
                    <? endif; ?>
                    <p><?= $center['arm_title']; ?></p></a>

                <div class="stars_container stars_add">
                    <div class="star-ratings-sprite">

                        <span style="width:<?= $center['avg_review'] * 10 / 0.5 ?>%"
                              class="star-ratings-sprite-rating"></span>

                    </div>
                </div>
            </div>

        <? endforeach; ?>
        <? if ($i % 4 == 0): ?>
    </div>
<? endif; ?>
    <? if ($i % 4 == 0): ?>
    <div class="line">
        <? endif; ?>
        <? $i++; ?>
    </div>

    <div class="text-center">
        <?php if ($pagination->countPages > 1): ?>
            <?= $pagination; ?>
        <?php endif; ?>
    </div>