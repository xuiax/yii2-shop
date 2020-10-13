<?php


namespace app\modules\category\controllers;

use common\models\search\ProductSearch;
use common\models\shop\Category;
use yii\web\Controller;
use Yii;

class GetController extends Controller
{

    public function actionIndex()
    {
        $category = Category::find()->where(['id' => (int) 1])->one();
        var_dump($category); die;
//            $searchModel = new ProductSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//            return $this->render('index', [
//                'title' => $category->one()->name,
//                'dataProvider' => $dataProvider,
//                'searchModel' => $searchModel
//            ]);
    }
}