<?php

namespace backend\controllers;

use backend\models\PedidoDetalle;
use backend\models\search\PedidoDetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoDetalleController implements the CRUD actions for PedidoDetalle model.
 */
class PedidoDetalleController extends Controller
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
     * Lists all PedidoDetalle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoDetalleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PedidoDetalle model.
     * @param int $pedido_id Pedido ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pedido_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pedido_id),
        ]);
    }

    /**
     * Creates a new PedidoDetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PedidoDetalle();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pedido_id' => $model->pedido_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PedidoDetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pedido_id Pedido ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pedido_id)
    {
        $model = $this->findModel($pedido_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pedido_id' => $model->pedido_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PedidoDetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pedido_id Pedido ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pedido_id)
    {
        $this->findModel($pedido_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PedidoDetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pedido_id Pedido ID
     * @return PedidoDetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pedido_id)
    {
        if (($model = PedidoDetalle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
