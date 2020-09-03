<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ordentrabajo}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%usuario}}`
 * - `{{%inmueble}}`
 * - `{{%tarea}}`
 * - `{{%ordendetalle}}`
 */
class m200831_220919_create_ordentrabajo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ordentrabajo}}', [
            'id' => $this->primaryKey(),
            'nro' => $this->string()->notNull(),
            'id_supervisor' => $this->integer()->notNull(),
            'id_inmueble' => $this->integer()->notNull(),
            'id_tarea' => $this->integer()->notNull(),
            'fecinicio' => $this->date(),
            'descripcion' => $this->string(),
            'archivo' => $this->string(),
            'id_ordendetalle' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_supervisor`
        $this->createIndex(
            '{{%idx-ordentrabajo-id_supervisor}}',
            '{{%ordentrabajo}}',
            'id_supervisor'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-ordentrabajo-id_supervisor}}',
            '{{%ordentrabajo}}',
            'id_supervisor',
            '{{%usuario}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_inmueble`
        $this->createIndex(
            '{{%idx-ordentrabajo-id_inmueble}}',
            '{{%ordentrabajo}}',
            'id_inmueble'
        );

        // add foreign key for table `{{%inmueble}}`
        $this->addForeignKey(
            '{{%fk-ordentrabajo-id_inmueble}}',
            '{{%ordentrabajo}}',
            'id_inmueble',
            '{{%inmueble}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_tarea`
        $this->createIndex(
            '{{%idx-ordentrabajo-id_tarea}}',
            '{{%ordentrabajo}}',
            'id_tarea'
        );

        // add foreign key for table `{{%tarea}}`
        $this->addForeignKey(
            '{{%fk-ordentrabajo-id_tarea}}',
            '{{%ordentrabajo}}',
            'id_tarea',
            '{{%tarea}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_ordendetalle`
        $this->createIndex(
            '{{%idx-ordentrabajo-id_ordendetalle}}',
            '{{%ordentrabajo}}',
            'id_ordendetalle'
        );

        // add foreign key for table `{{%ordendetalle}}`
        $this->addForeignKey(
            '{{%fk-ordentrabajo-id_ordendetalle}}',
            '{{%ordentrabajo}}',
            'id_ordendetalle',
            '{{%ordendetalle}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%usuario}}`
        $this->dropForeignKey(
            '{{%fk-ordentrabajo-id_supervisor}}',
            '{{%ordentrabajo}}'
        );

        // drops index for column `id_supervisor`
        $this->dropIndex(
            '{{%idx-ordentrabajo-id_supervisor}}',
            '{{%ordentrabajo}}'
        );

        // drops foreign key for table `{{%inmueble}}`
        $this->dropForeignKey(
            '{{%fk-ordentrabajo-id_inmueble}}',
            '{{%ordentrabajo}}'
        );

        // drops index for column `id_inmueble`
        $this->dropIndex(
            '{{%idx-ordentrabajo-id_inmueble}}',
            '{{%ordentrabajo}}'
        );

        // drops foreign key for table `{{%tarea}}`
        $this->dropForeignKey(
            '{{%fk-ordentrabajo-id_tarea}}',
            '{{%ordentrabajo}}'
        );

        // drops index for column `id_tarea`
        $this->dropIndex(
            '{{%idx-ordentrabajo-id_tarea}}',
            '{{%ordentrabajo}}'
        );

        // drops foreign key for table `{{%ordendetalle}}`
        $this->dropForeignKey(
            '{{%fk-ordentrabajo-id_ordendetalle}}',
            '{{%ordentrabajo}}'
        );

        // drops index for column `id_ordendetalle`
        $this->dropIndex(
            '{{%idx-ordentrabajo-id_ordendetalle}}',
            '{{%ordentrabajo}}'
        );

        $this->dropTable('{{%ordentrabajo}}');
    }
}
