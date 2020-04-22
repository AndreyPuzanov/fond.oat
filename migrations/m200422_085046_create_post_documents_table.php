<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_documents}}`.
 */
class m200422_085046_create_post_documents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_documents}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'document_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-post_document-document_id',
            'post_documents',
            'document_id',
            'document',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-post_document-post_id',
            'post_documents',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-post_document-post_id',
            'post_documents'
        );

        $this->dropForeignKey(
            'fk-post_document-document_id',
            'post_documents'
        );

        $this->dropTable('{{%post_documents}}');
    }
}
