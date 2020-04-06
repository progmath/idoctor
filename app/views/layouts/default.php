<!DOCTYPE html>
<html lang="hy">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <base href="/">
    <?= $this->getMeta(); ?>
    <link rel="stylesheet" href="/files_for_slider/owl.carousel.min.css">
    <link rel="stylesheet" href="/files_for_slider/owl.theme.default.min.css">
    <link rel="stylesheet" href="/modal_window_files/remodal.css">
    <link rel="stylesheet" href="/modal_window_files/remodal-default-theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="/css/checkbox.css">
    <link rel="stylesheet" href="/css/dropdown.css">
    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />
    <!--<link rel="stylesheet" href="/css/nice-select.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>

</head>

<body>
<!--for landscape warning-->
<div class="landscape">
    <h1>The web site is not working in this mode</h1>
</div>
<!--end landscape mode-->
<div class="content <?= $_SERVER['REQUEST_URI'] !== '/' ? "for_labor_page h_height" : '' ?> " <?= $_SERVER['REQUEST_URI'] == '/' ? " style='background-image: url(/Images/background.jpg);'" : '' ?>>
    <? if (strpos($_SERVER['REQUEST_URI'], 'center/index') !== false) : ?>
    <? endif; ?>
    <header <?= $_SERVER['REQUEST_URI'] !== '/' ? "class='header_in '" : "" ?>>

            <div class="for_logo"><a href="<?=PATH;?>"><img src="<?=PATH;?>Images/logo.png" alt="NO IMAGE"></a></div>


        <div <?= $_SERVER['REQUEST_URI'] !== '/' ? "class='for_categories_an menu_color'" : "class='for_categories menu_color'" ?>>
            <?php new \app\widgets\menu\Menu([
                'tpl' => WWW . '/menu/menu.php',
                'container' => 'ul',
                'condition'=>"WHERE parent_id = '0'",
            ]) ?>

        </div>
        <? if ($_SERVER['REQUEST_URI'] !== '/'): ?>
            <span class="butt" id="mobile_butt"><i class="fas fa-align-center" "></i></span>
        <? endif; ?>
    </header>
    <div class="for_categories_an_mob">
        <?php new \app\widgets\menu\Menu([
            'tpl' => WWW . '/menu/cat_mob.php',
            'container' => 'ul',
            'cacheKey'=>'cat_mobile',
            'condition'=>"WHERE parent_id = '0'",
        ]) ?>


    </div>
    <?= $content; ?>

</div>


<script src="/files_for_slider/jquery.min.js"></script>
<!--<script src="/js/nice-select.min.js"></script>-->
<script src="/js/my_modal.js"></script>
<script src="/js/my.js"></script>
<!--<script src="/js/Dropdown.js"></script>-->

<script src="/files_for_slider/owl.carousel.min.js"></script>
<script src="/js/countUp.js"></script>
<script src="/js/my1.js"></script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items: 1,
            center: true,
            nav: false,
            loop: true,
            rewind: true,
            /*  autoplay: true,
              autoplayTimeout: 5000,
              autoplayHoverPause: true,*/
            dots: true,
            dotsEach: true,
            //autoHeight:true,
            margin: 100,
        });
    });
</script>
<script>

       $("#mobile_butt").on("click", function (e) {
           e.preventDefault();
           var x = document.getElementsByClassName('for_categories_an_mob');

           if (x[0].style.display === "block") {

               x[0].style.display = "none";
               $('.for_categories_an_mob ul').css({"display": "none"});
           } else {
               $('.for_categories_an_mob').fadeIn();
               x[0].style.display = "block";

               $('.for_categories_an_mob ul').css({"display": "flex"});

           }

       });

</script>

</body>

</html>