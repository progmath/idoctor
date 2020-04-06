<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] :  \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<? $lang = include_once CONF . '/admin_languages.php'; ?>

<? /*debug($user_reviews);debug($user_count);die;*/ ?>
<!-- START CUSTOM TABS -->
<section class="content-header">
    <h2 class="page-header" id="center_header"></h2>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> <?= $lang[$code . '_' . "Home"]; ?></a></li>
        <li><a href="<?=ADMIN;?>/center"><?= $lang[$code . '_' . "Centers List"]; ?></a></li>
        <li class="active"><?= h($center->arm_title); ?></li>
    </ol>
</section>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active col-md-4 tab_item text-center"><a href="#tab_1" data-toggle="tab"><?= $lang[$code . '_' . "Editing"]; ?></a></li>
                <li class="col-md-4 tab_item text-center"><a href="#tab_2" data-toggle="tab"><?= $lang[$code . '_' . "Reviews"]; ?></a></li>
                <li class="col-md-4 tab_item text-center"><a href="#tab_3" data-toggle="tab"><?= $lang[$code . '_' . "Comments"]; ?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            <?= $lang[$code . '_' . "Edit"]; ?>
                        </h1>
                      <!--  <ol class="breadcrumb">
                            <li><a href="<?/*= ADMIN; */?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?/*= ADMIN; */?>/center">Center List</a></li>
                            <li class="active"><?/*= h($center->en_title); */?></li>
                        </ol>-->
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">
                                    <form action="<?= ADMIN; ?>/center/edit" method="post" data-toggle="validator">
                                        <div class="box-body">
                                            <div class="form-group has-feedback">
                                                <label for="arm_title"><?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Armenian"];?> * </label>
                                                <input type="text" name="arm_title" class="form-control" id="arm_title"
                                                       placeholder="<?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Armenian"];?> "
                                                       value="<?= h($center->arm_title); ?>" required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="ru_title"><?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Russian"];?> </label>
                                                <input type="text" name="ru_title" class="form-control" id="ru_title"
                                                       placeholder="<?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Russian"];?> "
                                                       value="<?= h($center->ru_title); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="en_title"><?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "English"];?> </label>
                                                <input type="text" name="en_title" class="form-control" id="en_title"
                                                       placeholder="<?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "English"];?> "
                                                       value="<?= h($center->en_title); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label><?= $lang[$code . '_' . "Type"];?>*</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="hospital" <?php isset($_SESSION['form_data']['type'])&& ($_SESSION['form_data']['type']=="hospital") ? 'selected' : null; ?>>Hospital</option>
                                                    <option value="diagnostic_center"  <?php isset($_SESSION['form_data']['type'])&& ($_SESSION['form_data']['type']=="diagnostic_center") ? 'selected' : null; ?>>Laboratory</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="arm_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "Armenian"];?></label>
                                                <textarea name="arm_content" id="editor1" cols="80" rows="10" ><?= $center->arm_content;?></textarea>

                                            </div>
                                            <div class="form-group ">
                                                <label for="ru_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "Russian"];?></label>
                                                <textarea name="ru_content" id="editor2" cols="80" rows="10"><?= $center->ru_content;?></textarea>

                                            </div>
                                            <div class="form-group ">
                                                <label for="en_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "English"];?></label>
                                                <textarea name="en_content" id="editor3" cols="80" rows="10"><?= $center->en_content;?></textarea>

                                            </div>
                                            <div class="form-group ">
                                                <label for="arm_address"><?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Armenian"];?> </label>
                                                <input type="text" name="arm_address" class="form-control"
                                                       id="arm_address" placeholder="<?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Armenian"];?> "
                                                       value="<?= h($center->arm_address); ?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label for="ru_address"><?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Russian"];?> </label>
                                                <input type="text" name="ru_address" class="form-control"
                                                       id="ru_address" placeholder="<?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Russian"];?> "
                                                       value="<?= h($center->ru_address); ?>">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="en_address"><?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "English"];?> </label>
                                                <input type="text" name="en_address" class="form-control" pattern="[a-zA-Z0-9 /\\@#$%&,.]+"
                                                       id="en_address" placeholder="<?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "English"];?> "
                                                       value="<?= h($center->en_address); ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <label for="email"><?= $lang[$code . '_' . "Email"];?> </label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                       placeholder="<?= $lang[$code . '_' . "Email"];?>" value="<?= h($center->email); ?>"
                                                >

                                            </div>
                                            <div class="form-group">
                                                <label for="phone"><?= $lang[$code . '_' . "Phone"];?></label>
                                                <input type="tel" name="phone" class="form-control" id="phone" pattern="[0-9 /\\+,()&.-]+"
                                                       placeholder="<?= $lang[$code . '_' . "Phone"];?>" value="<?= h($center->phone); ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <div class="col-md-4">
                                                    <div class="box box-danger box-solid file-upload">
                                                        <div class="box-header">
                                                            <h3 class="box-title"><?= $lang[$code . '_' . "Center Image"];?></h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <div id="single" class="btn btn-success" data-url="center/add-image" data-name="single"><?= $lang[$code . '_' . "Choose File"];?></div>
                                                            <p><small><?= $lang[$code . '_' . "Recommended Size"];?>: <?= \PM_Engine\App::$app->getProperty('img_width');?>х <?= \PM_Engine\App::$app->getProperty('img_height');?></small></p>
                                                            <div class="single">
                                                                <?if ($center->img):?>
                                                                    <img src="/images/<?=$center->img;?>" alt="No Image" style="max-height: 150px;">
                                                                <?endif;?>
                                                            </div>
                                                        </div>
                                                        <div class="overlay">
                                                            <i class="fa fa-refresh fa-spin"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="diagnose_prices" <?= $center->diagnose_prices ? 'class="col-md-2"' :'';?>><?= $lang[$code . '_' . "Diagnose Prices file"];?></label>
                                                <input type="file" name="diagnose_prices" id="diagnose_prices" accept="application/pdf" <?= $center->diagnose_prices ? 'class="col-md-6"' :'';?>>
                                                <?if($center->diagnose_prices):?>
                                                    <a href="/upload_prices/<?= $center->diagnose_prices?>" class="btn  btn-info" download><?= $lang[$code . '_' . "File of prices"] . $lang[$code . '_' . "Click to download"];?></a>
                                                <? endif;?>
                                            </div>
                                            <div class="form-group ">
                                                <label>
                                                    <input type="checkbox" name="status" <?=$center->status ? ' checked' : null;?>> <?= $lang[$code . '_' . "Status"];?>
                                                </label>
                                            </div>
                                            <div class="form-group ">
                                                <label for="site_link"><?= $lang[$code . '_' . "Site Link"];?></label>
                                                <input type="text" name="site_link" class="form-control" id="site_link" placeholder="<?= $lang[$code . '_' . "Site Link"];?>" value="<?= h($center->site_link); ?>" >
                                            </div>
                                            <div class="form-group ">
                                                <label for="video"><?= $lang[$code . '_' . "Video"];?></label>
                                                <input type="text" name="video" class="form-control" id="video" placeholder="<?= $lang[$code . '_' . "Video"];?>" value="<?= h($center->video); ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="keywords"><?= $lang[$code . '_' . "Title"];?></label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                       placeholder="<?= $lang[$code . '_' . "Title"];?>" value="<?= h($center->title); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords"><?= $lang[$code . '_' . "Keywords"];?></label>
                                                <input type="text" name="keywords" class="form-control" id="keywords"
                                                       placeholder="<?= $lang[$code . '_' . "Keywords"];?>" value="<?= h($center->keywords); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description"><?= $lang[$code . '_' . "Description"];?></label>
                                                <input type="text" name="description" class="form-control"
                                                       id="description" placeholder="<?= $lang[$code . '_' . "Description"];?>"
                                                       value="<?= h($center->description); ?>">
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <input type="hidden" name="id" value="<?= $center->id; ?>">
                                            <button type="submit" class="btn btn-success"><?= $lang[$code . '_' . "Save"];?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- /.content -->

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="col-md-11 text-center">

                        <div id="star_rating">
                            <p class="text-center"><span class="text-bold "><?= $avg_rate; ?> </span><?= $lang[$code . '_' . "average based on"];?>
                                <span class="text-bold"><?= $user_count; ?> <?= $lang[$code . '_' . "reviews"];?>.</span></p>

                            <? foreach ($user_reviews as $star => $user): ?>
                                <div class="star-row row">
                                    <div class="side" id="star_container">
                                        <div id="star"><?= $star; ?> <?= $lang[$code . '_' . "star"];?></div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-<?= $star; ?>"
                                                 style="width:<?= $user ? count($user) * 100 / $user_count : 0; ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <span class="us_r" id="review_<?= $star ?>"><?= count($user); ?> <?= $lang[$code . '_' . "user"];?></span>
                                    </div>

                                    <input type="hidden" value="<?= $center->id; ?>" id="center_id">
                                </div>
                            <? endforeach; ?>

                        </div>
                        <div id="user_stars">
                        </div>


                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane col-md-11 " id="tab_3">
                    <?if(count($user_comments)):?>
                    <div class="box ">

                        <div class="box-header ui-sortable-handle">

                            <div class="box-tools pull-right" data-toggle="tooltip" title=""
                                 data-original-title="Status"></div>
                        </div>
                        <div class="slimScrollDiv">
                            <div class="box-body chat" id="chat-box">

                                <? foreach ($user_comments as $user_comment): ?>
                                    <div class="item">
                                        <img src="<?= $user_comment['img'] ?>" alt="user image">
                                        <p class="message">
                                            <a href="<?= ADMIN ?>/user/edit?id=<?= $user_comment['user_id']; ?>"
                                               class="name"><?= $user_comment['firstname'] . "  " . $user_comment['lastname']; ?></a>
                                            <?= $user_comment['comment']; ?>

                                            <span class="pull-right"><a title="delete" class="delete" href="<?= ADMIN; ?>/user/delete?id=<?= $user_comment['comment_id']; ?>">
                                                <i class="fa fa-fw fa-close text-danger"></i></a>
                                            </span>
                                        </p>

                                    </div>

                                <? endforeach; ?>


                            </div>
                            <?else:?>
                            <h1 class="text-red text-center"><?= $lang[$code . '_' . "No user commented to this center"];?></h1>
                            <?endif;?>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->


    </div>
    <!-- /.col -->

    <!-- /.row -->
    <!-- END CUSTOM TABS -->




