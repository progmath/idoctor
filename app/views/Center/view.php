<? if (isset($_SESSION['rate'])) {
    $rate = $_SESSION['rate']['stars'];
    $user_count = $_SESSION['rate']['user_count'];
    $avg_rate = $_SESSION['rate']['avg_rate'];
}; ?>

<div class="inner">
    <p class="gen_tip"><?= $center->arm_title; ?></p>

    <div class="bcontent">
        <div class="t_block">
            <div class="i_ftext">
                <?= $center->arm_content; ?>
            </div>
            <div class="i_stext">
                <div class="p1">
                    <p>Հասցե </p>
                    <?= $center->phone ? "<p>Հեռ. </p>" : '' ?>
                    <?= $center->email ? "<p>Էլ. փոստ </p>" : '' ?>
                    <?= $center->site_link ? "<p>Կայքի հղում </p>" : '' ?>
                    <?= $center->diagnose_prices ? "<p>Ծառայությունների գնացուցակ </p>" : '' ?>

                </div>
                <div class="p2">

                    <p><?= $center->arm_address ?></p>


                    <? if ($center->phone) {
                        if (strchr($center->phone, '&')) {
                            $phone_numbers = explode("&", $center->phone);
                            echo "<p>";
                            foreach ($phone_numbers as $phone_number) {
                                if ($phone_number == end($phone_numbers)) {
                                    echo "<span> $phone_number</span>";
                                } else {
                                    echo "<span> $phone_number</span>" . " / ";
                                }
                            }
                            echo "</p>";
                        } else {
                            echo "<p> $center->phone</p>";
                        }
                    } else {
                        echo "";
                    }

                    ?>


                    <?= $center->email ? "<p> $center->email</p>" : '' ?>
                    <?= $center->site_link ? "<a href='$center->site_link' target='_blank' class='center_link'> $center->site_link</a>" : '' ?>
                    <? if ($center->diagnose_prices): ?>
                        <? $file = explode('.', $center->diagnose_prices);
                        $link = PATH . 'upload_prices/' . $file[0] . '_' . $center->id . '.' . $file[1]; ?>
                        <div class="file_download">
                            <img src="/Images/pdf.jpg" alt="NO IMAGE">
                            <a href="<?= $link ?>" class='center_link' download>Ներբեռնել</a>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>


        <div class="v_block">
            <div id="star_rating">
                <!-- <p>Rate this product</p>-->
                <? if (isset($_SESSION['isset_data'])): ?>
                    <div class='movie_choice' data-id="<?= $center->id; ?>">

                        <div id="r1" class="rate_widget">
                            <div class="star_1 ratings_stars" id="1"></div>
                            <div class="star_2 ratings_stars" id="2"></div>
                            <div class="star_3 ratings_stars" id="3"></div>
                            <div class="star_4 ratings_stars" id="4"></div>
                            <div class="star_5 ratings_stars" id="5"></div>
                        </div>
                    </div>
                <? endif; ?>

                <? /*debug($_SESSION); */ ?>
                <div class="stars_container">
                    <div class="star-ratings-sprite">

                        <span style="width:<?= $avg_rate * 10 / 0.5 ?>%" class="star-ratings-sprite-rating"></span>

                    </div>
                </div>

                <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/<?= $center->video ?>">
                </iframe>

            </div>
        </div>
    </div>


    <div class="for_form form_st">
        <? if (!isset($_SESSION['isset_data'])): ?>
            <div class="inp1 fb_button">
                <i class="fab fa-facebook-square" id="fb_icon"></i>
                <a class="fb_login" href="https://www.facebook.com/v3.2/dialog/oauth?
        client_id=<?= \PM_Engine\App::$app->getProperty('id'); ?>
        &redirect_uri=<?= \PM_Engine\App::$app->getProperty('url') ?>&response_type=code&scope=public_profile,email"
                ">Մուտք գործել</a>

            </div>
        <? endif; ?>
        <? if (isset($_SESSION['comment_success'])): ?>
            <p class="success_message">Շնորհակալություն Ձեր մեկնաբանության համար</p>
        <? endif; ?>


        <form action="<?= PATH ?>/center/comment/<?= $center->alias; ?>" method="post">
            <div class="inp2">
            <textarea name="comment" id="textarea"
                      placeholder="Մեկնաբանություն" <?= !isset($_SESSION['isset_data']) ? "disabled" : ''; ?>></textarea>
            </div>
            <input type="hidden" name="user_id">
            <input type="submit" name="submit" value="ՄԵԿՆԱԲԱՆԵԼ"
                   id="comment_button" <?= !isset($_SESSION['isset_data']) ? 'class="submit_desable"' : 'class="submit_enable"'; ?>>
        </form>

    </div>
    <? if ($comments): ?>
        <h1 class="comments_title">Մեր հաճախորդների կարծիքները</h1>
        <? foreach ($comments as $comment): ?>
            <div class="f_comm">
                <!-- <div class="upp"><p>Անուն</p></div>-->
                <div class="user_pic"><img src="<?= $comment['img']; ?>" alt="NO IMAGE"></div>
                <div class="user_comment_container">
        <span><a href="https://www.facebook.com/<?= $comment['c_user']; ?>"><?= isset($comment['firstname']) ? $comment['firstname'] : '' ?>
                <?= isset($comment['lastname']) ? ' ' . $comment['lastname'] : '' ?></a></span>
                    <div class="ddown"><p><?= $comment['comment']; ?></p></div>
                </div>
            </div>
        <? endforeach; ?>
    <? endif; ?>

    <? unset($_SESSION['comment_success']); ?>

