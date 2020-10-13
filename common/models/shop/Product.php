<?php

namespace common\models\shop;

use common\models\option\OptionValue;
use common\models\option\ProductOption;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $article
 *
 * @property Category $category
 * @property ProductOption[] $productOptions
 * @property OptionValue[] $optionValues
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'status', 'created_at', 'updated_at', 'article'], 'required'],
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'article'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'article' => 'Article',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[OptionValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['id' => 'option_value_id'])->viaTable('product_option', ['product_id' => 'id']);
    }
}
