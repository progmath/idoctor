<div class="srtabanutun_banner">
    <p><!--ԼԱբորատոր քննություն &#8195 &#8195 &#8195 ՍՐՏԱԲԱՆՈՒԹՅՈՒՆ-->
        <?$i = 1;?>
        <? foreach ($breadcrumbs as $alias => $breadcrumb): ?>
        <? if ($breadcrumb['parent_id'] == 0): ?>
            <a href="<?= PATH ?>/exam/index/<?= $alias ?>" class="breadcrumbs"><?= $breadcrumb['title'] ?></a>
        <? else: ?>
            <span><?= $breadcrumb['title'] ?></span>
        <? endif; ?>
        <?if($i <count($breadcrumbs)):?>
    <div class="for_arrow"><img src="/Images/arrow.png" alt="No image"></div>
    <?$i++;?>
    <?endif;?>
    <? endforeach; ?>
    </p>

</div>

<div class="inner">
    <p class="gen_tip"><?= $diagnose->arm_title; ?></p>
    <div class="bcontent">
        <div class="t_block">
            <div class="i_ftext">
                <p>
                    <?= $diagnose->arm_content; ?>
                </p>
            </div>

            <div>
                <div class="pp">
                    <p>Արժեքը</p>
                    <p><?= $diagnose->min_price; ?> - <?= $diagnose->max_price; ?> դրամ</p>
                </div>
                <img src="" alt="">
            </div>
        </div>
        <div class="v_block">
            <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/<?= $diagnose->video ?>">
            </iframe>

        </div>
    </div>
</div>

