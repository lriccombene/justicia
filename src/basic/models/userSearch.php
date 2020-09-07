<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * userSearch represents the model behind the search form of `app\models\User`.
 */
class userSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'flags', 'confirmed_at', 'blocked_at', 'updated_at', 'created_at', 'last_login_at', 'password_changed_at', 'gdpr_consent_date'], 'integer'],
            [['username', 'email', 'password_hash', 'auth_key', 'unconfirmed_email', 'registration_ip', 'auth_tf_key', 'last_login_ip'], 'safe'],
            [['auth_tf_enabled', 'gdpr_consent', 'gdpr_deleted'], 'boolean'],
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
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'flags' => $this->flags,
            'confirmed_at' => $this->confirmed_at,
            'blocked_at' => $this->blocked_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'last_login_at' => $this->last_login_at,
            'auth_tf_enabled' => $this->auth_tf_enabled,
            'password_changed_at' => $this->password_changed_at,
            'gdpr_consent' => $this->gdpr_consent,
            'gdpr_consent_date' => $this->gdpr_consent_date,
            'gdpr_deleted' => $this->gdpr_deleted,
        ]);

        $query->andFilterWhere(['ilike', 'username', $this->username])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'password_hash', $this->password_hash])
            ->andFilterWhere(['ilike', 'auth_key', $this->auth_key])
            ->andFilterWhere(['ilike', 'unconfirmed_email', $this->unconfirmed_email])
            ->andFilterWhere(['ilike', 'registration_ip', $this->registration_ip])
            ->andFilterWhere(['ilike', 'auth_tf_key', $this->auth_tf_key])
            ->andFilterWhere(['ilike', 'last_login_ip', $this->last_login_ip]);

        return $dataProvider;
    }
}
