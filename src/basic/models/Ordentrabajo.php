<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordentrabajo".
 *
 * @property int $id
 * @property string $nro
 * @property int $id_supervisor
 * @property int $id_inmueble
 * @property int $id_tarea
 * @property string|null $fecinicio
 * @property string|null $descripcion
 * @property string|null $archivo
 *
 * @property Ordendetalle[] $ordendetalles
 * @property Inmueble $inmueble
 * @property Tarea $tarea
 * @property User $supervisor
 * @property Responsable[] $responsables
 */
class Ordentrabajo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordentrabajo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nro', 'id_supervisor', 'id_inmueble', 'id_tarea'], 'required'],
            [['id_supervisor', 'id_inmueble', 'id_tarea'], 'default', 'value' => null],
            [['id_supervisor', 'id_inmueble', 'id_tarea'], 'integer'],
            [['fecinicio'], 'safe'],
            [['nro', 'descripcion', 'archivo'], 'string', 'max' => 255],
            [['id_inmueble'], 'exist', 'skipOnError' => true, 'targetClass' => Inmueble::className(), 'targetAttribute' => ['id_inmueble' => 'id']],
            [['id_tarea'], 'exist', 'skipOnError' => true, 'targetClass' => Tarea::className(), 'targetAttribute' => ['id_tarea' => 'id']],
            [['id_supervisor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_supervisor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro' => 'Nro',
            'id_supervisor' => 'Id Supervisor',
            'id_inmueble' => 'Id Inmueble',
            'id_tarea' => 'Id Tarea',
            'fecinicio' => 'Fecinicio',
            'descripcion' => 'Descripcion',
            'archivo' => 'Archivo',
        ];
    }

    /**
     * Gets query for [[Ordendetalles]].
     *
     * @return \yii\db\ActiveQuery|OrdendetalleQuery
     */
    public function getOrdendetalles()
    {
        return $this->hasMany(Ordendetalle::className(), ['id_ordentrabajo' => 'id']);
    }

    /**
     * Gets query for [[Inmueble]].
     *
     * @return \yii\db\ActiveQuery|InmuebleQuery
     */
    public function getInmueble()
    {
        return $this->hasOne(Inmueble::className(), ['id' => 'id_inmueble']);
    }

    /**
     * Gets query for [[Tarea]].
     *
     * @return \yii\db\ActiveQuery|TareaQuery
     */
    public function getTarea()
    {
        return $this->hasOne(Tarea::className(), ['id' => 'id_tarea']);
    }

    public function getNro()
    {
        return 1111111;
    }
    /**
     * Gets query for [[Supervisor]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getSupervisor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_supervisor']);
    }

    /**
     * Gets query for [[Responsables]].
     *
     * @return \yii\db\ActiveQuery|ResponsableQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsable::className(), ['id_ordentrabrajo' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdentrabajoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdentrabajoQuery(get_called_class());
    }
}
