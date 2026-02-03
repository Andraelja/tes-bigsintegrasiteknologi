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
        $data = RegisterForm::find()->all();

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
}
