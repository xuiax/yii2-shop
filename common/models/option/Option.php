<?php

namespace common\models\option;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $status
 *
 * @property OptionValue[] $optionValues
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'type'], 'string', 'max' => 50],
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
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[OptionValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptionValues()
    {
        return $this->hasMany(OptionValue::className(), ['option_id' => 'id']);
    }
}
