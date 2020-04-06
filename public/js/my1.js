//$( document ).ready(function() {


    var hg = $('.choosen_list').outerHeight();




    /*$('.choosen_list').on("click", function (e) {
        e.preventDefault();
        !$('.choosen_list').not(this).each(function () {
            $(this).removeClass('has_clicked');

        });

        $(this).toggleClass('has_clicked');



        $('.choose li').each(function () {
            if ($(this).hasClass('has_clicked')) {
                $(this).next('table').slideDown();
                $(this).next('table').css({"display":"table"});
                $(this).find('img').attr('src','Images/whiteicon.png');
                $(this).find('a').css({"color":"#ffffff"});

            }
            else {
                $(this).next('table').slideUp();
                $(this).find('img').attr('src','Images/blueicon.png');
                $(this).find('a').css({"color":"#453779"});
            }
        });

    });*/

$('.choosen_list').on("click", function (e) {
    e.preventDefault();
    $(this).next('table').css({"display":"table"}).hide();
    !$('.choosen_list').not(this).each(function () {
        $(this).removeClass('has_clicked');

    });

    $(this).toggleClass('has_clicked');

    $('.choose li').each(function () {
        if ($(this).hasClass('has_clicked')) {
           // $(this).next('table').slideDown();
            $(this).next('table').css({"display":"table"}).show();
            $(this).find('img').attr('src','Images/whiteicon.png');
            $(this).find('a').css({"color":"#ffffff"});

        }
        else {
            $(this).next('table').hide();
            $(this).find('img').attr('src','Images/blueicon.png');
            $(this).find('a').css({"color":"#453779"});
        }
    });
});

    $(".screening_list").hover(function () {
        $(this).find("a").css("color","#FFF");
    },function () {
        $(this).find("a").css("color","#453779");
    });

//});

$(".submit_desable").on("click",function () {
    $(this).attr("disabled",true);
});