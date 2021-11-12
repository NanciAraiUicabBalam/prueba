<?php

namespace backend\controllers;

use backend\models\CompraDetalle;
use backend\models\search\CompraDetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraDetalleController implements the CRUD actions for CompraDetalle model.
 */
class CompraDetalleController extends Controller
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
     * Lists all CompraDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraDetalleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompraDetalle model.
     * @param int $compra_id Compra ID
     * @param int $producto_id Producto ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($compra_id, $producto_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($compra_id, $producto_id),
        ]);
    }

    /**
     * Creates a new CompraDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompraDetalle();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CompraDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $compra_id Compra ID
     * @param int $producto_id Producto ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($compra_id, $producto_id)
    {
        $model = $this->findModel($compra_id, $producto_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CompraDetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $compra_id Compra ID
     * @param int $producto_id Producto ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($compra_id, $producto_id)
    {
        $this->findModel($compra_id, $producto_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CompraDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $compra_id Compra ID
     * @param int $producto_id Producto ID
     * @return CompraDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($compra_id, $producto_id)
    {
        if (($model = CompraDetalle::findOne(['compra_id' => $compra_id, 'producto_id' => $producto_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
