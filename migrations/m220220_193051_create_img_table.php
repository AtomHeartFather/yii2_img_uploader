<?php

use yii\db\Migration;

/**
 * Handles the creation of table `imgs.
 */
class m220220_193051_create_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('imgs', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'uploaded_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('imgs');
    }
}
