$('.delete').click(function(){
    var res = confirm('Confirm Action');
    if(!res) return false;
});

//console.log(window.location.protocol + '//' + window.location.host + window.location.pathname);
$('.sidebar-menu a').each(function(){
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if(link == location){
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});


if ($("#screening").is(':checked')) {
    $("#screening_form").slideDown();
}

$("#screening").click(function () {
    if ($("#screening").is(':checked')) {
        $("#screening_form").slideDown();
    }
    else{
        $("#screening_form").slideUp();
    }
});

if ($("#screening_female").is(':checked')) {
    $("#pregnant").slideDown();
}

$("#screening_female").click(function () {
    if ($("#screening_female").is(':checked')) {
        $("#pregnant").slideDown();
    }
    else{
        $("#pregnant").slideUp();
    }
});

$('.us_r').click(function () {

    var review = parseInt($(this).parent().prev().prev().find("div#star").html());
    var c_id = parseInt($(this).parents().find("input#center_id").val());
   // alert(review);
   // alert(c_id);
    $.ajax({
        url: '/admin/center/review',
        data: {
            review: review,
            c_id:c_id,
        },
        type: 'POST',
        success: function (data) {
            showUserReviews(data);
            //alert(data);
        },
        error: function () {
            alert('Error!');
        }
    });

});


function showUserReviews(res) {
    $("#user_stars").html(res);
}


$( '#editor1' ).ckeditor();
$( '#editor2' ).ckeditor();
$( '#editor3' ).ckeditor();

if($('div').is('#single')) {
    var buttonSingle = $("#single"),
        buttonMulti = $("#multi"),
        file;


    /*var buttonSingle = $("#single"),
        buttonMulti = $("#multi"),
        file;*/
    new AjaxUpload(buttonSingle, {
        action: adminpath + buttonSingle.data('url') + "?upload=1",
        data: {name: buttonSingle.data('name')},
        name: buttonSingle.data('name'),
        onSubmit: function (file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Error! Allowed only images');
                return false;
            }
            buttonSingle.closest('.file-upload').find('.overlay').css({'display': 'block'});

        },
        onComplete: function (file, response) {
            setTimeout(function () {
                buttonSingle.closest('.file-upload').find('.overlay').css({'display': 'none'});

                response = JSON.parse(response);
                $('.' + buttonSingle.data('name')).html('<img src="/images/' + response.file + '" style="max-height: 150px;">');
            }, 1000);
        }
    });

}


