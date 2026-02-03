<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data_form}}`.
 */
class m260203_120549_create_data_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data_form}}', [
            'id_form_data' => $this->bigPrimaryKey(),
            'id_form' => $this->bigInteger(),
            'id_registrasi' => $this->bigInteger(),
            'data' => 'JSON',
            'is_delete' => $this->boolean()->defaultValue(false),
            'create_by' => $this->bigInteger(),
            'update_by' => $this->bigInteger(),
            'create_time_at' => $this->timestamp(6),
            'update_time_at' => $this->timestamp(6),
        ]);

        $this->createIndex('idx-data_form-id_form', '{{%data_form}}', 'id_form');
        $this->createIndex('idx-data_form-id_registrasi', '{{%data_form}}', 'id_registrasi');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data_form}}');
    }
}
