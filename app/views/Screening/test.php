<div class="laborator_qnutun_banner">
    <p>Ձեզ խորհուրդ է տրվում անցնել հետեվյալ ծառայությունները</p>
</div>
<? if (isset($results)): ?>
    <div class="choose">
        <ul>
            <? foreach ($results as $result): ?>
                <li class="screening_list">
                    <a href="<? PATH; ?>/diagnose/<?= $result['alias']; ?>"><?= $result['arm_title']; ?></a>
                </li>

            <? endforeach; ?>

        </ul>
    </div>

<? endif; ?>