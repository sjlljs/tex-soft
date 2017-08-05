<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 */
class m170722_182637_create_shop_table extends Migration
{
    private $table_name = '{{%shop}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'firm_id' => $this->integer()->comment('какой фирме принадлежит'),
            'name' => $this->string(100),
            'phone' => $this->text(),
            'address' => $this->text()->comment('Адрес'),
            'ispolnitel' => $this->text(),
            'logo' => $this->text()->comment('путь к логотипу'),
            'firm_name' => $this->string(100),
            'workshop' => $this->boolean()->notNull()->defaultValue(0)->comment('цех или нет'),
            'master_choice' => $this->boolean()->notNull()->defaultValue(0)->comment('доступен выбор мастера/нет выбора'),
            'minus_zp' => $this->smallInteger(4)->comment('вычет перед расчетом зарплаты, %'),
            'his_clients' => $this->boolean()->notNull()->defaultValue(0)->comment('использовать свой список клиентов или общедоступный'),
            'sms' => $this->boolean()->notNull()->defaultValue(1)->comment('отправлять смс или нет'),
            'active' => $this->boolean()->notNull()->defaultValue(1)->comment('активен/неактивен'),
            'ticket_type' => $this->smallInteger(4)->comment('тип квитанции'),
            'hurry' => $this->boolean()->notNull()->defaultValue(1)->comment('брать срочные заказы/не брать'),
            'discount' => $this->boolean()->notNull()->defaultValue(0)->comment('вводить скидки/нет'),
            'complex' => $this->boolean()->defaultValue(1)->comment('выбор срочности-сложности/нет выбора'),
            'workshop_choice' => $this->boolean()->notNull()->defaultValue(1)->comment('доступен выбор цеха/нет выбора'),
            'defect' => $this->boolean()->notNull()->defaultValue(0)->comment('дефектовка'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('время создания'),
            'deleted' => $this->boolean()->notNull()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->table_name);
    }
}
