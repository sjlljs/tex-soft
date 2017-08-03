<?php

use yii\db\Migration;

class m170803_174735_create_table_service_cat extends Migration
{
    private $table_name = '{{%service_category}}';
    private $shop_table = "{{%shop}}";
    private $firm_table = "{{%firm}}";

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'pid' => $this->integer()->defaultValue(0)->comment('подкатегории'),
            'firm_id' => $this->integer()->comment('id фирмы'),
            'shop_id' => $this->integer()->comment('id точки'),
            'name' => $this->string(50)->comment('название'),
            'num' => $this->smallInteger()->unsigned()->defaultValue(65000)->comment('порядок/позиция в списке'),
            'nalog_type' => $this->smallInteger(2)->unsigned()->comment('тип надогообложения'),
            'picture' => $this->text()->comment('картинка'),
            'del' => $this->boolean()->comment('удалена'),
            'active' => $this->boolean()->defaultValue(1)->comment('активна/неактивна'),
        ], $tableOptions);

        $this->addForeignKey("{{%fk_service_firm}}", $this->table_name, 'firm_id', $this->firm_table, "id", null, 'CASCADE');
        $this->addForeignKey("{{%fk_service_shop}}", $this->table_name, 'shop_id', $this->shop_table, "id", null, 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey("{{%fk_service_shop}}", $this->table_name);
        $this->dropForeignKey("{{%fk_service_firm}}", $this->table_name);
        $this->dropTable($this->table_name);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_174735_create_table_service_cat cannot be reverted.\n";

        return false;
    }
    */
}
