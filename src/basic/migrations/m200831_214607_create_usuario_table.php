<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usuario}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%rol}}`
 */
class m200831_214607_create_usuario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'name' => $this->string(),
            'password' => $this->string(),
            'id_rol' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
            'id_rol' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_rol`
        $this->createIndex(
            '{{%idx-usuario-id_rol}}',
            '{{%usuario}}',
            'id_rol'
        );

        // add foreign key for table `{{%rol}}`
        $this->addForeignKey(
            '{{%fk-usuario-id_rol}}',
            '{{%usuario}}',
            'id_rol',
            '{{%rol}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%rol}}`
        $this->dropForeignKey(
            '{{%fk-usuario-id_rol}}',
            '{{%usuario}}'
        );

        // drops index for column `id_rol`
        $this->dropIndex(
            '{{%idx-usuario-id_rol}}',
            '{{%usuario}}'
        );

        $this->dropTable('{{%usuario}}');
    }
}
