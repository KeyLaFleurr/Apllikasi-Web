<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SuratMasukSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="surat-masuk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tgl_surat_masuk') ?>

    <?= $form->field($model, 'tgl_surart') ?>

    <?= $form->field($model, 'no_surat') ?>

    <?= $form->field($model, 'asal_surat') ?>

    <?php  echo $form->field($model, 'perihal_surat') ?>

    <?php  echo $form->field($model, 'disposisi_kabid') ?>

    <?php  echo $form->field($model, 'disposisi_seksi') ?>

    <?php  echo $form->field($model, 'dokumen') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
