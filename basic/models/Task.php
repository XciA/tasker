<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property string $id
 * @property string $title
 * @property string $priority
 * @property string $status
 * @property integer $deleted
 * @property string $created_at
 * @property string $modified_at
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['priority', 'status'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

	/**
	 * @inheritdoc
	 */
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			$this->user_id = Yii::$app->user->id;
			return true;
		} else {
			return false;
		}
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'priority' => 'Priority',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }
}
