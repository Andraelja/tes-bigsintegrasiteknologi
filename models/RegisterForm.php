<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registrasi".
 *
 * @property int $id_registrasi
 * @property int|null $no_registrasi
 * @property int|null $no_rekam_medis
 * @property string|null $nama_pasien
 * @property string|null $tanggal_lahir
 * @property int|null $nik
 * @property int|null $create_by
 * @property string|null $create_time_at
 * @property int|null $update_by
 * @property string|null $update_time_at
 */
class RegisterForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'no_rekam_medis', 'nama_pasien', 'tanggal_lahir', 'nik'], 'required'],
            [['no_registrasi', 'no_rekam_medis'], 'integer'],
            [['nik'], 'string', 'length' => 16],
            [['nik'], 'match', 'pattern' => '/^[0-9]+$/'],
            [['nama_pasien'], 'string', 'max' => 255],
            [['tanggal_lahir'], 'date', 'format' => 'php:Y-m-d'],
            [['no_registrasi'], 'unique'],
            [['nik'], 'unique'],
            [['create_by', 'update_by'], 'integer'],
            [['create_time_at', 'update_time_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_registrasi' => 'ID Registrasi',
            'no_registrasi' => 'No Registrasi',
            'no_rekam_medis' => 'No Rekam Medis',
            'nama_pasien' => 'Nama Pasien',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nik' => 'NIK',
            'create_by' => 'Create By',
            'create_time_at' => 'Create Time At',
            'update_by' => 'Update By',
            'update_time_at' => 'Update Time At',
        ];
    }
}
