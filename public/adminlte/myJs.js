$("#send_date_ajax").click(function () {
    //alert("OK");
    var date = $("#reservation").val().split('-');
    //var first = date[0].split("/");
    //var second = date[1].split("/");
    //var first_date = (first[2]  + "-" + first[0] + "-" + first[1]);
    //  var s = "2017-02-03";
    //var second_date = (second[2]  + "-" + second[0] + "-" + second[1]);
    var first_month = date[0].split("/")[0];
    var first_day = date[0].split("/")[1];
    var first_year = date[0].split("/")[2];
    var second_month = date[1].split("/")[0];
    var second_day = date[1].split("/")[1];
    var second_year = date[1].split("/")[2];
    $.ajax({
        url: '/admin/order',
        data: {
            first_month: first_month, first_day: first_day, first_year: first_year,
            second_month: second_month, second_day: second_day, second_year: second_year
        },
        type: 'GET',
        success: function (data) {
            showRes(data);
            //alert(data);
        },
        error: function () {
            alert('Error!');
        }
    });

});

function showRes(res) {
    //$("#first").text(res);
//alert(res);
    $("#order_content").html(res);
}


$("#admin_language").on("change", function () {

    var language = $(this).find("input:checked").val();
    $(this).find("input").attr("checked",false);

    $.ajax({
        url: '/admin/language',
        data: {
           admin_language: language
        },
        type: 'GET',
        success: function (data) {
            //alert(data);
            location.reload();

            //alert(data);
        },
        error: function () {
            alert('Error!');
        }
    });

});