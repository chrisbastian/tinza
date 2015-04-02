<?php

class TerrenosController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Create','update','Eliminar','admin','Ver','Bloquear','Desbloquear'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	public function actionBloquear($id)
	{
		$model=$this->loadModel($id);
		$model->bloqueado=1;
		$model->save();

		$this->redirect(array('admin'));


	}

	public function actiondesbloquear($id)
	{
		$model=$this->loadModel($id);
		$model->bloqueado=0;
		$model->save();

		$this->redirect(array('admin'));


	}


	public function actionVer($id)
		{
			$model=$this->loadModel($id);

			$this->renderPartial('/vendoterrenos/terreno',array('model'=>$model));
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
		$model=new Terrenos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Terrenos']))
		{

			$model->attributes=$_POST['Terrenos'];

			$model->imagen1=CUploadedFile::getInstance($model,'imagen1');
			$model->imagen2=CUploadedFile::getInstance($model,'imagen2');
			$model->imagen3=CUploadedFile::getInstance($model,'imagen3');
			$model->imagen4=CUploadedFile::getInstance($model,'imagen4');
			$model->imagen5=CUploadedFile::getInstance($model,'imagen5');
			$model->imagen6=CUploadedFile::getInstance($model,'imagen6');

			if(Yii::app()->session['rol']=="Inscrito")
			{	
				$model->id_vendedor=Yii::app()->session['usuario'];
			}

			if($model->save())
			{
				if($model->imagen1!=NULL)
				{
					$model->imagen1->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen1);
					$model->imagen1=$model->imagen1;
				}
				
				if($model->imagen2!=NULL)
				{
					$model->imagen2->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen2);
					$model->imagen2=$model->imagen2;
				}

				if($model->imagen3!=NULL)
				{
					$model->imagen3->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen3);
					$model->imagen3=$model->imagen3;

				}

				if($model->imagen4!=NULL)
				{
					$model->imagen4->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen4);
					$model->imagen4=$model->imagen4;
				}

				if($model->imagen5!=NULL)
				{
					$model->imagen5->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen5);
					$model->imagen5=$model->imagen5;
				}

				
				if($model->imagen6!=NULL)
				{

					$model->imagen6->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen6);
					$model->imagen6=$model->imagen6;
				}

				$model->save();

				$this->redirect(array('admin'));
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

		if(isset($_POST['Terrenos']))
		{

			$model->attributes=$_POST['Terrenos'];

			$model->imagen1=CUploadedFile::getInstance($model,'imagen1');
			$model->imagen2=CUploadedFile::getInstance($model,'imagen2');
			$model->imagen3=CUploadedFile::getInstance($model,'imagen3');
			$model->imagen4=CUploadedFile::getInstance($model,'imagen4');
			$model->imagen5=CUploadedFile::getInstance($model,'imagen5');
			$model->imagen6=CUploadedFile::getInstance($model,'imagen6');

			if(Yii::app()->session['rol']=="Inscrito")
			{	
				$model->id_vendedor=Yii::app()->session['usuario'];
			}

			if($model->save())
			{
				if($model->imagen1!=NULL)
				{
					$model->imagen1->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen1);
					$model->imagen1=$model->imagen1;
				}
				
				if($model->imagen2!=NULL)
				{
					$model->imagen2->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen2);
					$model->imagen2=$model->imagen2;
				}

				if($model->imagen3!=NULL)
				{
					$model->imagen3->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen3);
					$model->imagen3=$model->imagen3;

				}

				if($model->imagen4!=NULL)
				{
					$model->imagen4->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen4);
					$model->imagen4=$model->imagen4;
				}

				if($model->imagen5!=NULL)
				{
					$model->imagen5->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen5);
					$model->imagen5=$model->imagen5;
				}

				
				if($model->imagen6!=NULL)
				{

					$model->imagen6->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->imagen6);
					$model->imagen6=$model->imagen6;
				}


				$model->save();

				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('Terrenos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Terrenos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Terrenos']))
			$model->attributes=$_GET['Terrenos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Terrenos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Terrenos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Terrenos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='terrenos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
