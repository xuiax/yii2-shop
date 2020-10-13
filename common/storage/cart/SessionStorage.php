<?php

namespace common\storage\cart;

use frontend\components\Cart;
use yii\base\BaseObject;
use yii\web\Session;

/**
 * Class SessionStorage
 * @package common\storage\cart
 * @property Session $session
 */

class SessionStorage extends BaseObject implements StorageInterface
{
    public $name = 'cart';
    protected $session;

    public function init()
    {
        parent::init();
        $this->session = \Yii::$app->session;
    }

    public function save(Cart $cart)
    {
        $this->session->set($this->name, $cart->getCart());
    }

    /**
     * @return string|null
     */
    public function get(): ?string
    {
        return $this->session->get($this->name) ?? null;
    }

    public function delete()
    {
    }
}