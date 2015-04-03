<?php

/**
 * This is the model class for table "identification".
 *
 * The followings are the available columns in table 'identification':
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $id_propertie
 * @property integer $id_use_ground
 * @property string $soil_date_expedition
 * @property string $soil_date_expiration
 * @property string $document_identification
 */
class Identification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'identification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_propertie, catastral,id_use_ground, soil_date_expedition, soil_date_expiration', 'required'),
			array('id_use_ground', 'numerical', 'integerOnly'=>true),
			array('id_propertie', 'length', 'max'=>10),
			array('document_identification', 'length', 'max'=>500),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_at, updated_at, id_propertie, id_use_ground, soil_date_expedition, soil_date_expiration, document_identification', 'safe', 'on'=>'search'),
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
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'id_propertie' => 'Id Propertie',
			'id_use_ground' => 'Id Use Ground',
			'soil_date_expedition' => 'Soil Date Expedition',
			'soil_date_expiration' => 'Soil Date Expiration',
			'document_identification' => 'Document Identification',
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
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('id_propertie',$this->id_propertie,true);
		$criteria->compare('id_use_ground',$this->id_use_ground);
		$criteria->compare('soil_date_expedition',$this->soil_date_expedition,true);
		$criteria->compare('soil_date_expiration',$this->soil_date_expiration,true);
		$criteria->compare('document_identification',$this->document_identification,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Identification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
