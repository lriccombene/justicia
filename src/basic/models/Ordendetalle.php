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
 * @property string|null $horainicio
 * @property string|null $fecfinal
 * @property string|null $horafinal
 * @property string|null $observaciones
 * @property int $id_ordentrabajo
 *
 * @property Ordentrabajo $ordentrabajo
 * @property Tipoestado $tipoestado
 * @property User $usuario
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
            [['id_tipoestado', 'id_usuario', 'id_ordentrabajo'], 'required'],
            [['id_tipoestado', 'id_usuario', 'id_ordentrabajo'], 'default', 'value' => null],
            [['id_tipoestado', 'id_usuario', 'id_ordentrabajo'], 'integer'],
            [['fecinicio', 'horainicio', 'fecfinal', 'horafinal'], 'safe'],
            [['observaciones'], 'string', 'max' => 255],
            [['id_ordentrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => Ordentrabajo::className(), 'targetAttribute' => ['id_ordentrabajo' => 'id']],
            [['id_tipoestado'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoestado::className(), 'targetAttribute' => ['id_tipoestado' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
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
            'horainicio' => 'Horainicio',
            'fecfinal' => 'Fecfinal',
            'horafinal' => 'Horafinal',
            'observaciones' => 'Observaciones',
            'id_ordentrabajo' => 'Id Ordentrabajo',
        ];
    }

    /**
     * Gets query for [[Ordentrabajo]].
     *
     * @return \yii\db\ActiveQuery|OrdentrabajoQuery
     */
    public function getOrdentrabajo()
    {
        return $this->hasOne(Ordentrabajo::className(), ['id' => 'id_ordentrabajo']);
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
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
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
