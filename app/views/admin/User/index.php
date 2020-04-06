<? $lang =  include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "Users List"];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i>  <?=$lang[$code . '_' . "Home"];?></a></li>
        <li class="active">  <?=$lang[$code . '_' . "Users List"];?></li>
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
                                <th> <?=$lang[$code . '_' . "Profile Picture"];?></th>
                                <th> <?=$lang[$code . '_' . "Action"];?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <td><?=$user->id;?></td>
                                <td><?=$user->firstname;?></td>
                                <td><?=$user->lastname;?></td>
                                <td><?=$user->email;?></td>

                                <td><?if ($user->img):?>
                                    <img src="<?=$user->img;?>" alt="NO IMAGE" class="user_img">
                                    <?else:?>
                                    <span><?=$lang[$code . '_' . "User has no profile picture"];?>.</span>
                                <?endif;?>
                                </td>
                                <td><a href="<?=ADMIN;?>/user/edit?id=<?=$user->id;?>"><i class="fa fa-fw fa-eye"></i></a>
                                   <!-- <a title="delete" class="delete" href="<?/*=ADMIN;*/?>/user/delete?id=<?/*=$user->id;*/?>">
                                        <i class="fa fa-fw fa-close text-danger"></i></a>--></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($users);?> <?=$lang[$code . '_' . "Users"];?><?=$lang[$code . '_' . "From"];?> <?=$count;?> <?=$lang[$code . '_' . "from_arm"];?>)</p>
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