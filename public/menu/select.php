<?php $parent_id = \PM_Engine\App::$app->getProperty('parent_id');?>

<option value="<?=$id;?>"<?php if($id == $parent_id) echo 'selected';?><? if ((isset($_SESSION['form_data']) && $id == $_SESSION['form_data']['exam_id'])) echo 'selected'?>
   <?php if (!$exam['parent_id']) echo ' class="text-red"'; ?>>

    <?=$tab . $exam['arm_title'];?></option>
<?php if(isset($exam['childs'])): ?>
    <?= $this->getMenuHtml($exam['childs'], '&nbsp;' . $tab. '-') ?>
<?php endif; ?>