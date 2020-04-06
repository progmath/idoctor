<?$code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang');?>
<? $lang = include_once CONF . '/admin_languages.php';?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "Delete Cache"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> <?=$lang[$code . '_' . "Home"];?> </a></li>
        <li class="active"> <?=$lang[$code . '_' . "Delete Cache"];?></li>
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
                                <th><?=$lang[$code . '_' . "main_title"];?></th>
                                <th><?=$lang[$code . '_' . "main_description"];?></th>
                                <th><?=$lang[$code . '_' . "Action"];?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?=$lang[$code . '_' . "Cache For Categories"];?></td>
                                <td><?=$lang[$code . '_' . "Menu Category in Site"] .  "  " .$lang[$code . '_'."It'll be cached after  1 hour"];?></td>
                                <td><a class="delete" href="<?=ADMIN;?>/cache/delete?key=category"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->