<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rol}}`.
 */
class m200831_203625_create_rol_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rol}}', [
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
        $this->dropTable('{{%rol}}');
    }
}
