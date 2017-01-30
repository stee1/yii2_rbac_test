<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170130_091832_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'email' => $this->string(100),
            'password' => $this->string(255)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
