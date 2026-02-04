<?php

namespace app\controllers;

use app\models\DataForm;
use app\models\RegisterForm;
use app\services\DataFormService;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class DataFormController extends Controller
{
    private DataFormService $service;

    public function __construct($id, $module, DataFormService $service, $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function beforeAction($action)
    {
        date_default_timezone_set('Asia/Jakarta');

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $query = RegisterForm::find()->with('dataForm');

        if ($search = Yii::$app->request->get('search')) {
            $query->andFilterWhere(['or',
                ['ilike', 'nama_pasien', $search],
                ['ilike', 'CAST(nik AS TEXT)', $search],
                ['ilike', 'CAST(no_rekam_medis AS TEXT)', $search],
            ]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('_table', compact('dataProvider'));
        }

        return $this->render('index', compact('dataProvider'));
    }

    public function actionCreate($id)
    {
        $registrasi = RegisterForm::findOne($id)
            ?? throw new NotFoundHttpException('Registrasi tidak ditemukan');

        $form = new DataForm();
        $form_data = Yii::$app->request->post('form_data');

        if (Yii::$app->request->isPost && $form_data) {
            try {
                $data = $this->service->create($registrasi->id_registrasi, $form_data);
                Yii::$app->session->setFlash('success', 'Data berhasil disimpan');
                return $this->redirect(['print', 'id' => $data->id_form_data]);
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Gagal menyimpan data: ' . $e->getMessage());
            }
        }

        return $this->render('create', compact('registrasi', 'form'));
    }

    public function actionPrint($id)
    {
        $data = DataForm::findOne($id)
            ?? throw new NotFoundHttpException('Data tidak ditemukan');

        return $this->render('print', [
            'data' => $data,
            'registrasi' => $data->registrasi,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = DataForm::findOne($id)
            ?? throw new NotFoundHttpException('Data tidak ditemukan');

        if (Yii::$app->request->isPost) {
            $this->service->update($model, Yii::$app->request->post('form_data'));
            Yii::$app->session->setFlash('success', 'Data diperbarui');
            return $this->redirect(['index']);
        }

        return $this->render('edit', [
            'model' => $model,
            'registrasi' => $model->registrasi,
        ]);
    }

    public function actionDelete($id)
    {
        $model = DataForm::findOne($id)
            ?? throw new NotFoundHttpException('Data tidak ditemukan');

        $this->service->delete($model);
        Yii::$app->session->setFlash('success', 'Data dihapus');

        return $this->redirect(['index']);
    }

}
