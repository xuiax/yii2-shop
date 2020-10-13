<?php


namespace common\models\search;

use common\models\shop\Product;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{
    public $category_name;

    public function rules()
    {
        return [
            ['category_name', 'safe']
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'name'
        ]);
    }

    public function search(array $params)
    {
        $query = static::find()->joinWith(['category']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'product.name', $this->name])
              ->andFilterWhere(['like', 'category.name', $this->category_name]);

        return $dataProvider;
    }
}