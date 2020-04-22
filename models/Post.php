<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 * @property string $title
 *
 * @property User $user
 * @property PostDocuments[] $postDocuments
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'content', 'title'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['content'], 'string', 'max' => 500],
            [['title'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[PostDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostDocuments()
    {
        return $this->hasMany(PostDocuments::className(), ['post_id' => 'id']);
    }
}
