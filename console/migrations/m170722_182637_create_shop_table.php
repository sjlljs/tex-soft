<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 */
class m170722_182637_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop', [
            'id' => $this->primaryKey(),
            'firm_id' => $this->integer()->unsigned()->comment('какой фирме принадлежит'),
            'name' => $this->string(100),
            'phone' => $this->text(),
            'address' => $this->text()->comment('Адрес'),
            'ispolnitel' => $this->text(),
            'logo' => $this->text()->comment('путь к логотипу'),
            'firm_name' => $this->string(100),
            'workshop' => $this->boolean()->comment('цех или нет'),
            'master_choice' => $this->boolean()->comment('доступен выбор мастера/нет выбора'),
            'minus_zp' => $this->smallInteger(4)->comment('вычет перед расчетом зарплаты, %'),
            'his_clients' => $this->boolean()->comment('использовать свой список клиентов или общедоступный'),
            'sms' => $this->boolean()->defaultValue(1)->comment('отправлять смс или нет'),
            'active' => $this->boolean()->defaultValue(1)->comment('активен/неактивен'),
            'ticket_type' => $this->smallInteger(4)->comment('тип квитанции'),
            'hurry' => $this->boolean()->defaultValue(1)->comment('брать срочные заказы/не брать'),
            'discount' => $this->boolean()->comment('вводить скидки/нет'),
            'complex' => $this->boolean()->defaultValue(1)->comment('выбор срочности-сложности/нет выбора'),
            'workshop_choice' => $this->boolean()->defaultValue(1)->comment('доступен выбор цеха/нет выбора'),
            'defect' => $this->boolean()->comment('дефектовка'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('время создания'),
            'deleted' => $this->boolean(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop');
    }
}
