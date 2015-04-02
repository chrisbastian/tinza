<?php

class UsuariosController extends Controller
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
				'actions'=>array('index','view','Registro','Registro_empresa','Login','Logout','admin','update','Home','create','IngresoEmpresa','Password','Curriculum','admin','Eliminar','Land','Autorespondedor','EnvioMail','Recovery','Ver','Publicar','BuscarTerrenos','validarUsuario'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionRecovery()
	{
		$model=new Usuarios;

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];

			$user_recuperar=Usuarios::model()->findAllByAttributes(array('email'=>$model->email));

			if(!empty($user_recuperar))
			{
				foreach ($user_recuperar as $u) {
				
					$id_usuario= $u->id_usuario;
				}

				$model_usuario=$this->loadModel($id_usuario);

				$password_nueva = substr( md5(microtime()), 1, 8);

				$model_usuario->password=md5(1);

				if($model_usuario->save())
				{
					Yii::import('application.extensions.phpmailer.JPhpMailer');

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
					$mail->SetFrom('chcampos@alumnos.ubiobio.cl', 'Christopher Campoos');
					$mail->Subject = 'Has solicitado una nueva contraseña';
					$mail->AltBody = '';
					$mail->MsgHTML('<h2>Contraseña Nueva: '.$password_nueva.'</h2>');
					$mail->AddAddress($model->email, 'Cliente');
					$mail->Send();

					Yii::app()->user->setFlash('success_recovery', "Success");

				}

			}else
			{
				Yii::app()->user->setFlash('error_recovery', "El Email ingresado no existe...");
			}

			
		}

		$this->redirect('Login');

	}

	public function actionEnvioMail()
	{

		Yii::import('application.extensions.phpmailer.JPhpMailer');

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
		$mail->SetFrom('chcampos@alumnos.ubiobio.cl', 'Christopher Campoos');
		$mail->Subject = 'PHPMailer Test Subject via smtp, basic with authentication';
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		$mail->MsgHTML('<h1>JUST A TEST!</h1>');
		$mail->AddAddress('chris.bastian@hotmail.es', 'Chris Campos');
		$mail->Send();
	}

	public function actionHome()
	{

		   $criteria=new CDbCriteria();
		   $criteria->addCondition('bloqueado = 0');

		   $count=Terrenos::model()->count($criteria);
		   $pages=new CPagination($count);

		   // results per page
		   $pages->pageSize=6;
		   $pages->applyLimit($criteria);
		   $model=Terrenos::model()->findAll($criteria);

			$this->renderPartial('/vendoterrenos/index',array('terrenos_encontrados'=>$model,'pages'=>$pages));
	}

	public function actionvalidarUsuario()
	{
		$usuario=$_POST['user'];

		$validar_usuario = Yii::app()->db->createCommand()
		->select('u.*')
		->from('usuarios u')
		->where('u.usuario=:usuario', array(':usuario'=>$usuario)) 
		->queryAll();

		$email=$_POST['email'];

		$validar_email = Yii::app()->db->createCommand()
		->select('u.*')
		->from('usuarios u')
		->where('u.email=:email', array(':email'=>$email)) 
		->queryAll();


		if(!empty($validar_usuario))
		{
			echo "1";
		}

		if(!empty($validar_email))
		{
			echo "2";
		}

	}

	public function actionBuscarTerrenos($id)
	{

		$criteria = new CDbCriteria( array(
		    'condition' => "ciudad LIKE :ciudad AND bloqueado=0",      // DON'T do it this way!
		    'params'    => array(':ciudad' => $id)
		) );

		$count=Terrenos::model()->count($criteria);
		$pages=new CPagination($count);

		// results per page
		$pages->pageSize=6;
		$pages->applyLimit($criteria);
		$model=Terrenos::model()->findAll($criteria);


		$this->renderPartial('/vendoterrenos/index_buscar',array('model_ciudad'=>$model,'pages'=>$pages));
	}

	public function actionPublicar()
	{

		$model=new Terrenos;

		$model_usuario=new Usuarios;


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

			$model_usuario->email=$_POST['email'];
			$model_usuario->password=md5($_POST['password']);
			$model_usuario->usuario=$model->id_vendedor;

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

					$model_usuario->save();

					$this->redirect(array('home'));
					
				}
			
			
		}

		$this->renderPartial('/vendoterrenos/publicar',array('model'=>$model));
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

	public function actionLogin()
	{
		$model=new Usuarios;

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];

			$password=md5($model->password);
			$email=$model->email;

			$datos = Yii::app()->db->createCommand()
			   ->select('u.*')
			   ->from('usuarios u')
			   ->where('u.email=:email AND u.password=:password', array(':email'=>$email,':password'=>$password)) 
			   ->queryAll();

			if(!empty($datos))
			{
				foreach ($datos as $u) {
					Yii::app()->session['id_usuario'] = $u['id_usuario'];
					Yii::app()->session['usuario'] = $u['usuario'];
					Yii::app()->session['nombre'] = $u['nombre'];
					Yii::app()->session['estado'] = $u['estado'];
					Yii::app()->session['pais'] = $u['pais'];
					Yii::app()->session['dirección'] = $u['dirección'];
					Yii::app()->session['email'] = $u['email'];
					Yii::app()->session['password'] = $u['password'];
					Yii::app()->session['rol'] = $u['rol'];

				}

				$this->redirect(array('usuarios/update/'.$u['id_usuario']));

			}

			if(empty($datos))
			{
				Yii::app()->user->setFlash('error', "Verfique su Usuario y/o Contraseña");

				$this->redirect(array('Login'));
			}
		}

		$this->renderPartial('login',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		if(Yii::app()->session['rol']!="Administrador")
		{
			$this->redirect(array('login'));
		}

		$model=new Usuarios;


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->setAttributes($_POST['Usuarios']);
			

			$model->password=md5($model->password);

			if($model->save())
			{

				if(Yii::app()->session['rol']!="Empresa" OR Yii::app()->session['rol']!="Administrador" )
				{
					$this->redirect(array('usuarios/admin/'));

				}else
				{
					$this->redirect(array('usuarios/admin/'));

				}
			}

		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionLogout()
	{
		if(Yii::app()->session['rol']=="Empresa")
		{
			$rol="Empresa";
		}else
		{
			$rol="Other";
		}

		Yii::app()->session->clear();
		Yii::app()->session->destroy();

		if($rol=="Empresa")
		{
			$this->redirect(array('ingresoEmpresa'));

		}

		if($rol=="Other")
		{
			$this->redirect(array('login'));

		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionPassword($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Usuarios']))
		{
			$model->setAttributes($_POST['Usuarios']);

			$password_confirm= $_POST['Usuarios']['confirmar_password'];

			if($model->password=="" OR $_POST['Usuarios']['confirmar_password']=="")
			{
				Yii::app()->user->setFlash('error_vacio', "Verfique su Usuario y/o Contraseña");

				$this->redirect(array('usuarios/update/'.$id));
			}

			if($model->password!=$password_confirm)
			{
				Yii::app()->user->setFlash('error', "Verfique su Usuario y/o Contraseña");

				$this->redirect(array('usuarios/update/'.$id));
			}
			else
			{

				$model->password=md5($model->password);

				if($model->update(array('password')))
				{	
					Yii::app()->user->setFlash('success', "Verfique su Usuario y/o Contraseña");
					$this->redirect(array('usuarios/update/'.$id));
				}else
				{
					Yii::app()->user->setFlash('error', "Verfique su Usuario y/o Contraseña");

					$this->redirect(array('usuarios/update/'.$id));

				}

			}

		}

	}


	public function actionUpdate($id)
	{	
		
		$id_actual=Yii::app()->session['id_usuario'];

		if(Yii::app()->session['rol']!="Administrador")
		{
			if(Yii::app()->session['id_usuario']!=$id)
			{
				$this->redirect(array('usuarios/update/'.$id_actual));
			}
		}else
		{
			if(!Yii::app()->session['id_usuario'])
			{
				$this->redirect(array('login'));
			}
		}
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed

		//$this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->setAttributes($_POST['Usuarios']);

			if($model->save())
			{

				if(Yii::app()->session['rol']=="Administrador" )
				{
					$this->redirect(array('usuarios/admin/'));

				}else
				{
					$this->redirect(array('usuarios/update/'.$id_actual));

				}
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

	public function actionEliminar($id)
	{
		if(Yii::app()->session['rol']!="Administrador" )
		{
			$this->redirect(array('login'));
		}

		$this->loadModel($id)->delete();
		
		$this->redirect(array('usuarios/admin'));

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuarios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(Yii::app()->session['rol']!="Inscrito" AND Yii::app()->session['rol']!="Administrador")
		{
			$this->redirect(array('login'));
		}

		$model=new Usuarios();

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuarios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuarios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
