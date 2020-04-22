<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%documents}}`.
 */
class m200422_084952_create_documents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'label' => $this->string()->notNull(),
            'file' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->null(),
            'status' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%document}}');
    }
}
