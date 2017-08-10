<?php

use yii\db\Migration;

class m170810_195625_change_service_category extends Migration
{
    private $category_table = "{{%service_category}}";
    private $column_name = "defect_id";
    private $defect_table = "{{%defect}}";
    private $fk_name = "{{%fk_servicecat_defect}}";

    public function safeUp()
    {
        $this->addColumn($this->category_table, $this->column_name, $this->integer()->comment("описание|дефектовка"));
        $this->addForeignKey($this->fk_name, $this->category_table, $this->column_name, $this->defect_table, "id", null, 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey($this->fk_name, $this->category_table);
        $this->dropColumn($this->category_table, $this->column_name);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170810_195625_change_service_category cannot be reverted.\n";

        return false;
    }
    */
}
