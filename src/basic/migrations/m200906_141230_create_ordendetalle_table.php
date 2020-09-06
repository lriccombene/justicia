<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ordendetalle}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tipoestado}}`
 * - `{{%user}}`
 * - `{{%ordentrabajo}}`
 */
class m200906_141230_create_ordendetalle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ordendetalle}}', [
            'id' => $this->primaryKey(),
            'id_tipoestado' => $this->integer()->notNull(),
            'id_usuario' => $this->integer()->notNull(),
            'fecinicio' => $this->date(),
            'fecfinal' => $this->date(),
            'observaciones' => $this->string(),
            'id_ordentrabajo' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_tipoestado`
        $this->createIndex(
            '{{%idx-ordendetalle-id_tipoestado}}',
            '{{%ordendetalle}}',
            'id_tipoestado'
        );

        // add foreign key for table `{{%tipoestado}}`
        $this->addForeignKey(
            '{{%fk-ordendetalle-id_tipoestado}}',
            '{{%ordendetalle}}',
            'id_tipoestado',
            '{{%tipoestado}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_usuario`
        $this->createIndex(
            '{{%idx-ordendetalle-id_usuario}}',
            '{{%ordendetalle}}',
            'id_usuario'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-ordendetalle-id_usuario}}',
            '{{%ordendetalle}}',
            'id_usuario',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_ordentrabajo`
        $this->createIndex(
            '{{%idx-ordendetalle-id_ordentrabajo}}',
            '{{%ordendetalle}}',
            'id_ordentrabajo'
        );

        // add foreign key for table `{{%ordentrabajo}}`
        $this->addForeignKey(
            '{{%fk-ordendetalle-id_ordentrabajo}}',
            '{{%ordendetalle}}',
            'id_ordentrabajo',
            '{{%ordentrabajo}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tipoestado}}`
        $this->dropForeignKey(
            '{{%fk-ordendetalle-id_tipoestado}}',
            '{{%ordendetalle}}'
        );

        // drops index for column `id_tipoestado`
        $this->dropIndex(
            '{{%idx-ordendetalle-id_tipoestado}}',
            '{{%ordendetalle}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-ordendetalle-id_usuario}}',
            '{{%ordendetalle}}'
        );

        // drops index for column `id_usuario`
        $this->dropIndex(
            '{{%idx-ordendetalle-id_usuario}}',
            '{{%ordendetalle}}'
        );

        // drops foreign key for table `{{%ordentrabajo}}`
        $this->dropForeignKey(
            '{{%fk-ordendetalle-id_ordentrabajo}}',
            '{{%ordendetalle}}'
        );

        // drops index for column `id_ordentrabajo`
        $this->dropIndex(
            '{{%idx-ordendetalle-id_ordentrabajo}}',
            '{{%ordendetalle}}'
        );

        $this->dropTable('{{%ordendetalle}}');
    }
}
