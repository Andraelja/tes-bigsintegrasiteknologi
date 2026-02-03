<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registrasi}}`.
 */
class m260203_103924_create_registrasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registrasi}}', [
            'id_registrasi'  => $this->bigPrimaryKey(),
            'no_registrasi'  => $this->bigInteger(),
            'no_rekam_medis' => $this->bigInteger(),
            'nama_pasien'    => $this->string(255),
            'tanggal_lahir'  => $this->date(),
            'nik'            => $this->bigInteger(),
            'create_by'      => $this->bigInteger(),
            'create_time_at' => $this->timestamp(6),
            'update_by'      => $this->bigInteger(),
            'update_time_at' => $this->timestamp(6),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%registrasi}}');
    }
}
