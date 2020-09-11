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
        $query->leftJoin( 'tarea', 'ordentrabajo.id_tarea= tarea.id' );
        $query->leftJoin( 'inmueble', 'ordentrabajo.id_inmueble= inmueble.id' );
          $query->innerJoin( 'user', 'public.ordentrabajo.id_supervisor= public.user.id' );
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
            'fecinicio' => $this->fecinicio,
        ]);

        $query->andFilterWhere(['like','inmueble.nombre',$this->inmueble]);
        $query->andFilterWhere(['like','tarea.nombre',$this->tarea]);
        $query->andFilterWhere(['like','public.user.username',$this->supervisor]);
        $query->andFilterWhere(['like','fecinicio',$this->fecinicio]);
        $query->andFilterWhere(['like','descripcion',$this->descripcion]);

        return $dataProvider;
    }
    public function search2($params,$id)
    {
        $query = Ordentrabajo::find();
        $query->leftJoin( 'tarea', 'ordentrabajo.id_tarea= tarea.id' );
        $query->leftJoin( 'inmueble', 'ordentrabajo.id_inmueble= inmueble.id' );
          $query->innerJoin( 'user', 'public.ordentrabajo.id_supervisor= public.user.id' )
                ->leftJoin( 'responsable', 'ordentrabajo.id= responsable.id_ordentrabajo' )
                  ->where(['responsable.id_usuario' => $id])
                  ->all();
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
            'fecinicio' => $this->fecinicio,
        ]);

        $query->andFilterWhere(['like','inmueble.nombre',$this->inmueble]);
        $query->andFilterWhere(['like','tarea.nombre',$this->tarea]);
        $query->andFilterWhere(['like','public.user.username',$this->supervisor]);
        $query->andFilterWhere(['like','fecinicio',$this->fecinicio]);
        $query->andFilterWhere(['like','descripcion',$this->descripcion]);

        return $dataProvider;
    }
}
