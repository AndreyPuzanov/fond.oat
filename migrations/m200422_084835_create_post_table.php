<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m200422_084835_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'content' => $this->string(500)->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->null(),
            'title' => $this->string(100)->notNull(),
        ]);

        $this->createIndex(
            'idx-post-id',
            'post',
            'id'
        );

        $this->addForeignKey(
            'fk-post-user_id',
            'post',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-post-id',
            'post'
        );

        $this->dropForeignKey(
            'fk-post-user_id',
            'post'
        );

        $this->dropTable('{{%post}}');
    }
}
