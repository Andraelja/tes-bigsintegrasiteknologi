<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DataForm $model */
/** @var app\models\RegistrasiForm $registrasi */

$this->title = 'Pengkajian Keperawatan';
$this->registerCssFile('@web/css/site.css');
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
                        <td>: <?= date('d/m/Y') ?></td>
                    </tr>
                    <tr>
                        <td>Jam Pengkajian</td>
                        <td>: <?= date('H:i') ?></td>
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
                        <td class="fw-bold">: <?= Html::encode($registrasi->nama_pasien) ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <?= date('d F Y', strtotime($registrasi->tanggal_lahir)) ?></td>
                    </tr>
                    <tr>
                        <td>No. RM</td>
                        <td class="fw-bold">: <?= Html::encode($registrasi->no_rekam_medis) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'form-pengkajian']); ?>
        <?= Html::hiddenInput('DataForm[id_registrasi]', $registrasi->id_registrasi) ?>

        <!-- Section Pengkajian saat datang -->
        <div class="section-title bg-secondary text-white p-1 fw-bold mb-2">Pengkajian saat datang (diisi oleh perawat)</div>
        
        <div class="row g-2 mb-3 small">
            <!-- 1. Cara masuk -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">1. Cara masuk :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <?php foreach(['Jalan tanpa bantuan', 'Kursi tanpa bantuan', 'Tempat tidur dorong', 'Lain-lain'] as $opt): ?>
                        <label><input type="checkbox" name="form_data[cara_masuk][]" value="<?= $opt ?>"> <?= $opt ?></label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 2. Anamnesis -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">2. Anamnesis :</label>
                <div class="d-flex gap-3 align-items-center mt-1 ms-3">
                    <label><input type="radio" name="form_data[anamnesis]" value="Autoanamnesis"> Autoanamnesis</label>
                    <label><input type="radio" name="form_data[anamnesis]" value="Alloanamnesis"> Alloanamnesis</label>
                    <span>Diperoleh : <input type="text" name="form_data[anamnesis_oleh]" class="inline-input" style="width:100px"></span>
                    <span>Hubungan : <input type="text" name="form_data[anamnesis_hubungan]" class="inline-input" style="width:100px"></span>
                </div>
            </div>

            <!-- 3. Keluhan utama -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">3. Keluhan utama saat ini :</label>
                <input type="text" name="form_data[keluhan_utama]" class="form-control form-control-sm border-0 border-bottom rounded-0 mt-1">
            </div>

            <!-- 4. Riwayat penyakit saat ini -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">4. Riwayat penyakit saat ini :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" name="form_data[riwayat_saat_ini]" value="Tidak tampak sakit"> Tidak tampak sakit</label>
                    <label><input type="radio" name="form_data[riwayat_saat_ini]" value="Sakit ringan"> Sakit ringan</label>
                    <label><input type="radio" name="form_data[riwayat_saat_ini]" value="Sakit sedang"> Sakit sedang</label>
                    <label><input type="radio" name="form_data[riwayat_saat_ini]" value="Sakit berat"> Sakit berat</label>
                </div>
            </div>

            <!-- 5. Warna kulit -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">5. Warna kulit :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" name="form_data[warna_kulit]" value="Normal"> Normal</label>
                    <label><input type="radio" name="form_data[warna_kulit]" value="Sianosis"> Sianosis</label>
                    <label><input type="radio" name="form_data[warna_kulit]" value="Pucat"> Pucat</label>
                    <label><input type="radio" name="form_data[warna_kulit]" value="Kemerahan"> Kemerahan</label>
                </div>
            </div>
        </div>

        <!-- Tabel 4 Kolom -->
        <div class="row g-0 border mb-3 small">
            <!-- Kesadaran -->
            <div class="col-md-3 border-end p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Kesadaran</div>
                <?php foreach(['Compos mentis', 'Apatis', 'Somnolent', 'Sopor', 'Soporokoma', 'Koma'] as $k): ?>
                    <div class="form-check">
                        <input type="radio" name="form_data[kesadaran]" value="<?= $k ?>" class="form-check-input" id="kes-<?= str_replace(' ', '', $k) ?>">
                        <label class="form-check-label" for="kes-<?= str_replace(' ', '', $k) ?>"><?= $k ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Tanda Vital -->
            <div class="col-md-3 border-end p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Tanda Vital</div>
                <div class="mb-2">
                    <span>TD : </span>
                    <input type="text" name="form_data[td]" style="width:70px" class="inline-input"> mmHg
                </div>
                <div class="mb-2">
                    <span>P : </span>
                    <input type="text" name="form_data[pernapasan]" style="width:70px" class="inline-input"> x/menit
                </div>
                <div class="mb-2">
                    <span>N : </span>
                    <input type="text" name="form_data[nadi]" style="width:70px" class="inline-input"> x/menit
                </div>
                <div class="mb-2">
                    <span>S : </span>
                    <input type="text" name="form_data[suhu]" style="width:70px" class="inline-input"> °C
                </div>
            </div>

            <!-- Fungsional -->
            <div class="col-md-3 border-end p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Fungsional</div>
                <div class="mb-2">
                    <div>1. Alat bantu :</div>
                    <input type="text" name="form_data[alat_bantu]" class="form-control form-control-sm mt-1">
                </div>
                <div class="mb-2">
                    <div>2. Prothesa :</div>
                    <input type="text" name="form_data[prothesa]" class="form-control form-control-sm mt-1">
                </div>
                <div class="mb-2">
                    <div>3. Cacat tubuh :</div>
                    <input type="text" name="form_data[cacat_tubuh]" class="form-control form-control-sm mt-1">
                </div>
            </div>

            <!-- Antropometri dengan IMT -->
            <div class="col-md-3 p-2">
                <div class="fw-bold border-bottom mb-2 pb-1 text-center">Antropometri</div>
                <div class="mb-2">
                    <span>BB : </span>
                    <input type="text" name="form_data[bb]" id="bb-input" style="width:60px" class="inline-input"> Kg
                </div>
                <div class="mb-2">
                    <span>TB : </span>
                    <input type="text" name="form_data[tb]" id="tb-input" style="width:60px" class="inline-input"> Cm
                </div>
                <div class="mb-2">
                    <span>LK : </span>
                    <input type="text" name="form_data[lk]" style="width:60px" class="inline-input"> Cm
                </div>
                <div class="mb-2">
                    <span>LD : </span>
                    <input type="text" name="form_data[ld]" style="width:60px" class="inline-input"> Cm
                </div>
                
                <!-- IMT Calculation -->
                <div class="border-top pt-2 mt-2">
                    <div class="text-center mb-2" style="font-size: 10px;">
                        <div class="fw-bold">IMT = <u>BB (Kg)</u></div>
                        <div class="fw-bold" style="margin-left: 30px;">TB² (m)</div>
                    </div>
                    <div class="mb-2">
                        <strong style="font-size: 10px;">Hasil IMT:</strong>
                        <input type="text" name="form_data[imt]" id="imt-result" style="width:70px" class="inline-input fw-bold bg-light" readonly>
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
                    <label><input type="radio" name="form_data[status_gizi]" value="Ideal"> Ideal</label>
                    <label><input type="radio" name="form_data[status_gizi]" value="Kurang"> Kurang</label>
                    <label><input type="radio" name="form_data[status_gizi]" value="Obesitas/overweight"> Obesitas/overweight</label>
                </div>
            </div>

            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">7. Riwayat penyakit sebelumnya :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="checkbox" name="form_data[riwayat_penyakit][]" value="DM"> DM</label>
                    <label><input type="checkbox" name="form_data[riwayat_penyakit][]" value="Hipertensi"> Hipertensi</label>
                    <label><input type="checkbox" name="form_data[riwayat_penyakit][]" value="Jantung"> Jantung</label>
                    <label><input type="checkbox" name="form_data[riwayat_penyakit][]" value="Lain-lain"> Lain-lain</label>
                </div>
            </div>

            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">8. Riwayat penyakit dalam keluarga :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" name="form_data[riwayat_keluarga]" value="Tidak"> Tidak</label>
                    <label><input type="radio" name="form_data[riwayat_keluarga]" value="Ya"> Ya</label>
                </div>
            </div>

            <!-- Poin 9 dengan field dinamis -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">9. Riwayat operasi :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" name="form_data[riwayat_operasi]" value="Tidak" class="riwayat-operasi-radio"> Tidak</label>
                    <label><input type="radio" name="form_data[riwayat_operasi]" value="Ya" class="riwayat-operasi-radio"> Ya</label>
                </div>
                <div id="riwayat-operasi-detail" class="mt-2 ms-3 p-2 bg-light border" style="display: none;">
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="small fw-bold">Jenis Operasi:</label>
                            <input type="text" name="form_data[riwayat_operasi_jenis]" class="form-control form-control-sm" placeholder="Contoh: Operasi Caesar">
                        </div>
                        <div class="col-6">
                            <label class="small fw-bold">Kapan?</label>
                            <input type="text" name="form_data[riwayat_operasi_kapan]" class="form-control form-control-sm" placeholder="Contoh: 2020">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Poin 10 dengan field dinamis -->
            <div class="col-12 border-bottom pb-2">
                <label class="fw-bold">10. Riwayat pernah dirawat di RS :</label>
                <div class="d-flex gap-3 mt-1 ms-3">
                    <label><input type="radio" name="form_data[riwayat_rawat]" value="Tidak" class="riwayat-rawat-radio"> Tidak</label>
                    <label><input type="radio" name="form_data[riwayat_rawat]" value="Ya" class="riwayat-rawat-radio"> Ya</label>
                </div>
                <div id="riwayat-rawat-detail" class="mt-2 ms-3 p-2 bg-light border" style="display: none;">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="mb-2">
                                <label class="small fw-bold">Operasi gigi?</label>
                                <div class="d-flex gap-2 align-items-center">
                                    <span class="small">Kapan?</span>
                                    <input type="text" name="form_data[operasi_gigi_kapan]" class="form-control form-control-sm" placeholder="Tahun">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="small fw-bold">Penyakit lain?</label>
                                <div class="d-flex gap-2 align-items-center">
                                    <span class="small">Kapan?</span>
                                    <input type="text" name="form_data[penyakit_lain_kapan]" class="form-control form-control-sm" placeholder="Tahun">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label class="small fw-bold">APP</label>
                                <input type="text" name="form_data[app_tahun]" class="form-control form-control-sm" placeholder="Tahun">
                            </div>
                            <div class="mb-2">
                                <label class="small fw-bold">Post App</label>
                                <input type="text" name="form_data[post_app]" class="form-control form-control-sm" placeholder="Tahun">
                            </div>
                        </div>
                    </div>
                </div>
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
                        <tr>
                            <td class="text-center">1</td>
                            <td>Riwayat jatuh yang baru atau dalam 3 bulan terakhir</td>
                            <td class="text-center">Tidak = 0<br>Ya = 25</td>
                            <td><input type="number" name="form_data[resiko_jatuh][1]" value="0" class="form-control form-control-sm text-center resiko-input" min="0"></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Diagnosa medis sekunder > 1</td>
                            <td class="text-center">Tidak = 0<br>Ya = 15</td>
                            <td><input type="number" name="form_data[resiko_jatuh][2]" value="0" class="form-control form-control-sm text-center resiko-input" min="0"></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Alat bantu jalan</td>
                            <td class="text-center">0 / 15</td>
                            <td><input type="number" name="form_data[resiko_jatuh][3]" value="0" class="form-control form-control-sm text-center resiko-input" min="0"></td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Ad akses IV atau heparin lock</td>
                            <td class="text-center">Tidak = 0<br>Ya = 20</td>
                            <td><input type="number" name="form_data[resiko_jatuh][4]" value="0" class="form-control form-control-sm text-center resiko-input" min="0"></td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Cara berjalan/berpindah</td>
                            <td class="text-center">0 / 10 / 20</td>
                            <td><input type="number" name="form_data[resiko_jatuh][5]" value="0" class="form-control form-control-sm text-center resiko-input" min="0"></td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Status mental</td>
                            <td class="text-center">0 / 15</td>
                            <td><input type="number" name="form_data[resiko_jatuh][6]" value="0" class="form-control form-control-sm text-center resiko-input" min="0"></td>
                        </tr>
                        <tr class="fw-bold bg-light">
                            <td colspan="3" class="text-end">Nilai total</td>
                            <td><input type="number" name="form_data[total_resiko_jatuh]" value="0" class="form-control form-control-sm text-center fw-bold" id="total-resiko" readonly></td>
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
                        <td><?= date('d/m/Y H:i') ?></td>
                    </tr>
                    <tr style="height: 80px;">
                        <td></td>
                    </tr>
                    <tr>
                        <td>( <input type="text" name="form_data[petugas_nama]" class="border-0 border-bottom" placeholder="Nama Terang" style="width:150px"> )</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="text-end mt-4 no-print">
            <?= Html::submitButton('Simpan Data Pengkajian', ['class' => 'btn btn-success btn-lg px-5']) ?>
            <?= Html::a('Kembali', ['/data-form/index'], ['class' => 'btn btn-secondary btn-lg px-4']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJs("
// Auto-calculate total resiko jatuh
$(document).on('input', '.resiko-input', function() {
    let total = 0;
    $('.resiko-input').each(function() {
        total += parseInt($(this).val()) || 0;
    });
    $('#total-resiko').val(total);
});

// Auto-calculate IMT
function calculateIMT() {
    var bb = parseFloat($('#bb-input').val()) || 0;
    var tb = parseFloat($('#tb-input').val()) || 0;
    
    if (bb > 0 && tb > 0) {
        var tbMeter = tb / 100;
        var imt = bb / (tbMeter * tbMeter);
        $('#imt-result').val(imt.toFixed(2));
    } else {
        $('#imt-result').val('');
    }
}

$(document).on('input', '#bb-input, #tb-input', calculateIMT);

// Toggle field detail Riwayat Operasi
$(document).on('change', '.riwayat-operasi-radio', function() {
    if ($(this).val() === 'Ya') {
        $('#riwayat-operasi-detail').slideDown();
    } else {
        $('#riwayat-operasi-detail').slideUp();
    }
});

// Toggle field detail Riwayat Rawat
$(document).on('change', '.riwayat-rawat-radio', function() {
    if ($(this).val() === 'Ya') {
        $('#riwayat-rawat-detail').slideDown();
    } else {
        $('#riwayat-rawat-detail').slideUp();
    }
});
");
?>