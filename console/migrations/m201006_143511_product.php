<?php

use yii\db\Migration;

/**
 * Class m201006_143511_product
 */
class m201006_143511_product extends Migration
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

        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'status' => $this->boolean()->defaultValue(null)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'article' => $this->string(100)->notNull(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201006_143511_product cannot be reverted.\n";

        return false;
    }
    */
}
