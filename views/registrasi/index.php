<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RegisterForm $data */

$this->title = 'Input Data Pasien';
?>

<div class="registrasi-form container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <div class="mb-4 d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bold text-dark mb-1"><?= Html::encode($this->title) ?></h3>
                    <p class="text-muted small">Pastikan NIK dan Nomor Rekam Medis sesuai dengan dokumen asli.</p>
                </div>
                <?= Html::a('<i class="bi bi-arrow-left"></i> Kembali', ['/site/index'], ['class' => 'btn btn-outline-secondary btn-sm rounded-pill px-3']) ?>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <?php $form = ActiveForm::begin([
                        'id' => 'registration-form',
                        'enableClientValidation' => true,
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'form-label fw-semibold text-secondary small'],
                            'inputOptions' => ['class' => 'form-control form-control-lg bg-light px-3 border-transparent'],
                            'errorOptions' => ['class' => 'invalid-feedback fw-bold'],
                        ],
                    ]); ?>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <h5 class="fw-bold text-primary mb-1 border-start border-3 border-primary ps-3">Administrasi</h5>
                            <p class="text-muted small ps-3">Data internal pendaftaran.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <?= $form->field($data, 'no_registrasi')->textInput(['placeholder' => 'Nomor Registrasi', 'type' => 'number']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($data, 'no_rekam_medis')->textInput(['placeholder' => 'Nomor RM Pasien', 'type' => 'number']) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="opacity-10 mb-5">

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h5 class="fw-bold text-primary mb-1 border-start border-3 border-primary ps-3">Profil Pasien</h5>
                            <p class="text-muted small ps-3">Identitas lengkap pasien.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <?= $form->field($data, 'nama_pasien')->textInput(['placeholder' => 'Nama Lengkap Pasien']) ?>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <?= $form->field($data, 'nik')->textInput(['placeholder' => '16 Digit NIK', 'type' => 'number']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($data, 'tanggal_lahir')->input('date') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-8 offset-md-4">
                            <div class="d-flex gap-2">
                                <?= Html::submitButton('<i class="bi bi-check-circle-fill me-1"></i> Simpan Data', ['class' => 'btn btn-primary btn-lg rounded-pill px-4 shadow-sm w-100']) ?>
                                <?= Html::a('Batal', ['index'], ['class' => 'btn btn-light btn-lg rounded-pill px-4 w-50']) ?>
                            </div>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <p class="text-center text-muted mt-4 small">
                <i class="bi bi-shield-lock-fill me-1"></i> Data terenkripsi secara otomatis oleh sistem.
            </p>

        </div>
    </div>
</div>