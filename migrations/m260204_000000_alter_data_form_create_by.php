<?php

use yii\db\Migration;

/**
 * Handles altering create_by column in data_form table.
 */
class m260204_000000_alter_data_form_create_by extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%data_form}}', 'create_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%data_form}}', 'create_by', $this->bigInteger());
    }
}
