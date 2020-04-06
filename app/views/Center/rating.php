
<? if (isset($_SESSION['rate'])){
    $rate =  $_SESSION['rate']['stars'];
    $user_count = $_SESSION['rate']['user_count'];
    $avg_rate = $_SESSION['rate']['avg_rate'];
};?>
<?if(isset($_SESSION['warning_message'])):?>
<p class="warning_message"><?= $_SESSION['warning_message'];?></p>
<?else:?>
    <p class="success_message"><?= $_SESSION['success_message'];?></p>
<?endif;?>
<div class="stars_container">
<div class="star-ratings-sprite"><span style="width:<?=$avg_rate * 10 / 0.5?>%" class="star-ratings-sprite-rating"></span></div>
</div>

