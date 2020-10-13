<?php

namespace common\models\option;

use common\models\shop\Product;
use Yii;

/**
 * This is the model class for table "product_option".
 *
 * @property int $product_id
 * @property int $option_value_id
 *
 * @property OptionValue $optionValue
 * @property Product $product
 */
class ProductOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'option_value_id'], 'required'],
            [['product_id', 'option_value_id'], 'integer'],
            [['product_id', 'option_value_id'], 'unique', 'targetAttribute' => ['product_id', 'option_value_id']],
            [['option_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => OptionValue::className(), 'targetAttribute' => ['option_value_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'option_value_id' => 'Option Value ID',
        ];
    }

    /**
     * Gets query for [[OptionValue]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValue()
    {
        return $this->hasOne(OptionValue::className(), ['id' => 'option_value_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
