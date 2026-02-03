<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manajemen Registrasi Pasien';
?>

<div class="registrasi-index container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark mb-1"><?= Html::encode($this->title) ?></h3>
            <p class="text-muted small">Kelola data pendaftaran pasien rumah sakit secara real-time.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <?= Html::a(
                '<i class="bi bi-arrow-left"></i> Kembali',
                ['/site/index'],
                ['class' => 'btn btn-outline-secondary btn-sm rounded-pill px-3']
            ) ?>
        </div>
    </div>

    <!-- Search -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text"
                id="search"
                class="form-control mb-3"
                placeholder="Cari nama pasien / NIK / No RM / No Registrasi">
        </div>
    </div>

    <!-- Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-0">
                    <div id="table-container">
                        <?= $this->render('_table', [
                            'dataProvider' => $dataProvider
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$searchUrl = Url::to(['index']);

$js = <<<JS
let timer = null;

$('#search').on('keyup', function () {
    clearTimeout(timer);
    let value = $(this).val();

    timer = setTimeout(function () {
        $.get('$searchUrl', { search: value }, function (res) {
            $('#table-container').html(res);
        });
    }, 300);
});

$(document).on('click', '#table-container .pagination a', function(e){
    e.preventDefault();
    let href = $(this).attr('href');
    let searchValue = $('#search').val();
    if (searchValue) {
        href += (href.indexOf('?') > -1 ? '&' : '?') + 'search=' + encodeURIComponent(searchValue);
    }
    $.get(href, function(res){
        $('#table-container').html(res);
    });
});
JS;

$this->registerJs($js);
