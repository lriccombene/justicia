<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inmueble".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Ordentrabajo[] $ordentrabajos
 */
class Inmueble extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inmueble';
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
        return $this->hasMany(Ordentrabajo::className(), ['id_inmueble' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return InmuebleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InmuebleQuery(get_called_class());
    }
}
