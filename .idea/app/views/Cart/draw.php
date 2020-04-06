<!--start-breadcrumbs-->

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Cart</li>
            </ol>
        </div>
    </div>
</div>
<? if(isset($cart_products)):?>
<!--end-breadcrumbs-->
<!--start-ckeckout-->
<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>CHECKOUT</h2>
        </div>
        <div class="ckeckout-top">
            <div class="cart-items">
                <h3>My Shopping Bag (3)</h3>
                <script>$(document).ready(function(c) {
                        $('.close1').on('click', function(c){
                            $('.cart-header').fadeOut('slow', function(c){
                                $('.cart-header').remove();
                            });
                        });
                    });
                </script>
                <script>$(document).ready(function(c) {
                        $('.close2').on('click', function(c){
                            $('.cart-header1').fadeOut('slow', function(c){
                                $('.cart-header1').remove();
                            });
                        });
                    });
                </script>
                <script>$(document).ready(function(c) {
                        $('.close3').on('click', function(c){
                            $('.cart-header2').fadeOut('slow', function(c){
                                $('.cart-header2').remove();
                            });
                        });
                    });
                </script>

                <div class="in-check" >
                    <ul class="unit">
                        <li><span>Item</span></li>
                        <li><span>Product Name</span></li>
                        <li><span>Quantity</span></li>
                        <li><span>Unit Price</span></li>
                        <li><span>Delivery Details</span></li>
                        <li> </li>
                        <div class="clearfix"> </div>
                    </ul>

                    <?php $curr = \PM_Engine\App::$app->getProperty('currency');/*debug($curr);*/?>
                    <?foreach ($cart_products as $id=>$item):?>

                    <ul class="cart-header">
                        <div class="close1"> </div>
                        <li class="ring-in"><a href="product/<?= $item['alias'];?>" ><img src="/images/<?= $item['img']?>" class="img-responsive" alt=""></a>
                        </li>
                        <li><span class="name"><?= $item['title'];?></span></li>
                        <li><span class="name"><?= $item['qty'];?></span></li>
                        <li><span class="cost"><?=$curr['symbol_left'];?><?= $item['price'] * $curr['value'];?><?=$curr['symbol_right'];?></span>
                            <?php if ($item['old_price']):?>
                                <del id="base-old-price" data-base="<?=$item['old_price'] * $curr['value']; ?>"><?=$curr['symbol_left'];?><?=$item['old_price'] * $curr['value']; ?><?=$curr['symbol_right'] ?></del>
                            <?endif;?></li>
                        <li>
                        <li><span>Free</span>
                            <p>Delivered in 2-3 business days</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <?endforeach;?>
                    <!--<ul class=" cart-header1">
                        <div class="close2"> </div>
                        <li class="ring-in"><a href="single.html" ><img src="images/c-2.jpg" class="img-responsive" alt=""></a>
                        </li>
                        <li><span class="name">Analog Watches</span></li>
                        <li><span class="cost">$ 300.00</span></li>
                        <li><span>Free</span>
                            <p>Delivered in 2-3 business days</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="cart-header2">
                        <div class="close3"> </div>
                        <li class="ring-in"><a href="single.html" ><img src="images/c-3.jpg" class="img-responsive" alt=""></a>
                        </li>
                        <li><span class="name">Analog Watches</span></li>
                        <li><span class="cost">$ 360.00</span></li>
                        <li><span>Free</span>
                            <p>Delivered in 2-3 business days</p></li>
                        <div class="clearfix"> </div>
                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?else:?>
<div id="empty_cart">
    <h3>EMPTY CART</h3>
    <img src="/images/cart.jpg" alt="NO IMAGE">
</div>
<?endif;?>
<!--end-ckeckout-->
