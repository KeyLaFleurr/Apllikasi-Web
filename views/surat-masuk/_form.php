<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SuratMasuk $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="surat-masuk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_surat_masuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_surart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perihal_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disposisi_kabid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disposisi_seksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dokumenfile')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
