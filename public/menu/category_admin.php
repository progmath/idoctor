<?php
$parent = isset($exam['childs']);
if (!$parent) {

    $delete = '  <a href="' . ADMIN . '/exam/delete?id=' . $id . '" class="delete"><i class="fa fa-fw fa-close text-danger"></i></a>';
} else {
    $delete = '<i class="fa fa-fw fa-close"></i>';
}
?>

<p class="item-p " <?php if (!$exam['parent_id']) echo 'id="parent_category"'; ?> >

    <a class="list-group-item treeview" href="<?= ADMIN; ?>/exam/edit?id=<?= $id; ?>"><?= $exam['arm_title']; ?></a>
    <span><?= $delete; ?></span>
</p>

<?php if ($parent): ?>
    <div class="list-group">
        <?= $this->getMenuHtml($exam['childs']); ?>
    </div>
<?php endif; ?>
