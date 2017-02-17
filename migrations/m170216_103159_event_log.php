<?php
/**
 * @author: mFrolov <frmaxm@gmail.com>
 *          16.02.17
 */

use yii\db\Migration;
use yii\db\Schema;

class event_log extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%event_log}}', [
            'id' => 'int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'created_at' => Schema::TYPE_TIMESTAMP. ' NULL',
            'updated_at' => Schema::TYPE_TIMESTAMP. ' NULL',
            'type'=>Schema::TYPE_STRING. ' NULL',
            'operation_type'=>Schema::TYPE_STRING. ' NULL',
            'url'=>Schema::TYPE_STRING. ' NULL',
            'user_id'=>Schema::TYPE_INTEGER. '(10) NULL',
            'user_ip'=>Schema::TYPE_STRING.' NULL',
            'body_params'=>Schema::TYPE_TEXT. ' NULL',
            'query_params'=>Schema::TYPE_TEXT. ' NULL',
            'model_class'=>Schema::TYPE_STRING. ' NULL',
            'model_old_attributes'=>Schema::TYPE_TEXT. ' NULL',
            'model_changed_attributes' =>Schema::TYPE_TEXT. ' NULL',
            'text'=>Schema::TYPE_TEXT. ' NULL',

        ], $tableOptions);
    }

    public function down()
    {
        $this->delete('event_log');
    }
}
