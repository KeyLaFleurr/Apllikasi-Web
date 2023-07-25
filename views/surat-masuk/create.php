<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SuratMasuk $model */

$this->title = Yii::t('app', 'Create Surat Masuk');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Surat Masuks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
