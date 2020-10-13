<?php

namespace app\modules\category\controllers;

use common\models\search\ProductSearch;
use yii\web\Controller;

/**
 * Default controller for the `category` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
