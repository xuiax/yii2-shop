<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="col-lg-4 col-sm-6">
    <div class="single-product">
        <!-- Product Image Start -->
        <div class="pro-img">
            <a href="product.html">
                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
            </a>
        </div>
        <!-- Product Image End -->
        <!-- Product Content Start -->
        <div class="pro-content">
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <h4><a href="product.html"><?= $model->name ?></a></h4>
            <p><span class="price">$30.00</span>
                <del class="prev-price">$32.00</del>
            </p>
            <div class="pro-actions">
                <div class="actions-secondary">
                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i
                                class="fa fa-heart"></i></a>
                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                </div>
            </div>
        </div>
        <!-- Product Content End -->
    </div>
</div>