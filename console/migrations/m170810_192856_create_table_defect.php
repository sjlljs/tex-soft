<?php

use yii\db\Migration;

class m170810_192856_create_table_defect extends Migration
{
    private $table_name = "{{%defect}}";

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(),
            'pid' => $this->integer()->comment('родительская категория'),
            'name' => $this->string(50)->comment('наименование'),
            'picture' => $this->text()->comment('назв. файла с картинкой'),
            'multi_select' => $this->boolean()->notNull()->defaultValue(0)->comment('мультиселект'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170810_192856_create_table_defect cannot be reverted.\n";

        return false;
    }
    */
}
