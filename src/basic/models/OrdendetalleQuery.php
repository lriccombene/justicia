<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ordendetalle]].
 *
 * @see Ordendetalle
 */
class OrdendetalleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ordendetalle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ordendetalle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
