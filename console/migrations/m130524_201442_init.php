<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'firstname' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'sid' => $this->string()->notNull(),
            'exp' => $this->integer()->notNull(),
            'role' => $this->integer()->notNull(),
            'phone' => $this->string()->notNull(),


            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer(10)->notNull(),
            'updated_at' => $this->integer(10)->notNull(),
        ], $tableOptions);
        // $this->addForeignKey('FK_USER_CLASSROOM', '{{%user}}', '[[classroom]]', '{{%classroom}}', '[[_id]]');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
