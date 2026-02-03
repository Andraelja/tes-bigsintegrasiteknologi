<?php

namespace app\controllers;

use app\models\RegisterForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class RegistrasiController extends Controller
{
    public function actionIndex()
    {
        $data = new RegisterForm();

        if ($data->load(Yii::$app->request->post())) {
            if ($data->validate()) {
                $data->save();
                Yii::$app->session->setFlash('success', 'Data berhasil disimpan.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', [
            'data' => $data,
        ]);
    }
}
