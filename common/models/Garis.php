<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "garis".
 *
 * @property int $id_garis
 * @property int $get_pasar
 * @property string $garisBujur
 * @property string $garisLintang
 *
 * @property Pasar $getPasar
 */
class Garis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'garis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['get_pasar', 'garisBujur', 'garisLintang'], 'required'],

            [['garisBujur', 'garisLintang', 'get_pasar'], 'string', 'max' => 100],
            // [['get_pasar'], 'exist', 'skipOnError' => true, 'targetClass' => Pasar::class, 'targetAttribute' => ['get_pasar' => 'id_pasar']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_garis' => 'Id Garis',
            'get_pasar' => 'Nama Pasar',
            'garisBujur' => 'Garis Bujur',
            'garisLintang' => 'Garis Lintang',
        ];
    }

    /**
     * Gets query for [[GetPasar]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getGetPasarX()
    {
        return $this->hasMany(User::class, ['garis_bujur' => 'id_garis', 'garis_lintang' => 'id_garis',]);
    }
}
