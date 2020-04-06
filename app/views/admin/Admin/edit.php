<? $lang =  include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "Edit"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i>  <?=$lang[$code . '_' . "Home"];?></a></li>
        <li><a href="<?=ADMIN;?>/admin">  <?=$lang[$code . '_' . "Admin"];?></a></li>
        <li class="active">  <?=$lang[$code . '_' . "Edit"];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/admin/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="firstname"> <?=$lang[$code . '_' . "Firstname"];?></label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?=h($admin->firstname);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="lastname"> <?=$lang[$code . '_' . "Lastname"];?></label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?=h($admin->lastname);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email"> <?=$lang[$code . '_' . "Email"];?></label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=h($admin->email);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="password"> <?=$lang[$code . '_' . "Password"];?></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="<?=$lang[$code . '_' . "Enter a password if you want to change it"];?>.">
                        </div>

                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$admin->id;?>">
                        <button type="submit" class="btn btn-primary"> <?=$lang[$code . '_' . "Save"];?></button>
                    </div>
                </form>
            </div>


            </div>

        </div>


</section>
<!-- /.content -->