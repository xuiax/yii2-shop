<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Buy extends Widget
{
    public $options = [];
    public $product_id;
    public $tag = 'button';
    public $content;

    public function init()
    {
        parent::init();
        if (empty($this->options)) {
            $this->options = [
                'class' => 'btn btn-primary add_cart',
            ];
        }
        $this->options['data-product-add'] = $this->product_id;
    }

    public function run()
    {
        echo Html::tag($this->tag, $this->content, $this->options);
    }
}