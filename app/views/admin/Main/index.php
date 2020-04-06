<? $lang = include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] :  \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $lang[$code . '_' . "Dashboard"]; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> <?= $lang[$code . '_' . "Home"]; ?> </a> </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $center_count; ?></h3>
                    <p><?= $lang[$code . '_' . "Centers"]; ?></p>
                </div>
                <div class="icon">
                    <i class="fa fa-plus-square"></i>
                </div>
                <a href="<?= ADMIN; ?>/center" class="small-box-footer"><?= $lang[$code . '_' . "Centers List"]; ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $diagnose_count ?></h3>
                    <p><?= $lang[$code . '_' . "Diagnoses"]; ?></p>
                </div>
                <div class="icon">
                    <i class="fa fa-stethoscope"></i>
                </div>
                <a href="<?= ADMIN; ?>/diagnose" class="small-box-footer"><?= $lang[$code . '_' . "Diagnose List"]; ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $user_count; ?></h3>
                    <p><?= $lang[$code . '_' . "Users"]; ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= ADMIN; ?>/user" class="small-box-footer"><?= $lang[$code . '_' . "Users List"]; ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $category_count; ?></h3>
                    <p><?= $lang[$code . '_' . "Categories"]; ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?= ADMIN; ?>/exam" class="small-box-footer"><?= $lang[$code . '_' . "Categories List"]; ?> <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

</section>
<!-- /.content -->