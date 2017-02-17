<?php namespace frmaxm\logger\common\models\base;
/**
 * @author: mFrolov <frmaxm@gmail.com>
 *          16.02.17
 */

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "event_log".
 *
 * @property string $id
 * @property string $type
 * @property string $operation_type
 * @property string $url
 * @property integer $user_id
 * @property string $body_params
 * @property string $query_params
 * @property string $model_class
 * @property string $model_old_attributes
 * @property string $model_changed_attributes
 * @property string $user_ip
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 * @property string $aliasModel
 */
abstract class EventLog extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_log';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['body_params', 'query_params', 'model_old_attributes', 'model_changed_attributes', 'text'], 'string'],
            [['type', 'operation_type', 'url', 'model_class', 'user_ip'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => 'Type',
            'operation_type' => 'Operation Type',
            'url' => 'Url',
            'user_id' => 'User ID',
            'body_params' => 'Body Params',
            'query_params' => 'Query Params',
            'model_class' => 'Model Class',
            'model_old_attributes' => 'Model Old Attributes',
            'model_changed_attributes' => 'Model Changed Attributes',
            'text' => 'Text',
            'user_ip' => 'User Ip',
        ];
    }
}