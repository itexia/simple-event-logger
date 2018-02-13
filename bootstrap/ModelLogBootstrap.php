<?php namespace frmaxm\logger\bootstrap;
/**
 * @author mFrolov <frmaxm@gmail.com>
 * Date: 16.02.17
 */

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\db\ActiveRecord;
use frmaxm\logger\common\models\EventLog;


class ModelLogBootstrap implements BootstrapInterface
{
	public $category = 'admin';

	public function log($model,$changedAttributes,$type)
	{
		try {
			if(!Yii::$app->user->isGuest){
				(new EventLog())->make($type, Yii::$app->request, Yii::$app->user->id, $model, $changedAttributes, $this->category, \Yii::$app->request->userIP);
			}

		}catch(\Exception $ex){}
	}

	public function bootstrap($app)
	{
		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_UPDATE, function ($event) {
			$this->log($event->sender,$event->changedAttributes,$event->name);
		});

		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_INSERT, function ($event) {
			$this->log($event->sender,$event->changedAttributes,$event->name);
		});

		Event::on(ActiveRecord::className(), ActiveRecord::EVENT_AFTER_DELETE, function ($event) {
			$this->log($event->sender,$event->changedAttributes,$event->name);
		});
	}

}
