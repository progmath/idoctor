$('.ratings_stars').click(function () {
    var rate = parseInt($(this).attr("id"));
    var p_id = parseInt($('.movie_choice').data('id'));
    var review = ("#review_"  + rate).toString();
    // alert(rate);
    $.ajax({
        url:'/rate',
        data:{rate:rate,p_id:p_id},
        type:'GET',
        success:function(res) {
            //showCart(res);
            // showCart(res);
            //alert(res);
            //$user_rate = $(review).text();
            //$(review).text(++$user_rate);
            showRatingResults(res);
        },
        error:function () {
            alert('Error!');
        }
    });

});


function showRatingResults(data) {
    $("#star_rating").html(data);
}