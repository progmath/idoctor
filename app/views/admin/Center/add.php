<? $lang =  include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] :  \PM_Engine\App::$app->getProperty('admin_default_lang'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $lang[$code . '_' . "New Center"]; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> <?= $lang[$code . '_' . "Home"]; ?></a></li>
        <li><a href="<?=ADMIN;?>/center"><?= $lang[$code . '_' . "Centers List"]; ?></a></li>
        <li class="active"> <?= $lang[$code . '_' . "New Center"]; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/center/add" method="post" data-toggle="validator" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="arm_title"><?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Armenian"];?> *</label>
                            <input type="text" name="arm_title" class="form-control" id="arm_title" placeholder="<?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Armenian"];?> " value="<?= isset($_SESSION['form_data']['arm_title']) ? h($_SESSION['form_data']['arm_title']) : null; ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="ru_title"><?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Russian"];?> </label>
                            <input type="text" name="ru_title" class="form-control" id="ru_title" placeholder="<?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "Russian"];?> " value="<?= isset($_SESSION['form_data']['ru_title']) ? h($_SESSION['form_data']['ru_title']) : null; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="en_title"><?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "English"];?> </label>
                            <input type="text" name="en_title" class="form-control" id="en_title" placeholder="<?= $lang[$code . '_' . "Center Name"] .  $lang[$code . '_' . "English"];?> " value="<?= isset($_SESSION['form_data']['en_title']) ? h($_SESSION['form_data']['en_title']) : null; ?>" >
                        </div>
                        <div class="form-group">
                            <label><?= $lang[$code . '_' . "Type"];?> *</label>
                        <select name="type" id="type" class="form-control">
                            <option value="hospital" <?= isset($_SESSION['form_data']['type'])&& ($_SESSION['form_data']['type']=="hospital") ? 'selected' : null; ?>><?= $lang[$code . '_' . "Hospital"];?></option>
                            <option value="diagnostic_center"  <?= isset($_SESSION['form_data']['type'])&& ($_SESSION['form_data']['type']=="diagnostic_center") ? 'selected' : null; ?>><?= $lang[$code . '_' . "Laboratory"];?></option>
                        </select>
                        </div>
                        <div class="form-group ">
                            <label for="arm_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "Armenian"];?></label>
                            <textarea name="arm_content" id="editor1" cols="80" rows="10" ><?= isset($_SESSION['form_data']['arm_content']) ? $_SESSION['form_data']['arm_content'] : null; ?> </textarea>

                        </div>
                        <div class="form-group ">
                            <label for="ru_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "Russian"];?></label>
                            <textarea name="ru_content" id="editor2" cols="80" rows="10"><?= isset($_SESSION['form_data']['ru_content']) ? $_SESSION['form_data']['ru_content'] : null; ?></textarea>

                        </div>
                        <div class="form-group ">
                            <label for="en_content"><?= $lang[$code . '_' . "Content"] .  $lang[$code . '_' . "English"];?></label>
                            <textarea name="en_content" id="editor3" cols="80" rows="10"><?= isset($_SESSION['form_data']['en_content']) ? $_SESSION['form_data']['en_content'] : null; ?> </textarea>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="arm_address"><?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Armenian"];?> *</label>
                            <input type="text"  name="arm_address" class="form-control" id="arm_address" placeholder="<?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Armenian"];?>" value="<?= isset($_SESSION['form_data']['arm_address']) ? h($_SESSION['form_data']['arm_address']) : null; ?>"  required>

                        </div>
                        <div class="form-group">
                            <label for="ru_address"><?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Russian"];?></label>
                            <input type="text" name="ru_address" class="form-control" id="ru_address" placeholder="<?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "Russian"];?>" value="<?= isset($_SESSION['form_data']['ru_address']) ? h($_SESSION['form_data']['ru_address']) : null; ?>"  >
                        </div>
                        <div class="form-group has-feedback">
                            <label for="en_address"><?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "English"];?></label>
                            <input type="text" name="en_address" pattern="[a-zA-Z0-9 /\\@#$%&,.]+" class="form-control" id="en_address" placeholder="<?= $lang[$code . '_' . "Address"] .  $lang[$code . '_' . "English"];?>" value="<?= isset($_SESSION['form_data']['en_address']) ? h($_SESSION['form_data']['en_address']) : null; ?>" >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="email"><?= $lang[$code . '_' . "Email"];?> </label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="<?= $lang[$code . '_' . "Email"];?>"  value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : null; ?>" >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="phone"><?= $lang[$code . '_' . "Phone"];?>.<?= $lang[$code . '_' . "If the center has more than one phone numbers,separate them with & symbol"];?></label>
                            <input type="tel" name="phone" class="form-control" pattern="[0-9 /\\+,()&.-]+" id="phone" placeholder="Phone" value="<?= isset($_SESSION['form_data']['phone']) ? h($_SESSION['form_data']['phone']) : null; ?>" >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title"><?= $lang[$code . '_' . "Center Image"];?></h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="center/add-image" data-name="single" ><?= $lang[$code . '_' . "Choose File"];?></div>
                                        <p><small><?= $lang[$code . '_' . "Recommended Size"];?>: <?= \PM_Engine\App::$app->getProperty('img_width');?>х <?= \PM_Engine\App::$app->getProperty('img_height');?></small></p>
                                        <div class="single">
                                            <?if(isset($_SESSION['form_data']['img']) && $_SESSION['form_data']['img']):?>
                                                <img src="/images/<?=$_SESSION['form_data']['img']?>" alt="No Image" style="max-height: 150px;">
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
                            <label for="diagnose_prices"><?= $lang[$code . '_' . "Diagnose Prices file"];?></label>
                            <input type="file" name="diagnose_prices" id="diagnose_prices" accept="application/pdf" >

                        </div>
                        <div class="form-group ">
                            <label>
                                <input type="checkbox" name="status"<?= isset($_SESSION['form_data']['status']) && $_SESSION['form_data']['status'] ? "checked" : null; ?>><?= $lang[$code . '_' . "Status"];?>
                            </label>
                        </div>
                        <div class="form-group ">
                            <label for="site_link"><?= $lang[$code . '_' . "Site Link"];?></label>
                            <input type="text" name="site_link" class="form-control" id="site_link" placeholder="<?= $lang[$code . '_' . "Site Link"];?>" value="<?= isset($_SESSION['form_data']['site_link']) ? h($_SESSION['form_data']['site_link']) : null; ?>" >
                        </div>
                        <div class="form-group ">
                            <label for="video"><?= $lang[$code . '_' . "Video"];?></label>
                            <input type="text" name="video" class="form-control" id="video" placeholder="<?= $lang[$code . '_' . "Video"];?>" value="<?= isset($_SESSION['form_data']['video']) ? h($_SESSION['form_data']['video']) : null; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="keywords"><?= $lang[$code . '_' . "Title"];?></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="<?= $lang[$code . '_' . "Title"];?>" value="<?= isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="keywords"><?= $lang[$code . '_' . "Keywords"];?></label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="<?= $lang[$code . '_' . "Keywords"];?>" value="<?= isset($_SESSION['form_data']['keywords']) ? h($_SESSION['form_data']['keywords']) : null; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="description"><?= $lang[$code . '_' . "Description"];?></label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="<?= $lang[$code . '_' . "Description"];?>" value="<?= isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null; ?>" >
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success"><?= $lang[$code . '_' . "Add"];?></button>
                    </div>
                </form>

                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->