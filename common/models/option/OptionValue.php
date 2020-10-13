<?php

namespace common\models\option;

use common\models\shop\Product;
use Yii;

/**
 * This is the model class for table "option_value".
 *
 * @property int $id
 * @property int|null $option_id
 * @property string $value
 *
 * @property Option $option
 * @property ProductOption[] $productOptions
 * @property Product[] $products
 */
class OptionValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_id'], 'integer'],
            [['value'], 'required'],
            [['value'], 'string', 'max' => 255],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'option_id' => 'Option ID',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Option]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['id' => 'option_id']);
    }

    /**
     * Gets query for [[ProductOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['option_value_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('product_option', ['option_value_id' => 'id']);
    }
}
