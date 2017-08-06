<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service`.
 */
class m170804_192333_create_service_table extends Migration
{
    private $table_name = '{{%service}}';
    private $category_table = "{{%service_category}}";
    private $fk_category = "{{%fk_service_category}}";

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'name' => $this->string(250)->comment("название"),
            'category_id' => $this->integer()->comment('id категории'),
            'base_cost' => $this->integer()->unsigned()->comment("базовая цена"),
            'barcode' => $this->string(50)->comment('штрих-код'),
            'unit' => $this->string(10)->comment('единицы измерения'),
            'time' => $this->smallInteger(3)->unsigned()->comment('время исполнения'),
            'ticket' => $this->smallInteger(4)->defaultValue(2)->comment('тип квитанции-предупр.о последствиях'),
            'hint' => $this->string(30)->comment('подсказка'),
            'num' => $this->smallInteger()->unsigned()->defaultValue(65000)->comment("порядок"),
            'fixed' => $this->boolean()->comment("зафиксировать цену"),
            'margin' => $this->boolean()->comment("делать наценку"),
            'discount' => $this->boolean()->comment("давать ли скидку"),
            'payment' => $this->integer()->unsigned()->comment('зарплата мастеру'),
            'comment' => $this->text()->comment("комментарий приемщику"),
            'deleted' => $this->boolean()->notNull()->defaultValue(0)->comment('удален'),
        ]);

        $this->addForeignKey($this->fk_category, $this->table_name, 'category_id', $this->category_table, "id", null, 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey($this->fk_category, $this->table_name);
        $this->dropTable($this->table_name);
    }
}
