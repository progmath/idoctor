<!-- Content Header (Page header) -->
<? $lang =  include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : ''; ?>
<section class="content-header">
    <h1>
        <?= $lang[$code . '_' . "Exam List"]; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> <?= $lang[$code . '_' . "Home"]; ?></a></li>
        <li class="active"> <?= $lang[$code . '_' . "Exam List"]; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <!--See widgets/Menu.php-->
                    <?php new \app\widgets\menu\Menu([
                        'tpl' => WWW . '/menu/category_admin.php',
                        'container' => 'div',
                        'cache' => 0,
                        'cacheKey' => 'admin_cat',
                        'class' => 'list-group list-group-root well sidebar-menu tree',
                        'attrs' => [

                            /*'id' => 'accordion',*/
                           'data-widget'=>'tree'
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->