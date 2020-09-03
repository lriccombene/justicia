<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordendetalle".
 *
 * @property int $id
 * @property int $id_tipoestado
 * @property int $id_usuario
 * @property string|null $fecinicio
 * @property string|null $fecfinal
 * @property string|null $observaciones
 *
 * @property Tipoestado $tipoestado
 * @property Usuario $usuario
 * @property Ordentrabajo[] $ordentrabajos
 */
class Ordendetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordendetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipoestado', 'id_usuario'], 'required'],
            [['id_tipoestado', 'id_usuario'], 'default', 'value' => null],
            [['id_tipoestado', 'id_usuario'], 'integer'],
            [['fecinicio', 'fecfinal'], 'safe'],
            [['observaciones'], 'string', 'max' => 255],
            [['id_tipoestado'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoestado::className(), 'targetAttribute' => ['id_tipoestado' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipoestado' => 'Id Tipoestado',
            'id_usuario' => 'Id Usuario',
            'fecinicio' => 'Fecinicio',
            'fecfinal' => 'Fecfinal',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * Gets query for [[Tipoestado]].
     *
     * @return \yii\db\ActiveQuery|TipoestadoQuery
     */
    public function getTipoestado()
    {
        return $this->hasOne(Tipoestado::className(), ['id' => 'id_tipoestado']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
    }

    /**
     * Gets query for [[Ordentrabajos]].
     *
     * @return \yii\db\ActiveQuery|OrdentrabajoQuery
     */
    public function getOrdentrabajos()
    {
        return $this->hasMany(Ordentrabajo::className(), ['id_ordendetalle' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdendetalleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdendetalleQuery(get_called_class());
    }
}
