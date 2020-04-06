//$( document ).ready(function() {

if ($('.b_sqrining').is(':visible')) {

    $('.b_sqrining').attr("id", "myBtn");
    $('.sp_b').removeAttr("id");


}

else {

    $('.sp_b').attr("id", "myBtn");
    $('.b_sqrining').removeAttr("id");

}

window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
if (typeof(btn) != 'undefined' && btn != null && typeof(span) != 'undefined' && span != null)
{
    btn.addEventListener("click",function () {
        modal.style.display = "flex";

    });
    span.addEventListener("click",function () {
        modal.style.display = "none";
    });
}

// When the user clicks on <span> (x), close the modal


// When the user clicks anywhere outside of the modal, close it


//});

$("#male").on("click",function () {

    $('.hdd').slideUp();
});

$("#female").on("click",function () {

    $('.hdd').slideDown();
});



