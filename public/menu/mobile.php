<div class="list">
    <div class="back_img"><img src="Images/<?= $exam['img']; ?>" alt="no image"></div>
    <? if (strpos($exam['alias'], 'qnnutyun')): ?>
        <a href="/exam/index/<?=$exam['alias'];?>"><?= $exam['arm_title'] ?></a>
    <? elseif (strpos($exam['alias'], 'tester')): ?>
        <a href="/screening/view/<?= $exam['alias']?>"><?= $exam['arm_title']; ?></a>
    <? else: ?>
        <a href="/center/index"><?= $exam['arm_title']; ?></a>
    <? endif; ?>
</div>
<?php if (isset($exam['childs'])): ?>
    <div>
        <?= $this->getMenuHtml($exam['childs']); ?>
    </div>
<?php endif; ?>





