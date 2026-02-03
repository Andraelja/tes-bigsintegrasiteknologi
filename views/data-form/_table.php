<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/** @var yii\data\ActiveDataProvider $dataProvider */

$data = $dataProvider->getModels();
?>

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
                        <i class="bi bi-search fs-1 d-block mb-2"></i>
                        Data tidak ditemukan.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td class="ps-4 fw-bold">
                            <?= Html::encode($row->no_registrasi) ?>
                        </td>

                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3 bg-light rounded-circle text-center"
                                    style="width:40px;height:40px;line-height:40px;">
                                    <span class="fw-bold text-secondary">
                                        <?= strtoupper(substr($row->nama_pasien, 0, 1)) ?>
                                    </span>
                                </div>
                                <div>
                                    <div class="fw-bold"><?= Html::encode($row->nama_pasien) ?></div>
                                    <small class="text-muted">RM: <?= Html::encode($row->no_rekam_medis) ?></small>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="small"><i class="bi bi-card-text me-1"></i> <?= Html::encode($row->nik) ?></div>
                            <div class="small text-muted">
                                <i class="bi bi-calendar-event me-1"></i>
                                <?= date('d M Y', strtotime($row->tanggal_lahir)) ?>
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="btn-group shadow-sm rounded">
                                <?php if ($row->dataForm): ?>

                                    <?= Html::a(
                                        '<i class="bi bi-pencil"></i> Edit',
                                        ['update', 'id' => $row->dataForm->id_form_data],
                                        ['class' => 'btn btn-white btn-sm text-warning mx-1']
                                    ) ?>

                                    <?= Html::a(
                                        '<i class="bi bi-printer"></i> Print',
                                        ['print', 'id' => $row->dataForm->id_form_data],
                                        ['class' => 'btn btn-white btn-sm text-primary mx-1']
                                    ) ?>

                                    <?= Html::a(
                                        '<i class="bi bi-trash"></i> Hapus',
                                        ['delete', 'id' => $row->dataForm->id_form_data],
                                        [
                                            'class' => 'btn btn-white btn-sm text-danger mx-1',
                                            'data' => [
                                                'confirm' => 'Hapus data pasien ini?',
                                                'method' => 'post'
                                            ]
                                        ]
                                    ) ?>

                                <?php else: ?>

                                    <?= Html::a(
                                        '<i class="bi bi-pencil"></i> Input',
                                        ['create', 'id' => $row->id_registrasi],
                                        ['class' => 'btn btn-white btn-sm text-success mx-1']
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