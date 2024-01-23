<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pedagang".
 *
 * @property int $id_pedagang
 * @property string $nama_pedangang
 * @property string $nik
 * @property string $alamat
 * @property string $tempat_jualan
 * @property string $jenis_jualan
 * @property float $omset_perbulan
 * @property string $keterangan
 * @property string $photo
 * @property int $get_pasar
 *
 * @property Pasar $getPasar
 */
class Pedagang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedagang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pedangang', 'nik', 'alamat', 'tempat_jualan', 'jenis_jualan', 'omset_perbulan', 'keterangan', 'photo', 'get_pasar'], 'required'],
            [['tempat_jualan'], 'string'],
            [['omset_perbulan'], 'number'],
            [['get_pasar'], 'integer'],
            [['nama_pedangang', 'jenis_jualan'], 'string', 'max' => 100],
            [['nik'], 'string', 'max' => 16],
            [['alamat', 'keterangan'], 'string', 'max' => 255],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['get_pasar'], 'exist', 'skipOnError' => true, 'targetClass' => Pasar::class, 'targetAttribute' => ['get_pasar' => 'id_pasar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pedagang' => 'Id Pedagang',
            'nama_pedangang' => 'Nama Pedagang',
            'nik' => 'Nik',
            'alamat' => 'Alamat',
            'tempat_jualan' => 'Tempat Jualan',
            'jenis_jualan' => 'Jenis Jualan',
            'omset_perbulan' => 'Omset Perbulan',
            'keterangan' => 'Keterangan',
            'photo' => 'Photo',
            'get_pasar' => 'Get Pasar',
        ];
    }

    /**
     * Gets query for [[GetPasar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGetPasar()
    {
        return $this->hasOne(Pasar::class, ['id_pasar' => 'get_pasar']);
    }
    public function getGaris()
    {
        return $this->hasMany(User::class, ['get_pasar' => 'id_garis']);
    }
}
