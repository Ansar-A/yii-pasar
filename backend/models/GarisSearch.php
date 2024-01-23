<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Garis;

/**
 * GarisSearch represents the model behind the search form of `common\models\Garis`.
 */
class GarisSearch extends Garis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_garis', 'get_pasar'], 'integer'],
            [['garisBujur', 'garisLintang'], 'safe'],
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
        $query = Garis::find();

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
            'id_garis' => $this->id_garis,
            'get_pasar' => $this->get_pasar,
        ]);

        $query->andFilterWhere(['like', 'garisBujur', $this->garisBujur])
            ->andFilterWhere(['like', 'garisLintang', $this->garisLintang]);

        return $dataProvider;
    }
}
