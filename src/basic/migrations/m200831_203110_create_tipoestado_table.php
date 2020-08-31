<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tipoestado}}`.
 */
class m200831_203110_create_tipoestado_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tipoestado}}', [
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
        $this->dropTable('{{%tipoestado}}');
    }
}
