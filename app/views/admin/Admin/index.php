<? $lang = include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "Admin"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i>  <?=$lang[$code . '_' . "Home"];?></a></li>
        <li class="active">  <?=$lang[$code . '_' . "Admin"];?></li>
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
                                <th> <?=$lang[$code . '_' . "ID"];?></th>
                                <th> <?=$lang[$code . '_' . "Firstname"];?></th>
                                <th> <?=$lang[$code . '_' . "Lastname"];?></th>
                                <th> <?=$lang[$code . '_' . "Email"];?></th>
                                <th> <?=$lang[$code . '_' . "Action"];?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($admins as $admin): ?>
                                <td><?= $admin->id; ?></td>
                                <td><?= $admin->firstname; ?></td>
                                <td><?= $admin->lastname; ?></td>
                                <td><?= $admin->email; ?></td>

                                <td><a href="<?= ADMIN; ?>/admin/edit?id=<?= $admin->id; ?>"><i
                                                class="fa fa-fw fa-eye"></i></a>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->