<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%responsable}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%ordentrabajo}}`
 * - `{{%user}}`
 */
class m200906_231812_create_responsable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%responsable}}', [
            'id' => $this->primaryKey(),
            'id_ordentrabajo' => $this->integer()->notNull(),
            'id_usuario' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_ordentrabajo`
        $this->createIndex(
            '{{%idx-responsable-id_ordentrabajo}}',
            '{{%responsable}}',
            'id_ordentrabajo'
        );

        // add foreign key for table `{{%ordentrabajo}}`
        $this->addForeignKey(
            '{{%fk-responsable-id_ordentrabajo}}',
            '{{%responsable}}',
            'id_ordentrabajo',
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

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-responsable-id_usuario}}',
            '{{%responsable}}',
            'id_usuario',
            '{{%user}}',
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
            '{{%fk-responsable-id_ordentrabajo}}',
            '{{%responsable}}'
        );

        // drops index for column `id_ordentrabajo`
        $this->dropIndex(
            '{{%idx-responsable-id_ordentrabajo}}',
            '{{%responsable}}'
        );

        // drops foreign key for table `{{%user}}`
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
