<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\base\Model;


/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id
 * @property string|null $tgl_surat_masuk
 * @property string|null $tgl_surart
 * @property string|null $no_surat
 * @property string|null $asal_surat
 * @property string|null $perihal_surat
 * @property string|null $disposisi_kabid
 * @property string|null $disposisi_seksi
 * @property string|null $dokumen
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_surat_masuk', 'tgl_surart', 'no_surat', 'asal_surat', 'perihal_surat', 'disposisi_kabid', 'disposisi_seksi', 'dokumen'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tgl_surat_masuk' => Yii::t('app', 'Tgl Surat Masuk'),
            'tgl_surart' => Yii::t('app', 'Tgl Surart'),
            'no_surat' => Yii::t('app', 'No Surat'),
            'asal_surat' => Yii::t('app', 'Asal Surat'),
            'perihal_surat' => Yii::t('app', 'Perihal Surat'),
            'disposisi_kabid' => Yii::t('app', 'Disposisi Kabid'),
            'disposisi_seksi' => Yii::t('app', 'Disposisi Seksi'),
            'dokumen' => Yii::t('app', 'Dokumen'),
        ];
    }
}
    class FileUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, pdf'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
            $this->file->saveAs($path);
            return $path;
        } else {
            return false;
        }
    }
}

