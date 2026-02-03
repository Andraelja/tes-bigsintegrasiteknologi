<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\RegisterForm[] $data */
$this->title = 'Manajemen Registrasi Pasien';
?>

<div class="registrasi-index container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark mb-1"><?= Html::encode($this->title) ?></h3>
            <p class="text-muted small">Kelola data pendaftaran pasien rumah sakit secara real-time.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <?= Html::a('<i class="bi bi-arrow-left"></i> Kembali', ['/site/index'], ['class' => 'btn btn-outline-secondary btn-sm rounded-pill px-3']) ?>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-secondary">
                                <tr>
                                    <th class="border-0 ps-4 py-3" style="width: 150px;">NO. REG</th>
                                    <th class="border-0 py-3">PASIEN</th>
                                    <th class="border-0 py-3">INFO IDENTITAS</th>
                                    <th class="border-0 py-3 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($data)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            Belum ada data pasien terdaftar hari ini.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($data as $row): ?>
                                        <tr>
                                            <td class="ps-4">
                                                <span class="fw-bold"><?= Html::encode($row->no_registrasi) ?></span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-3 bg-light rounded-circle text-center" style="width: 40px; height: 40px; line-height: 40px;">
                                                        <span class="text-secondary fw-bold"><?= strtoupper(substr($row->nama_pasien, 0, 1)) ?></span>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark"><?= Html::encode($row->nama_pasien) ?></div>
                                                        <small class="text-muted">RM: <?= Html::encode($row->no_rekam_medis) ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="small text-dark"><i class="bi bi-card-text me-1"></i> <?= Html::encode($row->nik) ?></div>
                                                <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i> <?= date('d M Y', strtotime($row->tanggal_lahir)) ?></div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group shadow-sm rounded">
                                                    <?php if ($row->dataForm): ?>
                                                        <?= Html::a(
                                                            '<i class="bi bi-pencil"></i> Edit',
                                                            ['update', 'id' => $row->dataForm->id_form_data],
                                                            [
                                                                'class' => 'btn btn-white btn-sm text-warning mx-2',
                                                                'title' => 'Edit Data'
                                                            ]
                                                        ) ?>

                                                        <?= Html::a(
                                                            '<i class="bi bi-printer"></i> Print',
                                                            ['print', 'id' => $row->dataForm->id_form_data],
                                                            [
                                                                'class' => 'btn btn-white btn-sm text-primary mx-2',
                                                                'title' => 'Print Data'
                                                            ]
                                                        ) ?>

                                                        <?= Html::a(
                                                            '<i class="bi bi-trash"></i> Hapus',
                                                            ['delete', 'id' => $row->dataForm->id_form_data],
                                                            [
                                                                'class' => 'btn btn-white btn-sm text-danger mx-2',
                                                                'data' => [
                                                                    'confirm' => 'Hapus data pasien ini?',
                                                                    'method' => 'post',
                                                                ],
                                                                'title' => 'Hapus'
                                                            ]
                                                        ) ?>

                                                    <?php else: ?>

                                                        <?= Html::a(
                                                            '<i class="bi bi-pencil"></i> Input',
                                                            ['create', 'id' => $row->id_registrasi],
                                                            [
                                                                'class' => 'btn btn-white btn-sm text-success mx-2',
                                                                'title' => 'Input Data'
                                                            ]
                                                        ) ?>

                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>