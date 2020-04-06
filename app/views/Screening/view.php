<div class="laborator_qnutun_banner">
    <p><?= $parent_category->arm_title; ?></p>
</div>

<div class="choose">
    <ul>
        <? foreach ($screenings as $screening): ?>
            <li class="screening_list">
                <a href="<? PATH; ?>/diagnose/<?= $screening->alias; ?>"><?= $screening->arm_title ?></a>
            </li>

        <? endforeach; ?>
    </ul>
</div>

