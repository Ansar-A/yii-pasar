<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pasar".
 *
 * @property int $id_pasar
 * @property string $nama_pasar
 * @property string $alamat
 * @property int $get_pengelola
 * @property string $no_telp
 * @property string $thn_pembangunan
 * @property string $thn_renovasi
 * @property string $garis_bujur
 * @property string $garis_lintang
 * @property string $kondisi_pasar
 * @property int $jml_dasaran_kios
 * @property int $jml_dasaran_los
 * @property string $kondisi_dasaran_kios
 * @property string $kondisi_dasaran_los
 * @property int $kapasitas_bangunan
 * @property string $luas_lahan
 * @property int $kepemilikan_lahan
 * @property int $unit_kerja_pengelola
 * @property int $legalitas_lahan
 * @property int $jumlah_pedagang
 * @property int $jumlah_pengunjung
 * @property float $omset_perbulan
 * @property string $keterangan
 * @property string $photo_depan
 * @property string $photo_belakang
 * @property string $photo_kiri
 * @property string $photo_kanan
 * @property string $photo_dalam
 *
 * @property Pedagang[] $pedagangs
 */
class Pasar extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasar', 'alamat', 'get_pengelola', 'no_telp', 'thn_pembangunan', 'thn_renovasi', 'garis_bujur', 'garis_lintang', 'kondisi_pasar', 'jml_dasaran_kios', 'jml_dasaran_los', 'kondisi_dasaran_kios', 'kondisi_dasaran_los', 'kapasitas_bangunan', 'luas_lahan', 'kepemilikan_lahan', 'unit_kerja_pengelola', 'legalitas_lahan', 'jumlah_pedagang', 'jumlah_pengunjung', 'omset_perbulan', 'keterangan', 'photo_depan', 'photo_belakang', 'photo_kiri', 'photo_kanan', 'photo_dalam'], 'required'],
            [['get_pengelola', 'jml_dasaran_kios', 'jml_dasaran_los', 'kapasitas_bangunan',  'jumlah_pedagang', 'jumlah_pengunjung', 'garis_bujur', 'garis_lintang'], 'integer'],
            [['thn_pembangunan', 'thn_renovasi', 'photo_depan', 'photo_belakang', 'photo_kiri', 'photo_kanan', 'photo_dalam', 'sertifikasi'], 'safe'],
            [['kondisi_pasar', 'kondisi_dasaran_kios', 'kondisi_dasaran_los', 'kepemilikan_lahan', 'unit_kerja_pengelola', 'legalitas_lahan'], 'string'],
            [['omset_perbulan'], 'number'],
            [['nama_pasar'], 'string', 'max' => 100],
            [['alamat', 'keterangan'], 'string', 'max' => 255],
            [['no_telp', 'luas_lahan'], 'string', 'max' => 50],

            [['photo_depan'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['photo_belakang'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['photo_kiri'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['photo_kanan'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['photo_dalam'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'on' => 'update'],
            [['sertifikasi'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 50 * 1024 * 1024, 'on' => 'update'],

            [['garis_bujur'], 'exist', 'skipOnError' => true, 'targetClass' => Garis::class, 'targetAttribute' => ['garis_bujur' => 'id_garis']],
            [['garis_lintang'], 'exist', 'skipOnError' => true, 'targetClass' => Garis::class, 'targetAttribute' => ['garis_lintang' => 'id_garis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasar' => 'Id Pasar',
            'nama_pasar' => 'Nama Pasar',
            'alamat' => 'Alamat',
            'get_pengelola' => 'Get Pengelola',
            'no_telp' => 'No Telp',
            'thn_pembangunan' => 'Thn Pembangunan',
            'thn_renovasi' => 'Thn Renovasi',
            'garis_bujur' => 'Garis Bujur',
            'garis_lintang' => 'Garis Lintang',
            'kondisi_pasar' => 'Kondisi Pasar',
            'jml_dasaran_kios' => 'Jml Dasaran Kios',
            'jml_dasaran_los' => 'Jml Dasaran Los',
            'kondisi_dasaran_kios' => 'Kondisi Dasaran Kios',
            'kondisi_dasaran_los' => 'Kondisi Dasaran Los',
            'kapasitas_bangunan' => 'Kapasitas Bangunan',
            'luas_lahan' => 'Luas Lahan',
            'kepemilikan_lahan' => 'Kepemilikan Lahan',
            'unit_kerja_pengelola' => 'Unit Kerja Pengelola',
            'legalitas_lahan' => 'Legalitas Lahan',
            'jumlah_pedagang' => 'Jumlah Pedagang',
            'jumlah_pengunjung' => 'Jumlah Pengunjung',
            'omset_perbulan' => 'Omset Perbulan',
            'keterangan' => 'Keterangan',
            'photo_depan' => 'Photo Depan',
            'photo_belakang' => 'Photo Belakang',
            'photo_kiri' => 'Photo Kiri',
            'photo_kanan' => 'Photo Kanan',
            'photo_dalam' => 'Photo Dalam',
            'sertifikasi' => 'Sertifikasi',
        ];
    }

    /**
     * Gets query for [[Pedagangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedagangs()
    {
        return $this->hasMany(Pedagang::class, ['get_pasar' => 'id_pasar']);
    }
    public function getUser()
    {
        // mengambil id user dan menghubungkannya ke tabel Produk
        return $this->hasOne(User::class, ['id' => 'get_pengelola']);
    }
    public function getGaris()
    {
        return $this->hasMany(Pedagang::class, ['get_pasar' => 'id_pasar']);
    }
    public function getGarisX()
    {
        return $this->hasOne(User::class, ['id_garis' => 'garis_bujur', 'id_garis' => 'garis_lintang',]);
    }
}
