<?php

namespace app\models;

use Yii;

class DataForm extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'data_form';
    }

    public function rules()
    {
        return [
            [['id_form', 'id_registrasi', 'create_by', 'data'], 'required'],
            [['id_form', 'id_registrasi', 'update_by'], 'integer'],
            [['create_by'], 'string', 'max' => 100],
            [['data'], 'safe'],
            [['is_delete'], 'boolean'],
            [['create_time_at', 'update_time_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_form_data' => 'ID Form Data',
            'id_form' => 'ID Form',
            'id_registrasi' => 'ID Registrasi',
            'data' => 'Data',
            'is_delete' => 'Is Delete',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_time_at' => 'Create Time At',
            'update_time_at' => 'Update Time At',
        ];
    }

    public function getRegistrasi()
    {
        return $this->hasOne(RegisterForm::class, ['id_registrasi' => 'id_registrasi']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (is_array($this->data)) {
                $this->data = json_encode($this->data);
            }
            return true;
        }
        return false;
    }

    public function afterFind()
    {
        parent::afterFind();
        if (is_string($this->data)) {
            $this->data = json_decode($this->data, true);
        }
    }
}
