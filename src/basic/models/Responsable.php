<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsable".
 *
 * @property int $id
 * @property int $id_ordentrabajo
 * @property int $id_usuario
 *
 * @property Ordentrabajo $ordentrabajo
 * @property User $usuario
 */
class Responsable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responsable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ordentrabajo', 'id_usuario'], 'required'],
            [['id_ordentrabajo', 'id_usuario'], 'default', 'value' => null],
            [['id_ordentrabajo', 'id_usuario'], 'integer'],
            [['id_ordentrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => Ordentrabajo::className(), 'targetAttribute' => ['id_ordentrabajo' => 'id']],
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
            'id_ordentrabajo' => 'Id Ordentrabajo',
            'id_usuario' => 'Id Usuario',
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
     * @return ResponsableQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResponsableQuery(get_called_class());
    }
}
