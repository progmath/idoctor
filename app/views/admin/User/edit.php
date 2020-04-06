<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<? $lang = include_once CONF . '/admin_languages.php'; ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?=$lang[$code . '_' . "User"];?> №<?=$user['id'];?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i>  <?=$lang[$code . '_' . "Home"];?></a></li>
        <li><a href="<?=ADMIN;?>/user"> <?=$lang[$code . '_' . "Users List"];?></a></li>
        <li class="active"> <?=$lang[$code . '_' . "User"];?> №<?=$user['id'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <td><?=$lang[$code . '_' . "User Number"];?></td>
                                <td><?=$user['id'];?></td>
                            </tr>
                            <tr>
                                <td> <?=$lang[$code . '_' . "Firstname"];?></td>
                                <td><?=$user['firstname'];?></td>
                            </tr>
                            <tr>
                                <td> <?=$lang[$code . '_' . "Lastname"];?></td>
                                <td><?=$user['lastname'];?></td>
                            </tr>
                            <tr>
                                <td> <?=$lang[$code . '_' . "Email"];?></td>
                                <td><?=$user['email'];?></td>
                            </tr>
                            <tr>
                                <td><?=$lang[$code . '_' . "Profile Picture"];?></td>
                                <td>
                                    <?if($user['img']):?>
                                        <img src="<?=$user['img'];?>" alt="NO IMAGE" class="user_img">
                                    <?else:?>
                                        <span class="text-red"> <?=$lang[$code . '_' . "User has nor profile picture"];?></span>
                                    <?endif;?>
                                </td>
                            </tr>
                            <tr>
                                <td><?=$lang[$code . '_' . "Profile Link"];?></td>
                                <td><a href="https://www.facebook.com/<?=$user['c_user'];?>" target="_blank"><?=$lang[$code . '_' . "Profile"];?></a></td>
                            </tr>
                            <tr>
                                <td><?=$lang[$code . '_' . "Activity"];?></td>
                                <td>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">

                                            <div class="col-xs-6 col-md-3 text-center">
                                                <input type="text" class="knob" value="<?=count($user_reviews);?>" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true">

                                                <div class="knob-label"><?=$lang[$code . '_' . "Count of reviews"];?></div>
                                            </div>
                                            <div class="col-xs-6 col-md-3 text-center">
                                                <input type="text" class="knob" value="<?=count($user_comments);?>" data-width="90" data-height="90" data-fgColor="#00a65a" data-readonly="true">

                                                <div class="knob-label"><?=$lang[$code . '_' . "Count of comments"];?></div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                  </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <?if($user_reviews):?>
            <h3><?=$lang[$code . '_' . "User Reviews"];?></h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th><?=$lang[$code . '_' . "Center Name"];?></th>
                                <th><?=$lang[$code . '_' . "Reviews"];?></th>
                                <th><?=$lang[$code . '_' . "Time"];?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach($user_reviews as $user_review): ?>
                                <tr>
                                    <td><?=$user_review['en_title'];?></td>
                                    <td><?=$user_review['review'];?></td>
                                    <td><?=$user_review['time_review'];?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <?else:?>
        <h1 class="text-center text-red text-bold"><?=$lang[$code . '_' . "User has no reviews yet"];?>.</h1>
    <?endif;?>

    <?if($user_comments):?>
            <h3><?=$lang[$code . '_' . "Comments"];?></h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th><?=$lang[$code . '_' . "Center Name"];?></th>
                                <th><?=$lang[$code . '_' . "Comments"];?></th>
                                <th><?=$lang[$code . '_' . "Time"];?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach($user_comments as $user_comment): ?>
                                <tr>
                                    <td><?=$user_comment['en_title'];?></td>
                                    <td><?=$user_comment['comment'];?></td>
                                    <td><?=$user_comment['time_comment'];?></td>
                                    <td> <a title="delete" class="delete" href="<?=ADMIN;?>/user/delete?id=<?=$user_comment['id'];?>">
                                            <i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <?else:?>
        <h1 class="text-center text-red "><?=$lang[$code . '_' . "User has no comments yet"];?>.</h1>
    <?endif;?>
        </div>
    </div>

</section>
<!-- /.content -->


