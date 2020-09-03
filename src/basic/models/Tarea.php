<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarea".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Ordentrabajo[] $ordentrabajos
 */
class Tarea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tarea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Ordentrabajos]].
     *
     * @return \yii\db\ActiveQuery|OrdentrabajoQuery
     */
    public function getOrdentrabajos()
    {
        return $this->hasMany(Ordentrabajo::className(), ['id_tarea' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TareaQuery(get_called_class());
    }
}
