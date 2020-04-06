<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categories List
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Categories List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body" >
                    <!--See widgets/Menu.php-->
                   <?php new \app\widgets\menu\Menu([
                        'tpl' => WWW . '/menu/category_admin.php',
                        'container' => 'div',
                        'cache' => 0,
                        'cacheKey' => 'ishop_menu',
                        'class' => 'list-group list-group-root well',
                       'id'=>'accordion',
                    ])?>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->