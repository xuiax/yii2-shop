<?php

use yii\db\Migration;

/**
 * Class m201011_185227_create_table_option
 */
class m201011_185227_create_table_option extends Migration
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

        $this->createTable('option', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'type' => $this->string(50)->notNull(),
            'status' => $this->boolean()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('option');
    }

}
