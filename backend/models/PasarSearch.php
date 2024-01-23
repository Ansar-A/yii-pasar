<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pasar;

/**
 * PasarSearch represents the model behind the search form of `common\models\Pasar`.
 */
class PasarSearch extends Pasar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasar', 'get_pengelola', 'jml_dasaran_kios', 'jml_dasaran_los', 'kapasitas_bangunan', 'kepemilikan_lahan', 'unit_kerja_pengelola', 'legalitas_lahan', 'jumlah_pedagang', 'jumlah_pengunjung'], 'integer'],
            [['nama_pasar', 'alamat', 'no_telp', 'thn_pembangunan', 'thn_renovasi', 'garis_bujur', 'garis_lintang', 'kondisi_pasar', 'kondisi_dasaran_kios', 'kondisi_dasaran_los', 'luas_lahan', 'keterangan', 'photo_depan', 'photo_belakang', 'photo_kiri', 'photo_kanan', 'photo_dalam', 'sertifikasi'], 'safe'],
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
        $query = Pasar::find();

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
            'id_pasar' => $this->id_pasar,
            'get_pengelola' => $this->get_pengelola,
            'thn_pembangunan' => $this->thn_pembangunan,
            'thn_renovasi' => $this->thn_renovasi,
            'jml_dasaran_kios' => $this->jml_dasaran_kios,
            'jml_dasaran_los' => $this->jml_dasaran_los,
            'kapasitas_bangunan' => $this->kapasitas_bangunan,
            'kepemilikan_lahan' => $this->kepemilikan_lahan,
            'unit_kerja_pengelola' => $this->unit_kerja_pengelola,
            'legalitas_lahan' => $this->legalitas_lahan,
            'jumlah_pedagang' => $this->jumlah_pedagang,
            'jumlah_pengunjung' => $this->jumlah_pengunjung,
            'omset_perbulan' => $this->omset_perbulan,
            'sertifikasi' => $this->sertifikasi,
        ]);

        $query->andFilterWhere(['like', 'nama_pasar', $this->nama_pasar])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'garis_bujur', $this->garis_bujur])
            ->andFilterWhere(['like', 'garis_lintang', $this->garis_lintang])
            ->andFilterWhere(['like', 'kondisi_pasar', $this->kondisi_pasar])
            ->andFilterWhere(['like', 'kondisi_dasaran_kios', $this->kondisi_dasaran_kios])
            ->andFilterWhere(['like', 'kondisi_dasaran_los', $this->kondisi_dasaran_los])
            ->andFilterWhere(['like', 'luas_lahan', $this->luas_lahan])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'photo_depan', $this->photo_depan])
            ->andFilterWhere(['like', 'photo_belakang', $this->photo_belakang])
            ->andFilterWhere(['like', 'photo_kiri', $this->photo_kiri])
            ->andFilterWhere(['like', 'photo_kanan', $this->photo_kanan])
            ->andFilterWhere(['like', 'sertifikasi', $this->sertifikasi])
            ->andFilterWhere(['like', 'photo_dalam', $this->photo_dalam]);

        return $dataProvider;
    }
}
