<? $lang =  include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $lang[$code . '_' . "Edit"]; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> <?= $lang[$code . '_' . "Home"]; ?></a></li>
        <li><a href="<?=ADMIN;?>/exam"><?= $lang[$code . '_' . "Exam List"]; ?></a></li>
        <li class="active"><?=h($exam->arm_title);?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/exam/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title"><?= $lang[$code . '_' . "Exam Name"] .$lang[$code . '_' . "Armenian"];?> </label>
                            <input type="text" name="arm_title" class="form-control" id="arm_title" placeholder="<?= $lang[$code . '_' . "Exam Name"] .$lang[$code . '_' . "Armenian"]; ?> *" value="<?=h($exam->arm_title);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group ">
                            <label for="title"><?= $lang[$code . '_' . "Exam Name"] .$lang[$code . '_' . "Russian"];?> </label>
                            <input type="text" name="ru_title" class="form-control" id="ru_title" placeholder="<?= $lang[$code . '_' . "Exam Name"] .$lang[$code . '_' . "Russian"];?>" value="<?=h($exam->ru_title);?>">

                        </div>
                        <div class="form-group ">
                            <label for="title"><?= $lang[$code . '_' . "Exam Name"] .$lang[$code . '_' . "English"];?> </label>
                            <input type="text" name="en_title" class="form-control" id="en_title" placeholder="<?= $lang[$code . '_' . "Exam Name"]  .$lang[$code . '_' . "English"]; ?>" value="<?=h($exam->en_title);?>">

                        </div>
                        <div class="form-group">
                            <label for="parent_id"><?= $lang[$code . '_' . "Parent Category"]; ?></label>
                            <? $ind = $lang[$code . '_' . "Independent Category"]; ?>
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'parent_id',
                                    'id' => 'parent_id',
                                ],
                                'prepend' => "<option value='0'>$ind</option>",
                            ]) ?>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title"><?= $lang[$code . '_' . "Image"];?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="exam/add-image" data-name="single"><?= $lang[$code . '_' . "Choose File"];?></div>
                                        <p><small><?= $lang[$code . '_' . "Recommended Size"];?>: <?= \PM_Engine\App::$app->getProperty('img_width');?>х <?= \PM_Engine\App::$app->getProperty('img_height');?></small></p>
                                        <div class="single">
                                            <?if ($exam->img):?>
                                                <img src="/images/<?=$exam->img;?>" alt="No Image" style="max-height: 150px;">
                                            <?endif;?>
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords"><?= $lang[$code . '_' . "Title"];?></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="<?= $lang[$code . '_' . "Title"];?>" value="<?=h($exam->keywords);?>">
                        </div>
                        <div class="form-group">
                            <label for="keywords"><?= $lang[$code . '_' . "Keywords"];?></label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="<?= $lang[$code . '_' . "Keywords"];?>" value="<?=h($exam->keywords);?>">
                        </div>
                        <div class="form-group">
                            <label for="description"><?= $lang[$code . '_' . "Description"];?></label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="<?= $lang[$code . '_' . "Description"];?>" value="<?=h($exam->description);?>">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$exam->id;?>">
                        <button type="submit" class="btn btn-success"><?= $lang[$code . '_' . "Save"];?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->