<?php

class PromoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','admin','create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Promo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];
			
			$model->imagen =CUploadedFile::getInstance($model,'imagen');
			$model->fecha_creacion = date('Y-m-d h:i:s', time());
			$model->fecha_modificacion = date('Y-m-d h:i:s', time());
			$model->usuario_creador = Yii::app()->user->getId();
			$model->usuario_modificador = Yii::app()->user->getId();
			$fecha_partida1 = explode('/',$model->fecha_inicio);
			$fecha_partida2 = explode('/',$model->fecha_final);
			$model->fecha_inicio = implode('-', array_reverse($fecha_partida1));
			$model->fecha_final = implode('-', array_reverse($fecha_partida2));
			$model->imagen = $model->imagen == '' ? $_POST['nombre_imagen'] : $model->imagen;
			if($model->save()) {
				if ($_POST['nombre_imagen'] != $model->imagen) {
					$model->imagen->saveAs('images/'.$model->imagen);
				}
				$this->redirect(array('view','id'=>$model->id_promocion));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];
			
			$model->imagen =CUploadedFile::getInstance($model,'imagen');
			$model->fecha_modificacion = date('Y-m-d h:i:s', time());
			$model->usuario_modificador = Yii::app()->user->getId();
			$fecha_partida1 = explode('/',$model->fecha_inicio);
			$fecha_partida2 = explode('/',$model->fecha_final);
			$model->fecha_inicio = implode('-', array_reverse($fecha_partida1));
			$model->fecha_final = implode('-', array_reverse($fecha_partida2));
			$model->imagen = $model->imagen == '' ? $_POST['nombre_imagen'] : $model->imagen;
			
			if($model->save()) {
				if ($_POST['nombre_imagen'] != $model->imagen) {
					$model->imagen->saveAs('images/'.$model->imagen);
				}
				$this->redirect(array('view','id'=>$model->id_promocion));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Promo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Promo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Promo']))
			$model->attributes=$_GET['Promo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Promo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='promo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
