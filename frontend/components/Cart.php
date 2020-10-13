<?php

namespace frontend\components;

use common\models\PriceInterface;
use yii\base\Component;
use Yii;

/**
 * Class Cart
 * @package frontend\components
 */
class Cart extends Component
{
    public $storage;
    public $itemId = 'id';
    public $itemField = [];
    protected $data = [];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->storage = Yii::createObject($this->storage);
        $this->data = $this->storage->get() ? unserialize($this->storage->get()) : [];
    }

    /**
     * @param PriceInterface $item
     * @param int $quantity
     */
    protected function addItem(PriceInterface $item, int $quantity)
    {
        $product = null;
        $id = $item[$this->itemId];

        if (!isset($this->data[$id])) {
            $this->data[$id] = [
                'quantity' => $quantity,
                'item' => $item,
            ];
        } else {
            $this->addQuantity($this->data[$id]['quantity'] + 1, $id);
        };
    }

    public function addQuantity(int $quantity, int $id)
    {
        $this->data[$id]['quantity'] = $quantity;
    }

    public function add(PriceInterface $product, int $quantity = 1)
    {
        $this->addItem($product, $quantity);
    }

    public function save()
    {
        $this->storage->save($this);
    }

    /**
     * @return string
     */
    public function getCart(): string
    {
        return serialize($this->data);
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->data->count();
    }

    /**
     * @return float|string
     */
    public function getTotal()
    {
        $total = null;

        foreach ($this->data as $product) {
            $total += ($product['item'])->getPrice() * $product['quantity'];
        }

        return $total;
    }
}