<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service_var`.
 */
class m170823_100535_create_service_var_table extends Migration
{
    private $table_name = '{{%service_var}}';
    private $service_table = '{{%service}}';
    private $fk_name = '{{%fk_var_service}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->comment('id услуги'),
            'pid' => $this->integer()->defaultValue(0)->comment('родительская категория'),
            'name' => $this->string(64)->comment('название'),
            'add_cost' => $this->smallInteger()->notNull()->defaultValue(0)->comment('прибавка к стоимости'),
            'multi_select' => $this->boolean()->notNull()->defaultValue(0)->comment('мультиселект'),
        ]);

        $this->addForeignKey($this->fk_name, $this->table_name, 'service_id', $this->service_table, 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey($this->fk_name, $this->table_name);

        $this->dropTable($this->table_name);
    }
}
