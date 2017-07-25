<?php

use yii\db\Migration;

class m170725_111205_add_indexes extends Migration
{
    private $user_table="{{%user}}";
    private $shop_table="{{%shop}}";
    private $firm_table="{{%firm}}";


    public function safeUp()
    {
        $this->addForeignKey("{{%fk_user_firm}}",$this->user_table,"firm_id",$this->firm_table,"id",null,'CASCADE');
        $this->addForeignKey("{{%fk_shop_firm}}",$this->shop_table,"firm_id",$this->firm_table,"id",null,'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey("{{%fk_user_firm}}",$this->user_table);
        $this->dropForeignKey("{{%fk_shop_firm}}",$this->shop_table);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170725_111205_add_indexes cannot be reverted.\n";

        return false;
    }
    */
}
