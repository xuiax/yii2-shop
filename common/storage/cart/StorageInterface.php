<?php

namespace common\storage\cart;

use frontend\components\Cart;

interface StorageInterface
{
    public function save(Cart $cart);

    public function get();

    public function delete();

}