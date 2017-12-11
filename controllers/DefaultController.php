<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 12/3/17
 * Time: 8:52 PM
 */

namespace pantera\contactMe\controllers;

use pantera\contactMe\models\ContactMe;
use pantera\contactMe\Module;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    /* @var Module */
    public $module;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new ContactMe();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $result = [
                'status' => 'success',
                'style' => 'notice',
                'message' => $this->module->successMessage,
            ];
        } else {
            $result = [
                'status' => 'error',
                'style' => 'error',
                'message' => current($model->getFirstErrors()),
            ];
        }
        return $this->asJson($result);
    }
}
