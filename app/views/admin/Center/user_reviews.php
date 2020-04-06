<? $code = isset($_SESSION['lang']) ? $_SESSION['lang'] : ''; ?>
<? $lang = include_once CONF . '/admin_languages.php'; ?>
<? if (isset($_SESSION['star_reviews'])) {
    $star_reviews = $_SESSION['star_reviews'];

}; ?>
<?if (count($_SESSION['star_reviews'])):?>
<h3>User Reviews</h3>
<div class="box">
    <div class="box-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th>Profile</th>
                    <th>FirstName</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Review</th>
                    <th>View Page</th>
                </tr>
                </thead>
                <tbody>
                <?php $qty = 0;
                foreach ($star_reviews as $user): ?>
                    <tr>
                        <td><?if ($user['img']):?><img src="<?= $user['img']; ?>" alt="NO IMAGE" class="user_img"> <?else:?>User has no profile picture<?endif;?></td>
                        <td><?= $user['firstname']; ?></td>
                        <td><?= $user['lastname']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['review']; ?></td>
                        <td><a href="<?= ADMIN; ?>/user/edit?id=<?= $user['user_id'] ?>"><i class="fa fa-fw fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <?else:?>
       <h1 class="text-red">Nobody rated for that star yet.</h1>
        <?endif;?>
    </div>
</div>