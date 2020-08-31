<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%inmueble}}`.
 */
class m200831_203225_create_inmueble_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%inmueble}}', [
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
        $this->dropTable('{{%inmueble}}');
    }
}
