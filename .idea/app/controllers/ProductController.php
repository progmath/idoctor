<?php


namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Product;

class ProductController extends AppController
{
    public function viewAction(){
        //debug($this->route);
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias= ? AND status = '1' ", [$alias]);
        //debug($product);
        if (!$product){
            throw new \Exception( 'Product => ||' . $alias . '||: Not Found');
        }

        //1.Breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);




        //2.recommended(Related) products (связанные товары).
        $related = \R::getAll("SELECT * FROM related_product  JOIN product ON 
                    product.id = related_product.related_id WHERE 
                    related_product.product_id=?",[$product->id]);

        ///debug($related);



        //3.запись в cookie запрошенного товара
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //4.просмотренные товары
        $r_viwed = $p_model->getRecentlyViewed();//it can return empty array
        //debug($r_viwed);
        $recentlyViewed = null;//when cookie is empty
        if ($r_viwed){
            $recentlyViewed = \R::find('product','id IN (' . \R::genSlots($r_viwed)
                . ') LIMIT 3', $r_viwed);
        }
        //debug($recentlyViewed);

        //5.Gallery
        $gallery = \R::findAll('gallery','product_id=?',[$product->id]);
        //debug($gallery);



        //6.модификации

        $mods = \R::findAll('modification', 'product_id=?', [$product->id]);
        //debug($mods);


        $this->setMeta($product->title,$product->description,$product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs','mods')); //send info to product and related view

    }

}