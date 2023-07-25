<?php

use app\models\SuratMasuk;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\web\View;
/** @var yii\web\View $this */
/** @var app\models\SuratMasukSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var $this yii\web\View */
/** @var $model app\models\FileUpload */

$this->title = Yii::t('app', 'Surat Masuk');
$this->params['breadcrumbs'][] = $this->title;
$this->title = 'Upload File';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="surat-masuk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Surat Masuk'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tgl_surat_masuk',
            'tgl_surart',
            'no_surat',
            'asal_surat',
            'perihal_surat',
            'disposisi_kabid',
            'disposisi_seksi',
            [
                'attribute' => 'dokumen',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Download', ['download', 'id' => $model->id]);
                },
            ],
            [
                'attribute' => 'upload_file',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Upload', ['upload', 'id' => $model->id]);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SuratMasuk $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>



</div>
