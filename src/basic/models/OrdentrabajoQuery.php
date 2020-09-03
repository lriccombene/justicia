<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ordentrabajo]].
 *
 * @see Ordentrabajo
 */
class OrdentrabajoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ordentrabajo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ordentrabajo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
