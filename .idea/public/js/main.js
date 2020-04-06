/*Cart*/
/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 20,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});

/*Cart Begin*/
    $('.add-to-cart-link').on('click',function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
        var mod = $('.available select').val();

        //console.log(id,qty,mod);


        //send value to server
        $.ajax({
            url:'/cart/add',
            data:{id:id,qty:qty,mod:mod},
            type:'GET',
            success:function (res) {
                showCart(res);
            },
            error:function () {
                alert('Error,Try Later');
            }
        });

    });


///////////////////// CLEAR ITEM ///////////////////////////////


    //Delete Cart Item
    $('#cart .modal-body').on('click', '.del-item', function () {
            var id = $(this).data('id');
            $.ajax({
                url:'/cart/delete',
                data:{id:id},
                type:'GET',
                success:function(res) {
                    showCart(res);
                },
                error:function () {
                    alert('Error!');
                }
            });
    });

/////////////////////////// CLEAR CART //////////////////////////////////////

    //Clear Cart
    function clearCart(){
        $.ajax({
            url:'/cart/clear',
            type:'GET',
            success:function (res) {
                showCart(res);
            },
            error:function () {
                alert('Error!,Try Later');
            }
        });

    }



/////////////////////// SHOW CART /////////////////////////////////////

    //Show Cart
    function showCart(cart){
        //console.log(cart);

        if ($.trim(cart) == '<h3>Empty Cart</h3>'){
            $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display','none');
        }
        else {
            $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display','inline-block');
        }

        $('#cart .modal-body').html(cart);
        $('#cart').modal();

        /////////// For cart modal window || change status with js ///////////////////
        if ($('.cart-sum').text()){
            $('.simpleCart_total').html($('#cart .cart-sum').text());
        }else{
            $('.simpleCart_total').text('Empty Cart');
        }
    }

    /*function getCart(){
        $.ajax({
            url:'/cart/show',
            type:'GET',
            success:function (res) {
                showCart(res);
            },
            error:function () {
                alert('Error,Try Later');
            }
        });
    }*/

////////////////// GET CART ////////////////////////////
    //Get Cart

    $('.box_1>a').on('click',function (e) {
    e.preventDefault();
    $.ajax({
        url:'/cart/show',
        type:'GET',
        success:function (res) {
            showCart(res);
        },
        error:function () {
            alert('Error!,Try Later');
        }
    });

});


/*Cart End*/



$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
    //console.log($(this).val());
});
$('.slct').change(function () {
    var modId = $(this).val();
    var color = $(this).find('option').filter(':selected').data('title');
    var price = $(this).find('option').filter(':selected').data('price');
    var basePrice = $('#base-price').data('base');
    var old_price = $(this).find('option').filter(':selected').data('old-price');
    var base_old_price = $('#base-old-price').data('base');
    //console.log(modId,color,price);

    if (price){
        $('#base-price').text(symbolLeft + price + symbolRight);
        if (old_price) {
            $('#base-old-price').text(symbolLeft + old_price + symbolRight);
        }
        else{
            $('#base-old-price').text("");
        }

    }else{
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
        if (base_old_price) {
            $('#base-old-price').text(symbolLeft + base_old_price + symbolRight);
        }
        else{
            $('#base-old-price').text("");
        }

    }

    //Task: change old price
});


$(document).on('keyup', '.qty_product', function() {
    var q = $(this).val();
    var p_id = $(this).parent().next().next().find("span").data('id');
        $.ajax({
            url:'/cart/change',
            data:{p_id:p_id,q:q},
            type:'GET',
            success:function(res) {
                showCart(res);
            },
            error:function () {
                alert('Error!');
            }
        });


});

$('#language').change(function () {
    window.location = 'language/change?lang=' + $(this).val();
    //console.log($(this).val());
});
