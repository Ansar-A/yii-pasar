<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pedagang;
use Yii;
use yii\db\Query;

/**
 * PedagangSearch represents the model behind the search form of `common\models\Pedagang`.
 */
class PedagangSearch extends Pedagang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pedagang', 'get_pasar'], 'integer'],
            [['nama_pedangang', 'nik', 'alamat', 'tempat_jualan', 'jenis_jualan', 'keterangan',], 'safe'],
            [['omset_perbulan'], 'number'],
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
        if (\Yii::$app->user->can('Operator')) {
            $userId = Yii::$app->user->identity->id;
            $query =
                Pedagang::find()->select(['pedagang.*'])
                ->from('pedagang')
                ->leftJoin('pasar', 'pedagang.get_pasar = pasar.id_pasar')
                ->leftJoin('user', 'pasar.get_pengelola = user.id')
                ->where(['get_pengelola' => $userId]);
        } else {
            $query = Pedagang::find();
        }


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pedagang' => $this->id_pedagang,
            'omset_perbulan' => $this->omset_perbulan,
            'get_pasar' => $this->get_pasar,
        ]);

        $query->andFilterWhere(['like', 'nama_pedangang', $this->nama_pedangang])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'tempat_jualan', $this->tempat_jualan])
            ->andFilterWhere(['like', 'jenis_jualan', $this->jenis_jualan])
            ->andFilterWhere(['like', 'id_pedagang', $this->id_pedagang])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);


        return $dataProvider;
    }
}
