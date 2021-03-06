<?php

class CorreosController extends Controller
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
				'actions'=>array('index','view','create','update','admin','EnviarMensaje','enviarMensajeCliente'),
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

	public function enviarMensajeCliente()
	{
		$titulo_mensaje=$_POST['titulo_mensaje'];
		$descripcion_mensaje=$_POST['descripcion_mensaje'];

		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->SMTPSecure = "ssl";
		$mail->Host = 'smtp.gmail.com'; 
		$mail->Port = '465'; 
		$mail->Username = 'chcampos@alumnos.ubiobio.cl';
		$mail->Password = 'sovino123';
		$mail->Mailer = "smtp"; 
		$mail->SMTPAuth = true;
		$mail->CharSet = 'utf-8';  
		$mail->SMTPDebug = 1;
		$mail->SetFrom(Yii::app()->session['email'], Yii::app()->session['email']);
		$mail->Subject = $titulo_mensaje;
		$mail->AltBody = '';
		$mail->MsgHTML('<h4>'.$descripcion_mensaje.'</h4> ');
		$mail->AddAddress("tinza@gmail.com", 'Mensaje de Usuario: "'.Yii::app()->session['nombre'].'"');
		$mail->Send();
		
		echo "success";
	}

	public function actionEnviarMensaje()
	{
		$de_mensaje=$_POST['de_mensaje'];
		$bcc_mensaje=$_POST['bcc_mensaje'];
		$titulo_mensaje=$_POST['titulo_mensaje'];
		$descripcion_mensaje=$_POST['descripcion_mensaje'];
		$id_checkboxes_usuarios=$_POST['id_checkboxes_usuarios'];

		$validador=0;

		foreach ($id_checkboxes_usuarios as $id_us => $value) {
			$validador=1;
		}

		if($validador==0)
		{
			echo "error";
		}else{

			Yii::import('application.extensions.phpmailer.JPhpMailer');

			foreach ($id_checkboxes_usuarios as $id_us => $value) {

				$model=new Correos;
				$model->id_user=$value;
				$model->de=$de_mensaje;
				$model->bcc=$bcc_mensaje;
				$model->titulo=$titulo_mensaje;
				$model->descripcion=$descripcion_mensaje;
				$model->save();

				$model_destinatarios=Usuarios::model()->findByPk($value);

				$mail = new JPhpMailer;
				$mail->IsSMTP();
				$mail->SMTPSecure = "ssl";
				$mail->Host = 'smtp.gmail.com'; 
				$mail->Port = '465'; 
				$mail->Username = 'chcampos@alumnos.ubiobio.cl';
				$mail->Password = 'sovino123';
				$mail->Mailer = "smtp"; 
				$mail->SMTPAuth = true;
				$mail->CharSet = 'utf-8';  
				$mail->SMTPDebug = 1;
				$mail->SetFrom('tinza@gmail.mx', $de_mensaje);
				$mail->Subject = $titulo_mensaje;
				$mail->AltBody = '';
				$mail->MsgHTML('<h2>BCC: '.$bcc_mensaje.'</h2> <br> <h4>'.$descripcion_mensaje.'</h4> ');
				$mail->AddAddress($model_destinatarios->email, 'Usuarios Tinza');
				$mail->Send();
			}

			echo "success";
		}
		

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Correos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Correos']))
		{
			$model->attributes=$_POST['Correos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_correo));
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

		if(isset($_POST['Correos']))
		{
			$model->attributes=$_POST['Correos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_correo));
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
		$dataProvider=new CActiveDataProvider('Correos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Correos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Correos']))
			$model->attributes=$_GET['Correos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Correos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Correos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Correos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='correos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
