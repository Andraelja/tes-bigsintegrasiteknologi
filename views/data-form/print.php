<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

/** @var app\models\DataForm $data */

/** @var app\models\RegisterForm $registrasi */
$formData = is_string($data->data) ? json_decode($data->data, true) : $data->data;
?>

<div class="form-kertas-container py-5">
    <div class="paper shadow-lg mx-auto p-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-3">
            </div>
            <div class="col-6 text-center">
                <h5 class="fw-bold mb-0" style="color: #f39c12;">PT BIGS</h5>
                <h5 class="fw-bold" style="color: #3498db;">INTEGRASI</h5>
                <h5 class="fw-bold" style="color: #3498db;">TEKNOLOGI</h5>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="text-center mb-4">
            <h4 class="fw-bold mb-0">PENGKAJIAN KEPERAWATAN</h4>
            <h4 class="fw-bold">POLIKLINIK KEBIDANAN</h4>
        </div>
        <hr>

        <!-- Info Pasien -->
        <div class="row mb-3 small">
            <div class="col-7">
                <table class="table table-sm table-borderless">
                    <tr>
                        <td width="150">Tanggal Pengkajian</td>
                        <td>: <?php echo date('d/m/Y', strtotime($data->create_time_at)) ?></td>
                    </tr>
                    <tr>
                        <td>Jam Pengkajian</td>
                        <td>: <?php echo date('H:i', strtotime($data->create_time_at)) ?></td>
                    </tr>
                    <tr>
                        <td>Poliklinik</td>
                        <td>: KLINIK OBGYN</td>
                    </tr>
                </table>
            </div>
            <div class="col-5 border p-2">
                <table class="table table-sm table-borderless mb-0">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td class="fw-bold">: <?php echo Html::encode($registrasi->nama_pasien) ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <?php echo date('d F Y', strtotime($registrasi->tanggal_lahir)) ?></td>
                    </tr>
                    <tr>
                        <td>No. RM</td>
                        <td class="fw-bold">: <?php echo Html::encode($registrasi->no_rekam_medis) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Section Pengkajian saat datang -->
        <div class="section-title bg-secondary text-white p-1 fw-bold mb-2">Pengkajian saat datang (diisi oleh perawat)</div>

        <div class="row g-2 mb-3 small">
            <!-- 1. Cara masuk -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">1. Cara masuk :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <?php foreach (['Jalan tanpa bantuan', 'Kursi tanpa bantuan', 'Tempat tidur dorong', 'Lain-lain'] as $opt): ?>
                        <label><input type="checkbox" <?php echo in_array($opt, $formData['cara_masuk'] ?? []) ? 'checked' : '' ?>> <?php echo $opt ?></label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 2. Anamnesis -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">2. Anamnesis :</label>
                <div class="d-flex gap-3 align-items-center mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['anamnesis'] ?? '') == 'Autoanamnesis' ? 'checked' : '' ?>> Autoanamnesis</label>
                    <label><input type="radio" <?php echo ($formData['anamnesis'] ?? '') == 'Alloanamnesis' ? 'checked' : '' ?>> Alloanamnesis</label>
                    <span>Diperoleh : <?php echo Html::encode($formData['anamnesis_oleh'] ?? '') ?></span>
                    <span>Hubungan : <?php echo Html::encode($formData['anamnesis_hubungan'] ?? '') ?></span>
                </div>
            </div>

            <!-- 3. Keluhan utama -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">3. Keluhan utama saat ini :</label>
                <div class="mt-1 ms-3"><?php echo Html::encode($formData['keluhan_utama'] ?? '') ?></div>
            </div>

            <!-- 4. Riwayat penyakit saat ini -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">4. Riwayat penyakit saat ini :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['riwayat_saat_ini'] ?? '') == 'Tidak tampak sakit' ? 'checked' : '' ?>> Tidak tampak sakit</label>
                    <label><input type="radio" <?php echo ($formData['riwayat_saat_ini'] ?? '') == 'Sakit ringan' ? 'checked' : '' ?>> Sakit ringan</label>
                    <label><input type="radio" <?php echo ($formData['riwayat_saat_ini'] ?? '') == 'Sakit sedang' ? 'checked' : '' ?>> Sakit sedang</label>
                    <label><input type="radio" <?php echo ($formData['riwayat_saat_ini'] ?? '') == 'Sakit berat' ? 'checked' : '' ?>> Sakit berat</label>
                </div>
            </div>

            <!-- 5. Warna kulit -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">5. Warna kulit :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['warna_kulit'] ?? '') == 'Normal' ? 'checked' : '' ?>> Normal</label>
                    <label><input type="radio" <?php echo ($formData['warna_kulit'] ?? '') == 'Sianosis' ? 'checked' : '' ?>> Sianosis</label>
                    <label><input type="radio" <?php echo ($formData['warna_kulit'] ?? '') == 'Pucat' ? 'checked' : '' ?>> Pucat</label>
                    <label><input type="radio" <?php echo ($formData['warna_kulit'] ?? '') == 'Kemerahan' ? 'checked' : '' ?>> Kemerahan</label>
                </div>
            </div>
        </div>
        <div class="row g-0 border mb-3 small">
            <!-- Kesadaran -->
            <div class="col-md-3 border-end p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Kesadaran</div>
                <?php foreach (['Compos mentis', 'Apatis', 'Somnolent', 'Sopor', 'Soporokoma', 'Koma'] as $k): ?>
                    <div class="form-check">
                        <input type="radio" <?php echo ($formData['kesadaran'] ?? '') == $k ? 'checked' : '' ?> class="form-check-input">
                        <label class="form-check-label"><?php echo $k ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Tanda Vital -->
            <div class="col-md-3 border-end p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Tanda Vital</div>
                <div class="mb-2">
                    <span>TD : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['td'] ?? '') ?> mmHg</span>
                </div>
                <div class="mb-2">
                    <span>P : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['pernapasan'] ?? '') ?> x/menit</span>
                </div>
                <div class="mb-2">
                    <span>N : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['nadi'] ?? '') ?> x/menit</span>
                </div>
                <div class="mb-2">
                    <span>S : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['suhu'] ?? '') ?> °C</span>
                </div>
            </div>

            <!-- Fungsional -->
            <div class="col-md-3 border-end p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Fungsional</div>
                <div class="mb-2">
                    <div>1. Alat bantu :</div>
                    <div class="fw-bold"><?php echo Html::encode($formData['alat_bantu'] ?? '') ?></div>
                </div>
                <div class="mb-2">
                    <div>2. Prothesa :</div>
                    <div class="fw-bold"><?php echo Html::encode($formData['prothesa'] ?? '') ?></div>
                </div>
                <div class="mb-2">
                    <div>3. Cacat tubuh :</div>
                    <div class="fw-bold"><?php echo Html::encode($formData['cacat_tubuh'] ?? '') ?></div>
                </div>
            </div>

            <!-- Antropometri dengan IMT -->
            <div class="col-md-3 p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Antropometri</div>
                <div class="mb-2">
                    <span>BB : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['bb'] ?? '') ?> Kg</span>
                </div>
                <div class="mb-2">
                    <span>TB : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['tb'] ?? '') ?> Cm</span>
                </div>
                <div class="mb-2">
                    <span>LK : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['lk'] ?? '') ?> Cm</span>
                </div>
                <div class="mb-2">
                    <span>LD : </span>
                    <span class="fw-bold"><?php echo Html::encode($formData['ld'] ?? '') ?> Cm</span>
                </div>

                <!-- IMT Calculation -->
                <div class="border-top pt-2 mt-2">
                    <div class="text-center mb-2" style="font-size: 10px;">
                        <div class="fw-bold">IMT = <u>BB (Kg)</u></div>
                        <div class="fw-bold" style="margin-left: 30px;">TB² (m)</div>
                    </div>
                    <div class="mb-2">
                        <strong style="font-size: 10px;">Hasil IMT:</strong>
                        <span class="fw-bold bg-light px-1"><?php echo Html::encode($formData['imt'] ?? '') ?></span>
                    </div>
                    <div class="p-2 bg-light border" style="font-size: 9px;">
                        <div class="fw-bold mb-1">Kategori:</div>
                        <div>Normal: 18.5-25.0</div>
                        <div>Gemuk: 25.0-27.0</div>
                        <div>Obesitas: >27.0</div>
                    </div>
                </div>
                <div class="mt-2" style="font-size: 8px; color: #666;">
                    <em>PB & LK Khusus Pediatri</em>
                </div>
            </div>
        </div>

        <!-- Status Gizi & Riwayat Penyakit -->
        <div class="row g-2 mb-3 small">
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">6. Status gizi :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['status_gizi'] ?? '') == 'Ideal' ? 'checked' : '' ?>> Ideal</label>
                    <label><input type="radio" <?php echo ($formData['status_gizi'] ?? '') == 'Kurang' ? 'checked' : '' ?>> Kurang</label>
                    <label><input type="radio" <?php echo ($formData['status_gizi'] ?? '') == 'Obesitas/overweight' ? 'checked' : '' ?>> Obesitas/overweight</label>
                </div>
            </div>

            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">7. Riwayat penyakit sebelumnya :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="checkbox" <?php echo in_array('DM', $formData['riwayat_penyakit'] ?? []) ? 'checked' : '' ?>> DM</label>
                    <label><input type="checkbox" <?php echo in_array('Hipertensi', $formData['riwayat_penyakit'] ?? []) ? 'checked' : '' ?>> Hipertensi</label>
                    <label><input type="checkbox" <?php echo in_array('Jantung', $formData['riwayat_penyakit'] ?? []) ? 'checked' : '' ?>> Jantung</label>
                    <label><input type="checkbox" <?php echo in_array('Lain-lain', $formData['riwayat_penyakit'] ?? []) ? 'checked' : '' ?>> Lain-lain</label>
                </div>
            </div>

            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">8. Riwayat penyakit dalam keluarga :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['riwayat_keluarga'] ?? '') == 'Tidak' ? 'checked' : '' ?>> Tidak</label>
                    <label><input type="radio" <?php echo ($formData['riwayat_keluarga'] ?? '') == 'Ya' ? 'checked' : '' ?>> Ya</label>
                </div>
            </div>

            <!-- Poin 9 dengan field dinamis -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">9. Riwayat operasi :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['riwayat_operasi'] ?? '') == 'Tidak' ? 'checked' : '' ?>> Tidak</label>
                    <label><input type="radio" <?php echo ($formData['riwayat_operasi'] ?? '') == 'Ya' ? 'checked' : '' ?>> Ya</label>
                </div>

                <?php if (($formData['riwayat_operasi'] ?? '') == 'Ya'): ?>
                    <div class="mt-2 ms-3 p-2 bg-light border">
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="small fw-bold">Jenis Operasi:</label>
                                <div><?php echo Html::encode($formData['riwayat_operasi_jenis'] ?? '') ?></div>
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold">Kapan?</label>
                                <div><?php echo Html::encode($formData['riwayat_operasi_kapan'] ?? '') ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Poin 10 dengan field dinamis -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">10. Riwayat pernah dirawat di RS :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" <?php echo ($formData['riwayat_rawat'] ?? '') == 'Tidak' ? 'checked' : '' ?>> Tidak</label>
                    <label><input type="radio" <?php echo ($formData['riwayat_rawat'] ?? '') == 'Ya' ? 'checked' : '' ?>> Ya</label>
                </div>

                <?php if (($formData['riwayat_rawat'] ?? '') == 'Ya'): ?>
                    <div class="mt-2 ms-3 p-2 bg-light border">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-2">
                                    <label class="small fw-bold">Operasi gigi?</label>
                                    <div>Kapan? <?php echo Html::encode($formData['operasi_gigi_kapan'] ?? '') ?></div>
                                </div>
                                <div class="mb-2">
                                    <label class="small fw-bold">Penyakit lain?</label>
                                    <div>Kapan? <?php echo Html::encode($formData['penyakit_lain_kapan'] ?? '') ?></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <label class="small fw-bold">APP</label>
                                    <div><?php echo Html::encode($formData['app_tahun'] ?? '') ?></div>
                                </div>
                                <div class="mb-2">
                                    <label class="small fw-bold">Post App</label>
                                    <div><?php echo Html::encode($formData['post_app'] ?? '') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pengkajian Resiko Jatuh -->
        <div class="section-title bg-light p-1 fw-bold border mb-2">15. Pengkajian resiko jatuh</div>
        <div class="row g-0 mb-4">
            <div class="col-9">
                <table class="table table-bordered table-sm small align-middle mb-0">
                    <thead class="bg-light text-center">
                        <tr>
                            <th width="30">No</th>
                            <th>Resiko</th>
                            <th width="120">Skala</th>
                            <th width="60">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resikoData = $formData['resiko_jatuh'] ?? [];
                        $resikoItems = [
                            1 => ['Riwayat jatuh yang baru atau dalam 3 bulan terakhir', 'Tidak = 0<br>Ya = 25'],
                            2 => ['Diagnosa medis sekunder > 1', 'Tidak = 0<br>Ya = 15'],
                            3 => ['Alat bantu jalan', '0 / 15'],
                            4 => ['Ad akses IV atau heparin lock', 'Tidak = 0<br>Ya = 20'],
                            5 => ['Cara berjalan/berpindah', '0 / 10 / 20'],
                            6 => ['Status mental', '0 / 15'],
                        ];

                        foreach ($resikoItems as $no => $item):
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $item[0] ?></td>
                                <td class="text-center"><?php echo $item[1] ?></td>
                                <td><span class="fw-bold text-center d-block"><?php echo Html::encode($resikoData[$no] ?? 0) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="fw-bold bg-light">
                            <td colspan="3" class="text-end">Nilai total</td>
                            <td><span class="fw-bold text-center d-block"><?php echo Html::encode($formData['total_resiko_jatuh'] ?? 0) ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3 border border-start-0 p-2 small">
                <div class="fw-bold mb-2 text-center border-bottom pb-1">Kategori</div>
                <div class="mb-2 p-2 border">
                    <span>Tidak berisiko: 0-24</span> <br><br>
                    <span>Perawatan yang baik</span>
                </div>
                <div class="mb-2 p-2 border">
                    <span>Resiko rendah: 25-44</span> <br><br>
                    <span>Lakukan intervensi jatuh standar</span>
                </div>
                <div class="mb-2 p-2 border">
                    <span>Resiko tinggi: >=45</span> <br><br>
                    <span>Lakukan intervensi jatuh resiko tinggi</span>
                </div>
            </div>
        </div>

        <!-- TTD Petugas -->
        <div class="row mt-5">
            <div class="col-8"></div>
            <div class="col-4 text-center small">
                <table class="table table-bordered table-sm mb-0">
                    <tr class="bg-light">
                        <td class="fw-bold">Petugas</td>
                    </tr>
                    <tr>
                        <td><?php echo date('d/m/Y H:i', strtotime($data->create_time_at)) ?></td>
                    </tr>
                    <tr style="height: 80px;">
                        <td></td>
                    </tr>
                    <tr>
                        <td>( <?php echo Html::encode($data->create_by) ?> )</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="no-print mt-3 text-center">
            <?php echo Html::a('Kembali', ['/data-form/index'], ['class' => 'btn btn-secondary btn-lg px-4']) ?>
        </div>
    </div>
</div>

<?php
$this->registerCssFile('@web/css/form-pengkajian.css');
$this->registerJs('
window.onload = function() {
    window.print();
};');
?>