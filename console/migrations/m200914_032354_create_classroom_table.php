<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%classroom}}`.
 */
class m200914_032354_create_classroom_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%classroom}}', [
            '_id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%classroom}}');
    }
}
