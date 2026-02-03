<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Dashboard Utama';
?>

<div class="dashboard-wrapper py-5">
    <div class="container">
        <div class="text-center mb-5">
            <div class="badge bg-soft-primary text-primary mb-2 px-3 py-2 rounded-pill fw-bold">
                TES CODING PT. BIGS INTEGRASI TEKNOLOGI
            </div>
            <h2 class="fw-bold text-dark">Layanan Registrasi Pasien</h2>
            <p class="text-muted mx-auto" style="max-width: 500px;">
                Silakan pilih modul di bawah untuk memulai aktivitas Anda.
            </p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-5 col-lg-4">
                <a href="<?= Url::to(['registrasi/index']) ?>" class="menu-card-link">
                    <div class="card h-100 border-0 shadow-sm custom-card hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="icon-box mb-4 mx-auto bg-primary-light">
                                <i class="bi bi-person-plus-fill fs-2 text-primary"></i>
                            </div>
                            <h4 class="fw-bold text-dark mb-2">Pendaftaran Baru</h4>
                            <p class="text-muted small mb-0">Input data pasien baru, nomor rekam medis, dan informasi identitas lainnya.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-4 text-center">
                            <span class="text-primary fw-semibold small">Buka Form <i class="bi bi-arrow-right ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-5 col-lg-4">
                <a href="<?= Url::to(['data-form/index']) ?>" class="menu-card-link">
                    <div class="card h-100 border-0 shadow-sm custom-card hover-lift">
                        <div class="card-body p-4 text-center">
                            <div class="icon-box mb-4 mx-auto bg-success-light">
                                <i class="bi bi-journal-medical fs-2 text-success"></i>
                            </div>
                            <h4 class="fw-bold text-dark mb-2">Arsip Registrasi</h4>
                            <p class="text-muted small mb-0">Lihat, cari, dan kelola database seluruh pasien yang telah terdaftar dalam sistem.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-4 text-center">
                            <span class="text-success fw-semibold small">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="text-center mt-5">
            <div class="d-inline-flex align-items-center p-2 bg-white rounded-pill shadow-sm border px-3">
                <span class="status-indicator ripple me-2"></span>
                <small class="text-muted fw-medium">Sistem Terkoneksi ke Database Utama</small>
            </div>
        </div>
    </div>
</div>
