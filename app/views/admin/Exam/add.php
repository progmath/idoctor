<!-- Content Header (Page header) -->
 <?$code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang');?>
<? $lang = include_once CONF . '/admin_languages.php';?>

<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "New Exam"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i><?=$lang[$code . '_' . "Home"];?></a></li>
        <li><a href="<?=ADMIN;?>/exam">  <?=$lang[$code . '_' . "Exam List"];?></a></li>
        <li class="active"> <?=$lang[$code . '_' . "New Exam"];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/exam/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="arm_title"><?=$lang[$code . '_' . "Exam Name"] . $lang[$code . '_' . "Armenian"]; ?></label>
                            <input type="text" name="arm_title" class="form-control" id="arm_title" placeholder="<?=$lang[$code . '_' . "Exam Name"]; ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="ru_title"><?=$lang[$code . '_' . "Exam Name"] . $lang[$code . '_' . "Russian"];; ?></label>
                            <input type="text" name="ru_title" class="form-control" id="ru_title" placeholder="<?=$lang[$code . '_' . "Exam Name"]; ?>"
                        </div>
                        <div class="form-group has-feedback">
                            <label for="en_title"><?=$lang[$code . '_' . "Exam Name"] . $lang[$code . '_' . "English"];; ?></label>
                            <input type="text" name="en_title" class="form-control" id="en_title" placeholder="<?=$lang[$code . '_' . "Exam Name"]; ?>" >
                        </div>
                      <div class="form-group">
                            <label for="parent_id"><?=$lang[$code . '_' . "Parent Category"]; ?></label>
                          <? $ind = $lang[$code . '_' . 'Independent Category'];?>
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
                                            <?if (isset($_SESSION['form_data']['img']) && $_SESSION['form_data']['img']):?>
                                                <img src="/images/<?=$_SESSION['form_data']['img']?>" alt="No Image" style="max-height: 150px;">
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
                            <label for="keywords"><?=$lang[$code . '_' . "Title"]; ?></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="<?=$lang[$code . '_' . "Title"]; ?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="keywords"><?=$lang[$code . '_' . "Keywords"]; ?></label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="<?=$lang[$code . '_' . "Keywords"]; ?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="description"><?=$lang[$code . '_' . "Description"]; ?></label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="<?=$lang[$code . '_' . "Description"]; ?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success"><?=$lang[$code . '_' . "Add Exam"]; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->