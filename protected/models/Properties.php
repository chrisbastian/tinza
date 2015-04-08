<?php

/**
 * This is the model class for table "properties".
 *
 * The followings are the available columns in table 'properties':
 * @property string $id
 * @property integer $id_profile
 * @property string $catastral
 * @property integer $is_building
 * @property string $street
 * @property string $number_ext
 * @property string $number_int
 * @property string $neighborhood
 * @property string $zip_code
 * @property integer $id_state
 * @property integer $id_city
 * @property string $latitude
 * @property string $longitude
 * @property string $cos
 * @property string $cus
 * @property string $cas
 * @property string $slope
 * @property integer $surface
 * @property string $remetimiento_forntal
 * @property string $remetimiento_posterior
 * @property string $remetimiento_izquierdo
 * @property string $remetimiento_derecho
 * @property integer $has_parking
 * @property string $parking_description
 * @property string $id_parking_document
 * @property integer $has_urban_incorporation
 * @property string $urban_incorporation_description
 * @property string $urban_height_limit
 * @property string $created_at
 * @property string $updated_at
 */
class Properties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'properties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_profile, catastral, is_building, street, number_ext, number_int, neighborhood, zip_code, id_state, id_city, cos, cus, cas, slope, surface, remetimiento_forntal, remetimiento_posterior, remetimiento_izquierdo, remetimiento_derecho, has_parking, parking_description, has_urban_incorporation, urban_incorporation_description, urban_height_limit', 'required'),
			array('id_profile, id_city, surface', 'numerical', 'integerOnly'=>true),
			array('street, number_ext, neighborhood', 'length', 'max'=>60),
			array('number_int', 'length', 'max'=>12),
			array('zip_code', 'length', 'max'=>10),
			array('latitude, longitude', 'length', 'max'=>50),
			array('cos, cus, cas, slope, remetimiento_forntal, remetimiento_posterior, remetimiento_izquierdo, remetimiento_derecho, urban_height_limit', 'length', 'max'=>8),
			array('parking_description', 'length', 'max'=>200),
			array('id_parking_document', 'length', 'max'=>255),

			array('urban_incorporation_description', 'length', 'max'=>20),
			array('created_at, updated_at', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_profile, catastral, is_building, street, number_ext, number_int, neighborhood, zip_code, id_state, id_city, latitude, longitude, cos, cus, cas, slope, surface, remetimiento_forntal, remetimiento_posterior, remetimiento_izquierdo, remetimiento_derecho, has_parking, parking_description, id_parking_document, has_urban_incorporation, urban_incorporation_description, urban_height_limit, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_profile' => 'Cliente',
			'catastral' => 'Catastral',
			'is_building' => 'Construcción',
			'street' => 'Calle',
			'number_ext' => 'Numero Ext',
			'number_int' => 'Numero Int',
			'neighborhood' => 'Municipio',
			'zip_code' => 'Zip Code',
			'id_state' => 'Estado',
			'id_city' => 'Ciudad',
			'latitude' => 'Latitud',
			'longitude' => 'Longitud',
			'cos' => 'Cos',
			'cus' => 'Cus',
			'cas' => 'Cas',
			'slope' => 'Slope',
			'surface' => 'Surface',
			'remetimiento_forntal' => 'Remetimiento Frontal',
			'remetimiento_posterior' => 'Remetimiento Posterior',
			'remetimiento_izquierdo' => 'Remetimiento Izquierdo',
			'remetimiento_derecho' => 'Remetimiento Derecho',
			'has_parking' => 'Estacionamiento',
			'parking_description' => 'Descripción Estacionamiento',
			'id_parking_document' => 'Documento de Estacionamiento',
			'has_urban_incorporation' => '¿Incorporación Urbana?',
			'urban_incorporation_description' => 'Incorporación Urbana',
			'urban_height_limit' => 'Descripción de Limite Incorporación Urbanda',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_profile',$this->id_profile);
		$criteria->compare('catastral',$this->catastral,true);
		$criteria->compare('is_building',$this->is_building);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('number_ext',$this->number_ext,true);
		$criteria->compare('number_int',$this->number_int,true);
		$criteria->compare('neighborhood',$this->neighborhood,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('id_state',$this->id_state);
		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('cos',$this->cos,true);
		$criteria->compare('cus',$this->cus,true);
		$criteria->compare('cas',$this->cas,true);
		$criteria->compare('slope',$this->slope,true);
		$criteria->compare('surface',$this->surface);
		$criteria->compare('remetimiento_forntal',$this->remetimiento_forntal,true);
		$criteria->compare('remetimiento_posterior',$this->remetimiento_posterior,true);
		$criteria->compare('remetimiento_izquierdo',$this->remetimiento_izquierdo,true);
		$criteria->compare('remetimiento_derecho',$this->remetimiento_derecho,true);
		$criteria->compare('has_parking',$this->has_parking);
		$criteria->compare('parking_description',$this->parking_description,true);
		$criteria->compare('id_parking_document',$this->id_parking_document,true);
		$criteria->compare('has_urban_incorporation',$this->has_urban_incorporation);
		$criteria->compare('urban_incorporation_description',$this->urban_incorporation_description,true);
		$criteria->compare('urban_height_limit',$this->urban_height_limit,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Properties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
