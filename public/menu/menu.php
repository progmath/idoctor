
    <li>
        <?if (strpos($exam['alias'], 'qnnutyun')):?>
            <a href="/exam/index/<?= $exam['alias'];?>" class="hvr-float-shadow"><?= $exam['arm_title']?></a>
        <?elseif (strpos($exam['alias'], 'tester')):?>
            <a href="/screening/view/<?= $exam['alias']?>" class="hvr-float-shadow"><?= $exam['arm_title'];?></a>
        <?else:?>
            <a href="/center/index/<?= $exam['alias']?>" class="hvr-float-shadow"><?= $exam['arm_title'];?></a>
        <?endif;?>

        <?php if(isset($exam['childs'])):?>
            <ul>
                <?= $this->getMenuHtml($exam['childs']);?>
            </ul>
        <?php endif;?>
    </li>

