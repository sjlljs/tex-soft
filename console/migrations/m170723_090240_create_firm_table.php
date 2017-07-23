<?php

use yii\db\Migration;

/**
 * Handles the creation of table `firm`.
 */
class m170723_090240_create_firm_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('firm', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->comment('наименование'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('время создания'),
            'deleted' => $this->boolean()->comment('удален/не удален'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('firm');
    }
}
