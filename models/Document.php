<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $label
 * @property string $file
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $status
 *
 * @property PostDocuments[] $postDocuments
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label', 'file'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['label', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'file' => 'File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[PostDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostDocuments()
    {
        return $this->hasMany(PostDocuments::className(), ['document_id' => 'id']);
    }
}
