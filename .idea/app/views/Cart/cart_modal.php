<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id=>$item):?>
                <tr>
                    <td>
                        <a href="product/<?= $item['alias']; ?>">
                            <img src="images/<?= $item['img']; ?>" alt="<?= $item['title']; ?>">
                        </a>
                    </td>
                    <td>
                        <a href="product/<?= $item['alias']; ?>">
                            <?= $item['title'];?>
                        </a>
                    </td>
                    <td>
                        <!-- <div  class="quantity">-->
                        <input type="number" size="4" value="<?= $item['qty'];?>" name="quantity" min="1" step="1" class="qty_product" data-qty = "<?= $item['qty']?>">
                        <!--  </div>-->
                    </td>
                    <td>
                        <?= $_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right'];?>
                    </td>
                    <td>
                        <span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item"  aria-hidden="true"></span>
                    </td>
                </tr>
            <?endforeach;?>
                <tr>
                    <td>Total:</td>
                    <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty'];?></td>
                </tr>
                <tr>
                    <td>Total Sum:</td>
                    <td colspan="4" class="text-right cart-sum">
                        <?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php else:?>
    <h3>Empty Cart</h3>
<?php endif;?>
