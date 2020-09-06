<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsable".
 *
 * @property int $id
 * @property int $id_ordentrabrajo
 * @property int $id_usuario
 *
 * @property Ordentrabajo $ordentrabrajo
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
            [['id_ordentrabrajo', 'id_usuario'], 'required'],
            [['id_ordentrabrajo', 'id_usuario'], 'default', 'value' => null],
            [['id_ordentrabrajo', 'id_usuario'], 'integer'],
            [['id_ordentrabrajo'], 'exist', 'skipOnError' => true, 'targetClass' => Ordentrabajo::className(), 'targetAttribute' => ['id_ordentrabrajo' => 'id']],
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
            'id_ordentrabrajo' => 'Id Ordentrabrajo',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * Gets query for [[Ordentrabrajo]].
     *
     * @return \yii\db\ActiveQuery|OrdentrabajoQuery
     */
    public function getOrdentrabrajo()
    {
        return $this->hasOne(Ordentrabajo::className(), ['id' => 'id_ordentrabrajo']);
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
