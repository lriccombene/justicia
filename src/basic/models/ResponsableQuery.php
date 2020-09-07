<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Responsable]].
 *
 * @see Responsable
 */
class ResponsableQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Responsable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Responsable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
