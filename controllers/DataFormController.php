<?php

namespace app\controllers;

use app\models\DataForm;
use app\models\RegisterForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class DataFormController extends Controller
{
    public function beforeAction($action)
    {
        date_default_timezone_set('Asia/Jakarta');

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $data = RegisterForm::find()
            ->with('dataForm')
            ->all();

        return $this->render('index', [
            'data' => $data,
        ]);
    }

    public function actionCreate($id)
    {
        $registrasi = RegisterForm::findOne($id);

        if (!$registrasi) {
            throw new NotFoundHttpException('Data registrasi tidak ditemukan.');
        }

        $data = new DataForm();

        $data->id_registrasi = $id;

        if (Yii::$app->request->isPost) {
            $formData = Yii::$app->request->post('form_data');

            $data->data = json_encode($formData);

            $data->id_form = 1;

            $data->create_time_at = date('Y-m-d H:i:s');

            $data->create_by = $formData['petugas_nama'] ?? null;

            if ($data->save()) {
                Yii::$app->session->setFlash('success', 'Data Pengkajian Berhasil Disimpan.');

                return $this->redirect(['print', 'id' => $data->id_form_data]);
            } else {
                Yii::$app->session->setFlash('error', 'Data tidak boleh kosong!');
            }
        }

        return $this->render('create', [
            'registrasi' => $registrasi,
            'data' => $data
        ]);
    }

    public function actionPrint($id)
    {
        $data = DataForm::findOne($id);

        if (!$data) {
            throw new NotFoundHttpException('Data form tidak ditemukan.');
        }

        $registrasi = RegisterForm::findOne($data->id_registrasi);

        if (!$registrasi) {
            throw new NotFoundHttpException('Data registrasi tidak ditemukan.');
        }

        return $this->render('print', [
            'data' => $data,
            'registrasi' => $registrasi
        ]);
    }

    public function actionUpdate($id)
    {
        $model = DataForm::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }

        $registrasi = RegisterForm::findOne($model->id_registrasi);

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            if (isset($post['form_data'])) {
                $model->data = json_encode($post['form_data']);
                $model->update_by = Yii::$app->user->id ?? 1;
                $model->update_time_at = date('Y-m-d H:i:s');

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Data berhasil diperbarui');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('edit', [
            'model' => $model,
            'registrasi' => $registrasi,
        ]);
    }

    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $dataForm = DataForm::findOne($id);
            if (!$dataForm) {
                throw new NotFoundHttpException('Data form tidak ditemukan.');
            }

            $registrasi = RegisterForm::findOne($dataForm->id_registrasi);
            if (!$registrasi) {
                throw new NotFoundHttpException('Data registrasi tidak ditemukan.');
            }
            $dataForm->delete();
            $registrasi->delete();
            $transaction->commit();

            Yii::$app->session->setFlash('success', 'Data berhasil dihapus.');
        } catch (\Throwable $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'Gagal menghapus data.');
            throw $e;
        }

        return $this->redirect(['index']);
    }
}
