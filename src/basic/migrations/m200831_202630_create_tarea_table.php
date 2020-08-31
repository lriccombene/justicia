<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarea}}`.
 */
class m200831_202630_create_tarea_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarea}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'descripcion' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarea}}');
    }
}
