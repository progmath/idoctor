<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<? $lang = include_once CONF . '/admin_languages.php'; ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "Diagnose List"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> <?=$lang[$code . '_' . "Home"];?></a></li>
        <li class="active"><?=$lang[$code . '_' . "Diagnose List"];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th><?=$lang[$code . '_' . "ID"];?></th>
                                <th><?=$lang[$code . '_' . "main_title"];?></th>

                                <th><?=$lang[$code . '_' . "Min Price"];?></th>
                                <th><?=$lang[$code . '_' . "Max Price"];?></th>
                                <th><?=$lang[$code . '_' . "Action"];?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($diagnoses as $diagnose): ?>
                                <td><?=$diagnose->id;?></td>
                                <td><?=$diagnose->arm_title;?></td>

                                <td><?=$diagnose->min_price;?></td>
                                <td><?=$diagnose->max_price;?></td>

                                <td><a href="<?=ADMIN;?>/diagnose/edit?id=<?=$diagnose->id;?>"><i class="fa fa-fw fa-eye"></i></a>
                                  <a title="delete" class="delete" href="<?=ADMIN;?>/diagnose/delete?id=<?=$diagnose->id;?>">
                                        <i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($diagnoses);?> <?=$lang[$code . '_' . "Diagnoses"] . $lang[$code . '_' . "From"];?> <?=$count;?><?=$lang[$code . '_' . "from_arm"];?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->