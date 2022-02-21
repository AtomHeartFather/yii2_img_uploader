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
        $this->createTable('media', [
            'id' => $this->primaryKey(),
            'filename' => $this->text(),
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
