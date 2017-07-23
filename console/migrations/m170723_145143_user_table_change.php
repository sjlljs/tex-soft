<?php

use yii\db\Migration;

class m170723_145143_user_table_change extends Migration
{
    public $table_name = "{{%user}}";

    public function safeUp()
    {
        $this->addColumn($this->table_name,'first_name',$this->string(100)->comment('имя'));
        $this->addColumn($this->table_name,'last_name',$this->string(100)->comment('фамилия'));
        $this->addColumn($this->table_name,'firm_id',$this->integer()->null()->comment('идентификатор фирмы'));
    }

    public function safeDown()
    {
        $this->dropColumn($this->table_name,'first_name');
        $this->dropColumn($this->table_name,'last_name');
        $this->dropColumn($this->table_name,'firm_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170723_145143_user_table_change cannot be reverted.\n";

        return false;
    }
    */
}
