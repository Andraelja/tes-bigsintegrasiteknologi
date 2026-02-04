<?php

namespace app\services;

use app\models\DataForm;
use RuntimeException;
use Yii;

class DataFormService
{
    public function create(int $registrasiId, array $payload): DataForm
    {
        $model = new DataForm();
        $model->id_form = 1;
        $model->id_registrasi = $registrasiId;
        $model->data = $payload;
        $model->create_by = $payload['petugas_nama'] ?? 'system';
        $model->create_time_at = date('Y-m-d H:i:s');

        if (!$model->save()) {
            throw new \RuntimeException('Gagal menyimpan data form');
        }

        return $model;
    }

    public function update(DataForm $model, array $payload): DataForm
    {
        $model->data = $payload;
        $model->update_by = Yii::$app->user->id ?? 1;
        $model->update_time_at = date('Y-m-d H:i:s');

        if (!$model->save(false)) {
            throw new RuntimeException('Gagal memperbarui data form');
        }

        return $model;
    }

    public function delete(DataForm $model): void
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $registrasi = $model->registrasi;
            $model->delete();
            $registrasi?->delete();
            $transaction->commit();
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
