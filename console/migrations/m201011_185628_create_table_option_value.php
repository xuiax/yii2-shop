<?php

use yii\db\Migration;

/**
 * Class m201011_185628_create_table_option_value
 */
class m201011_185628_create_table_option_value extends Migration
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

        $this->createTable('option_value', [
            'id' => $this->primaryKey()->unique(),
            'option_id' => $this->integer(),
            'value' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_option_value', 'option_value', 'option_id',
            'option', 'id', 'RESTRICT', 'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('option_value');
    }
}
