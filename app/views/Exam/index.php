<div class="laborator_qnutun_banner">
    <p><?= $parent_category->arm_title; ?></p>
</div>

<div class="choose">
    <ul>
        <? foreach ($categories as $category): ?>
            <li class="choosen_list">
                <a href="#"><?= $category['arm_title'] ?></a><img src="Images/blueicon.png" alt="no image">
            </li>
            <table align="center" class="our_table">
                <? if ($category['diagnoses']): ?>
                <thead>
                <tr>
                    <!-- <th>ԱԲՐԵՎԻԱՏՈՒՐԱ</th>-->
                    <th>ԱՆՎԱՆՈՒՄ</th>
                    <th>ԳԻՆ</th>
                </tr>
                </thead>
                <tbody>

                <? foreach ($category['diagnoses'] as $diagnose): ?>

                    <tr>
                        <td><a href="<?= PATH; ?>/diagnose/<?= $diagnose['alias']; ?>"
                               class="diagnose_href"><?= $diagnose['arm_title']; ?></a></td>
                        <!--  <td>CYP2C9 GENOTYPES ԳԵՆՈՏԻՊԻ ՈՐՈՇՈՒՄԸ ՍԿԶԲՆԱԿԱՆ ԴԵՂԱՁԱՓԻ ԸՆՏՐՈՒԹՅԱՆ ՀԱՄԱՐ</td>-->
                        <td><?= $diagnose['min_price']; ?> - <?= $diagnose['max_price']; ?> դրամ</td>
                    </tr>
                <? endforeach; ?>
                <? else: ?>
                    <tr>
                        <td>Այս կատեգորիայում դեռ չկան ծառայություններ</td>
                    </tr>
                <? endif; ?>

                </tbody>
            </table>
        <? endforeach; ?>
    </ul>
</div>
