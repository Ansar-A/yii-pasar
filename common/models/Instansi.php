<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id_instansi
 * @property string $nama_instansi
 * @property string $photo
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property string $website
 * @property string $kepala_instansi
 * @property string $visi_misi
 * @property string $status_hukum
 */
class Instansi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_instansi', 'photo', 'alamat', 'no_telp', 'email', 'website', 'kepala_instansi', 'visi_misi', 'status_hukum'], 'required'],
            [['status_hukum'], 'string'],
            [['nama_instansi', 'website', 'kepala_instansi'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['alamat', 'visi_misi'], 'string', 'max' => 255],
            [['no_telp'], 'string', 'max' => 20],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, jpeg', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_instansi' => 'Id Instansi',
            'nama_instansi' => 'Nama Instansi',
            'photo' => 'Photo',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'email' => 'Email',
            'website' => 'Website',
            'kepala_instansi' => 'Kepala Instansi',
            'visi_misi' => 'Visi Misi',
            'status_hukum' => 'Status Hukum',
        ];
    }
}
