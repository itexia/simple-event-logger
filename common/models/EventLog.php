<?php namespace frmaxm\logger\common\models;
/**
 * @author: mFrolov <frmaxm@gmail.com>
 *          16.02.17
 */

use Yii;
use \frmaxm\logger\common\models\base\EventLog as BaseEventLog;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Json;

/**
 * This is the model class for table "event_log".
 */
class EventLog extends BaseEventLog
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function make($type, $request, $user_id, $model, $changedAttributes, $category, $userIP)
    {
        $_log = new EventLog();

        $_log->type = $category;
        $_log->operation_type = $type;
        $_log->url = $request->absoluteUrl;
        $_log->user_id = $user_id;
        $_log->body_params = Json::encode($request->getBodyParams());
        $_log->query_params = Json::encode($request->getQueryParams());
        $_log->model_class = get_class($model);
        $_log->model_old_attributes = Json::encode($changedAttributes);
        $_log->model_changed_attributes = Json::encode($model->getOldAttributes());
        $_log->user_ip = $userIP;

        $_log->setDb();

        if($_log->model_class !== get_class()) {
            return $_log->save();
        }

    }

}
