<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoestado".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Ordendetalle[] $ordendetalles
 */
class Tipoestado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoestado';
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
     * Gets query for [[Ordendetalles]].
     *
     * @return \yii\db\ActiveQuery|OrdendetalleQuery
     */
    public function getOrdendetalles()
    {
        return $this->hasMany(Ordendetalle::className(), ['id_tipoestado' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TipoestadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoestadoQuery(get_called_class());
    }
}
