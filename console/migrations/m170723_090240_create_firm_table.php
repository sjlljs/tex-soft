<?php

use yii\db\Migration;

/**
 * Handles the creation of table `firm`.
 */
class m170723_090240_create_firm_table extends Migration
{
    private $table_name='{{%firm}}';
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
            'name' => $this->string(150)->comment('наименование'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('время создания'),
            'deleted' => $this->boolean()->notNull()->defaultValue(0)->comment('удален/не удален'),
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
