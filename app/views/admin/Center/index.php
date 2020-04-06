<? $lang =  include CONF . '/admin_languages.php'; ?>
<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : ''; ?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> <?= $lang[$code . '_' . "Home"]; ?></a></li>
        <li class="active"> <?= $lang[$code . '_' . "Centers List"]; ?></li>
    </ol>
</section>
<!-- START CUSTOM TABS -->
<h2 class="page-header" id="center_header"></h2>

<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs text-center">
                <li class="active col-md-6" style="margin-right: 0px !important;"><a href="#tab_1" data-toggle="tab"><?= $lang[$code . '_' . "Hospitals"]; ?></a></li>
                <li class="col-md-6" style="margin: 0px !important;"><a href="#tab_2" data-toggle="tab"><?= $lang[$code . '_' . "Laboratories"]; ?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover text-center">
                                                <thead>
                                                <tr>
                                                    <th><?= $lang[$code . '_' . "ID"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "main_title"]; ?></th>

                                                    <th><?= $lang[$code . '_' . "Address"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "Email"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "Phone"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "Action"]; ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($hospitals as $hospital): ?>
                                                    <td><?= $hospital->id; ?></td>
                                                    <td><?= $hospital->arm_title; ?></td>

                                                    <td><?= $hospital->arm_address; ?></td>
                                                    <td><?= $hospital->email; ?></td>
                                                    <td><?= $hospital->phone; ?></td>

                                                    <td><a href="<?= ADMIN; ?>/center/edit?id=<?= $hospital->id; ?>"><i
                                                                    class="fa fa-fw fa-eye"></i></a>
                                                        <a title="delete" class="delete"
                                                           href="<?= ADMIN;?>/center/delete?id=<?= $hospital->id; ?>">
                                                            <i class="fa fa-fw fa-close text-danger"></i></a>
                                                    </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center">
                                            <!--   <p>(<? /*=count($admins);*/ ?> Admins From <? /*=$count;*/ ?>)</p>-->
                                            <!--  <?php /*if($pagination->countPages > 1): */ ?>
                            <? /*=$pagination;*/ ?>
                        --><?php /*endif; */ ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover text-center">
                                                <thead>
                                                <tr>
                                                    <th><?= $lang[$code . '_' . "ID"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "main_title"]; ?></th>

                                                    <th><?= $lang[$code . '_' . "Address"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "Email"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "Phone"]; ?></th>
                                                    <th><?= $lang[$code . '_' . "Action"]; ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($laboratories as $laboratory): ?>
                                                    <td><?= $laboratory->id; ?></td>
                                                    <td><?= $laboratory->arm_title; ?></td>

                                                    <td><?= $laboratory->arm_address; ?></td>
                                                    <td><?= $laboratory->email;?></td>
                                                    <td><?= $laboratory->phone;?></td>
                                                    <td>
                                                        <a href="<?= ADMIN; ?>/center/edit?id=<?= $laboratory->id; ?>"><i
                                                                    class="fa fa-fw fa-eye"></i></a>
                                                        <a title="delete" class="delete"
                                                           href="<?= ADMIN;?>/center/delete?id=<?= $laboratory->id; ?>">
                                                            <i class="fa fa-fw fa-close text-danger"></i></a>
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
                </div>
                <!-- /.tab-pane -->

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




