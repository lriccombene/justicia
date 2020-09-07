<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordentrabajo;

/**
 * OrdentrabajoSearch represents the model behind the search form of `app\models\Ordentrabajo`.
 */
class OrdentrabajoSearch extends Ordentrabajo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_supervisor', 'id_inmueble', 'id_tarea'], 'integer'],
            [['nro', 'fecinicio', 'descripcion', 'archivo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ordentrabajo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_supervisor' => $this->id_supervisor,
            'id_inmueble' => $this->id_inmueble,
            'id_tarea' => $this->id_tarea,
            'fecinicio' => $this->fecinicio,
        ]);

        $query->andFilterWhere(['ilike', 'nro', $this->nro])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'archivo', $this->archivo]);

        return $dataProvider;
    }
}
