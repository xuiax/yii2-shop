<?php


namespace frontend\controllers;

use common\models\Product;
use common\models\ShopProduct;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class CartController extends Controller
{
    public function actionAll($request)
    {
        var_dump($request); die;
    }

    public function actionAdd()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $item = json_decode(Yii::$app->request->getRawBody());
        $product = ShopProduct::find()->where(['id' => (int) $item->id]);
        if ($product->exists()) {
            Yii::$app->cart->add($product->one());
            Yii::$app->cart->add($product->one());
            Yii::$app->cart->add($product->one());
        }
    }

    public function actionGet()
    {
        $product = ShopProduct::find()->where(['id' => (int) 1]);
        if ($product->exists()) {
            Yii::$app->cart->add($product->one());
            Yii::$app->cart->save();
            var_dump(Yii::$app->cart->getTotal()); die;
        }
        var_dump('ntr'); die;
    }
}