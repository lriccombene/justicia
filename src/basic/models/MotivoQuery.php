<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Motivo]].
 *
 * @see Motivo
 */
class MotivoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Motivo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Motivo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
