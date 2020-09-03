<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%responsable}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ordentrabajo}}`
 * - `{{%usuario}}`
 */
class m200831_221923_create_responsable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%responsable}}', [
            'id' => $this->primaryKey(),
            'id_ordentrabrajo' => $this->integer()->notNull(),
            'id_usuario' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_ordentrabrajo`
        $this->createIndex(
            '{{%idx-responsable-id_ordentrabrajo}}',
            '{{%responsable}}',
            'id_ordentrabrajo'
        );

        // add foreign key for table `{{%ordentrabajo}}`
        $this->addForeignKey(
            '{{%fk-responsable-id_ordentrabrajo}}',
            '{{%responsable}}',
            'id_ordentrabrajo',
            '{{%ordentrabajo}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_usuario`
        $this->createIndex(
            '{{%idx-responsable-id_usuario}}',
            '{{%responsable}}',
            'id_usuario'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-responsable-id_usuario}}',
            '{{%responsable}}',
            'id_usuario',
            '{{%usuario}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%ordentrabajo}}`
        $this->dropForeignKey(
            '{{%fk-responsable-id_ordentrabrajo}}',
            '{{%responsable}}'
        );

        // drops index for column `id_ordentrabrajo`
        $this->dropIndex(
            '{{%idx-responsable-id_ordentrabrajo}}',
            '{{%responsable}}'
        );

        // drops foreign key for table `{{%usuario}}`
        $this->dropForeignKey(
            '{{%fk-responsable-id_usuario}}',
            '{{%responsable}}'
        );

        // drops index for column `id_usuario`
        $this->dropIndex(
            '{{%idx-responsable-id_usuario}}',
            '{{%responsable}}'
        );

        $this->dropTable('{{%responsable}}');
    }
}
