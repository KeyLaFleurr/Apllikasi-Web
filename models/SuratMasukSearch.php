<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratMasuk;

/**
 * SuratMasukSearch represents the model behind the search form of `app\models\SuratMasuk`.
 */
class SuratMasukSearch extends SuratMasuk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tgl_surat_masuk', 'tgl_surart', 'no_surat', 'asal_surat', 'perihal_surat', 'disposisi_kabid', 'disposisi_seksi', 'dokumen'], 'safe'],
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
        $query = SuratMasuk::find();

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
        ]);

        $query->andFilterWhere(['like', 'tgl_surat_masuk', $this->tgl_surat_masuk])
            ->andFilterWhere(['like', 'tgl_surart', $this->tgl_surart])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'asal_surat', $this->asal_surat])
            ->andFilterWhere(['like', 'perihal_surat', $this->perihal_surat])
            ->andFilterWhere(['like', 'disposisi_kabid', $this->disposisi_kabid])
            ->andFilterWhere(['like', 'disposisi_seksi', $this->disposisi_seksi])
            ->andFilterWhere(['like', 'dokumen', $this->dokumen]);

        return $dataProvider;
    }
}
