<?php

class IngresoController extends Controller
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
				'actions'=>array('index','view','IngresarSolicitud','Index'),
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

	public function actionIndex()
	{
		$model=new Usuarios;

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];

			$password=md5($model->password);
			$email=$model->email;
			$status="Activo";

			$datos = Yii::app()->db->createCommand()
			   ->select('u.*')
			   ->from('usuarios u')
			   ->where('u.status=:status AND u.email=:email AND u.password=:password', array(':email'=>$email,':password'=>$password,':status'=>$status)) 
			   ->queryAll();

			if(!empty($datos))
			{
				foreach ($datos as $u) {
					Yii::app()->session['id_usuario'] = $u['id_usuario'];
					Yii::app()->session['nombre'] = $u['nombre'];
					Yii::app()->session['email'] = $u['email'];
					Yii::app()->session['password'] = $u['password'];
					Yii::app()->session['rol'] = $u['rol'];

				}

				if($u['rol']=="Administrador")
				{
					$this->redirect(array('properties/inicio'));
				}

				if($u['rol']=="Cliente" or $u['rol'])
				{
					$this->redirect(array('properties/inicio'));
				}

			}

			if(empty($datos))
			{
				Yii::app()->user->setFlash('error', "Verfique su Usuario y/o Contraseña y/o Status");
				$this->redirect(array('ingreso/'));
			}
		}

		$this->renderPartial('/usuarios/login',array(
			'model'=>$model,
		));
	}
}
