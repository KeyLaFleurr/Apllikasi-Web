<?php

namespace app\controllers;

use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FileUpload;
use yii\web\UploadedFile;


/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SuratMasuk models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratMasuk model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SuratMasuk();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuratMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SuratMasuk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratMasuk::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
 /**
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
class FileController extends Controller
{
    public function actionUpload($id)
    {
        $model = SuratMasuk::findOne($id);

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Data tidak ditemukan.');
        }

        $fileModel = new FileUpload();

        if (Yii::$app->request->isPost) {
            $fileModel->file = UploadedFile::getInstance($fileModel, 'file');

            if ($fileModel->upload()) {
                $model->dokumen = $fileModel->file->name;
                $model->save(false); // Simpan tanpa validasi agar data yang lain tidak berubah
                Yii::$app->session->setFlash('success', 'File berhasil diupload.');
            } else {
                Yii::$app->session->setFlash('error', 'Gagal mengupload file.');
            }

            return $this->redirect(['index']); // Ganti 'index' dengan action yang sesuai untuk kembali ke halaman sebelumnya
        }

        return $this->render('upload', ['model' => $fileModel]);
    }

    public function actionDownload($id)
    {
        $model = SuratMasuk::findOne($id);

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Data tidak ditemukan.');
        }

        $path = 'uploads/' . $model->dokumen; // Ganti 'uploads' dengan direktori tempat Anda menyimpan file yang diupload
        if (file_exists($path)) {
            Yii::$app->response->sendFile($path);
        } else {
            throw new \yii\web\NotFoundHttpException('File tidak ditemukan.');
        }
    }
}


