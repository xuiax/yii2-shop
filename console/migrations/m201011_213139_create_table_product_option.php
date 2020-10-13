<?php

use yii\db\Migration;

/**
 * Class m201011_213139_create_table_product_option
 */
class m201011_213139_create_table_product_option extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('product_option', [
            'product_id' => $this->integer(),
            'option_value_id' => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_product_option', 'product_option', ['product_id', 'option_value_id']);
        $this->addForeignKey('fk_product_option', 'product_option', 'option_value_id', 'option_value',
        'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_product_option_product', 'product_option', 'product_id',
            'product', 'id', 'RESTRICT', 'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_option');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201011_213139_create_table_product_option cannot be reverted.\n";

        return false;
    }
    */
}
