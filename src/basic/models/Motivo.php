<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motivo".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Actasinspecion[] $actasinspecions
 */
class Motivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'motivo';
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
     * Gets query for [[Actasinspecions]].
     *
     * @return \yii\db\ActiveQuery|ActasinspecionQuery
     */
    public function getActasinspecions()
    {
        return $this->hasMany(Actasinspecion::className(), ['id_motivo' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MotivoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MotivoQuery(get_called_class());
    }
}
