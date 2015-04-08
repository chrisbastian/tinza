<?php

class PropertiesController extends Controller
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
				'actions'=>array('index','view','admin','create','update','Eliminar','BusquedaAvanzada','Inicio'),
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

	public function actionInicio()
	{
		$this->render('home');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionBusquedaAvanzada()
	{
		$model=new Properties('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('busquedaAvanzada',array('model'=>$model));
	}

	public function actionEliminar($id)
	{
		if(Yii::app()->session['rol']!="Administrador" )
		{
			$this->redirect(array('login'));
		}

		$this->loadModel($id)->delete();
		
		$this->redirect(array('properties/admin'));

	}

	public function actionCreate()
	{
		$model=new Properties;
		$model_identification=new Identification;
		$model_licenses=new Licenses;
		$model_extra_properties=new ExtraProperties;



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Properties']))
		{
			$model->attributes=$_POST['Properties'];
			$catastral=$_POST['catastral'];
			$model->catastral=$catastral;
			$model->id_parking_document=CUploadedFile::getInstance($model,'id_parking_document');

			if($model->id_parking_document!=NULL)
			{
				$model->id_parking_document->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->id_parking_document);
				$model->id_parking_document=$model->id_parking_document;
			}

			$model->save();

			$document_identification= CUploadedFile::getInstancesByName('identification_document');
			$document_license= CUploadedFile::getInstancesByName('license_document');
				
			//License Attributes
			$type_license=$_POST['type_license'];
			$expedition_date_license=$_POST['expedition_date_license'];
			$expiration_date_license=$_POST['expiration_date_license'];

			$count=0;

			if(!empty($type_license))
			{

				foreach ($document_license as $file_license) {
					$fileName = $file_license->getName();
					$file_license->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$fileName);
					$file_document_license[$count]=$fileName;
					$count++;
				}

				$count=0;

				$type_license_array=array();
				
				//License Model
				foreach ($type_license as $single => $value) {
					$type_license_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expedition_date_license as $single => $value) {
					$expedition_date_license_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expiration_date_license as $single => $value) {
					$expiration_date_license_array[$count]=$value;
					$count++;
				}

				//Save Model License
				for ($i=0; $i<$count; $i++) { 

					$model_licenses=new Licenses;
					$model_licenses->id_propertie=$model->id;
					$model_licenses->type_license=$type_license_array[$i];
					$model_licenses->lic_date_expedition=$expedition_date_license_array[$i];
					$model_licenses->lic_date_expiration=$expiration_date_license[$i];

					if(empty($file_document_license[$i]))
					$file_document_license[$i]="";

					$model_licenses->id_document=$file_document_license[$i];
					$model_licenses->save();
				}

			}

			/*******End Licenses Model***********/
			
			//Identification Attributes
			$use_soil_type=$_POST['use_soil_type'];
			$expedition_date_identification=$_POST['expedition_date_identification'];
			$expiration_date_identification=$_POST['expiration_date_identification'];

			$count=0;

			if(!empty($use_soil_type))
			{

				foreach ($document_identification as $file) {
					$fileName = $file->getName();
					$file->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$fileName);
					$file_document_identification[$count]=$fileName;
					$count++;
				}

				$count=0;

				//Identification Model
				foreach ($use_soil_type as $single => $value) {
					$use_soil_type_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expedition_date_identification as $single => $value) {
					$expedition_date_identification_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expiration_date_identification as $single => $value) {
					$expiration_date_identification_array[$count]=$value;
					$count++;
				}

				//Save Model Identification
				for ($i=0; $i <$count; $i++) {

					$model_identification=new Identification; 
					$model_identification->id_propertie=$model->id;
					$model_identification->catastral=$catastral;
					$model_identification->id_use_ground=$use_soil_type_array[$i];
					$model_identification->soil_date_expedition=$expedition_date_identification_array[$i];
					$model_identification->soil_date_expiration=$expiration_date_identification_array[$i];
					
					if(empty($file_document_identification[$i]))
					$file_document_identification[$i]="";

					$model_identification->document_identification=$file_document_identification[$i];
					$model_identification->save();
				}

			}

			//Extra Attributes
			$extra_title=$_POST['extra_title'];
			$extra_description=$_POST['extra_description'];

			foreach ($extra_title as $single => $value) {

				 $validador=$value;
			}

			if($validador!="")
			{
			
				$count=0;
				//Extra Model
				foreach ($extra_title as $single => $value) {
					$title_extra_array[$count]=$value;
					$count++;
					
				}

				$count=0;
				foreach ($extra_description as $single => $value) {
					$description_extra_array[$count]=$value;

					$count++;
				}

				for ($i=0; $i<$count; $i++){
					$model_extra_properties=new ExtraProperties;
					$model_extra_properties->id_property=$model->id;
					$model_extra_properties->title=$title_extra_array[$i];
					$model_extra_properties->description=$description_extra_array[$i];
					$model_extra_properties->save();
				}
			}

			if($model->save())
			{
				$this->redirect(array('admin'));
			}

		}
			$this->render('create',array(
				'model'=>$model,
				'model_identification'=>$model_identification,
				'model_licenses'=>$model_licenses,
				'model_extra_properties'=>$model_extra_properties
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
		$model_licenses=$this->loadModelLicenses($id);
		$model_identification=$this->loadModelIdentification($id);
		$model_extra_properties=$this->loadModelExtraProperties($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Properties']))
		{
	
			if($model_licenses!=NULL)
			{
				Licenses::model()->deleteAll("id_propertie ='".$id."'");
			}

			
			if($model_extra_properties!=NULL)
			{
				ExtraProperties::model()->deleteAll("id_property ='".$id."'");
			}

			if($model_identification!=NULL)
			{
				Identification::model()->deleteAll("id_propertie ='".$id."'");
			}
			
			$model->attributes=$_POST['Properties'];
			$catastral=$_POST['catastral'];
			$model->catastral=$catastral;
			$model->id_parking_document=CUploadedFile::getInstance($model,'id_parking_document');

			if($model->id_parking_document!=NULL)
			{
				$model->id_parking_document->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$model->id_parking_document);
				$model->id_parking_document=$model->id_parking_document;
			}

			$model->save();

			$document_identification= CUploadedFile::getInstancesByName('identification_document');
			$document_license= CUploadedFile::getInstancesByName('license_document');
				
			//License Attributes
			$type_license=$_POST['type_license'];
			$expedition_date_license=$_POST['expedition_date_license'];
			$expiration_date_license=$_POST['expiration_date_license'];

			$count=0;

			if(!empty($type_license))
			{

				foreach ($document_license as $file_license) {
					$fileName = $file_license->getName();
					$file_license->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$fileName);
					$file_document_license[$count]=$fileName;
					$count++;
				}

				$count=0;

				$type_license_array=array();

				//License Model
				foreach ($type_license as $single => $value) {
					$type_license_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expedition_date_license as $single => $value) {
					$expedition_date_license_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expiration_date_license as $single => $value) {
					$expiration_date_license_array[$count]=$value;
					$count++;
				}

				//Save Model License
				for ($i=0; $i<$count; $i++) { 

					$model_licenses=new Licenses;
					$model_licenses->id_propertie=$model->id;
					$model_licenses->type_license=$type_license_array[$i];
					$model_licenses->lic_date_expedition=$expedition_date_license_array[$i];
					$model_licenses->lic_date_expiration=$expiration_date_license[$i];

					if(empty($file_document_license[$i]))
					$file_document_license[$i]="";

					$model_licenses->id_document=$file_document_license[$i];
					$model_licenses->save();
				}

			}

			/*******End Licenses Model***********/
			
			//Identification Attributes
			$use_soil_type=$_POST['use_soil_type'];
			$expedition_date_identification=$_POST['expedition_date_identification'];
			$expiration_date_identification=$_POST['expiration_date_identification'];

			$count=0;

			if(!empty($use_soil_type))
			{

				foreach ($document_identification as $file) {
					$fileName = $file->getName();
					$file->saveAs(dirname(Yii::app()->request->scriptFile).'/files/'.$fileName);
					$file_document_identification[$count]=$fileName;
					$count++;
				}

				$count=0;

				//Identification Model
				foreach ($use_soil_type as $single => $value) {
					$use_soil_type_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expedition_date_identification as $single => $value) {
					$expedition_date_identification_array[$count]=$value;
					$count++;
				}

				$count=0;

				foreach ($expiration_date_identification as $single => $value) {
					$expiration_date_identification_array[$count]=$value;
					$count++;
				}

				//Save Model Identification
				for ($i=0; $i <$count; $i++) {

					$model_identification=new Identification; 
					$model_identification->id_propertie=$model->id;
					$model_identification->catastral=$catastral;
					$model_identification->id_use_ground=$use_soil_type_array[$i];
					$model_identification->soil_date_expedition=$expedition_date_identification_array[$i];
					$model_identification->soil_date_expiration=$expiration_date_identification_array[$i];
					
					if(empty($file_document_identification[$i]))
					$file_document_identification[$i]="";

					$model_identification->document_identification=$file_document_identification[$i];
					$model_identification->save();
				}

			}

			//Extra Attributes
			$extra_title=$_POST['extra_title'];
			$extra_description=$_POST['extra_description'];

			foreach ($extra_title as $single => $value) {

				 $validador=$value;
			}

			if($validador!="")
			{
			
				$count=0;
				//Extra Model
				foreach ($extra_title as $single => $value) {

					$title_extra_array[$count]=$value;
					$count++;
					
				}

				$count=0;
				foreach ($extra_description as $single => $value) {

					$description_extra_array[$count]=$value;
					$count++;
				}

				for ($i=0; $i<$count; $i++){
					$model_extra_properties=new ExtraProperties;
					$model_extra_properties->id_property=$model->id;
					$model_extra_properties->title=$title_extra_array[$i];
					$model_extra_properties->description=$description_extra_array[$i];
					$model_extra_properties->save();

				}


			}

			if($model->save())
			{
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model_identification'=>$model_identification,
			'model_licenses'=>$model_licenses,
			'model_extra_properties'=>$model_extra_properties
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
		$dataProvider=new CActiveDataProvider('Properties');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Properties('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Properties']))
			$model->attributes=$_GET['Properties'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Properties the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Properties::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelLicenses($id)
	{
		$model=Licenses::model()->findAllByAttributes(array('id_propertie'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelIdentification($id)
	{
		$model=Identification::model()->findAllByAttributes(array('id_propertie'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelExtraProperties($id)
	{
		$model=ExtraProperties::model()->findAllByAttributes(array('id_property'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}



	/**
	 * Performs the AJAX validation.
	 * @param Properties $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='properties-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
