<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Instansi;

/**
 * InstansiSearch represents the model behind the search form of `common\models\Instansi`.
 */
class InstansiSearch extends Instansi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_instansi'], 'integer'],
            [['nama_instansi', 'photo', 'alamat', 'no_telp', 'email', 'website', 'kepala_instansi', 'visi_misi', 'status_hukum'], 'safe'],
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
        $query = Instansi::find();

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
            'id_instansi' => $this->id_instansi,
        ]);

        $query->andFilterWhere(['like', 'nama_instansi', $this->nama_instansi])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'kepala_instansi', $this->kepala_instansi])
            ->andFilterWhere(['like', 'visi_misi', $this->visi_misi])
            ->andFilterWhere(['like', 'status_hukum', $this->status_hukum]);

        return $dataProvider;
    }
}
