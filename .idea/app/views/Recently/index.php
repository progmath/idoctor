<?php $curr = \PM_Engine\App::$app->getProperty('currency');/*debug($curr);*/
$cats = \PM_Engine\App::$app->getProperty('cats');
if($recentlyViewed):?>
    <div class="latestproducts">
        <div class="product-one">
            <h2 style="text-align: center;margin-bottom: 55px;color:red;">Recently Viewed  Products:</h2>
            <?php foreach ($recentlyViewed as $item):?>
                <div class="col-md-4 product-left p-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="product/<?= $item['alias']; ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item['img']; ?>" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="product/<?= $item['alias']; ?>"><?= $item['title']; ?></a><!--Smart Watches--></h3>
                            <p>Explore Now</p>
                            <h4><a class="add-to-cart-link item_add" href="cart/add?=<?= $item['id']; ?>" data-id="<?= $item['id']; ?>"><i></i></a>
                                <span class="item_price"><?=$curr['symbol_left']; ?> <?=$item['price'] * $curr['value']; ?><?=$curr['symbol_right']; ?><!--$ 329--></span>
                                <?php if ($item['old_price']):?> <!--$item['old_price']-->
                                    <del><?=$curr['symbol_left'];?><?=$item['old_price'] * $curr['value']; ?><?=$curr['symbol_right'] ?></del>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="srch">
                            <span>-50%</span>
                        </div>
                    </div>
                </div>
            <?php  endforeach; ?>


            <div class="clearfix"></div>
        </div>
    </div>
<?php endif;?>