<?php

/**
 * This is the model class for table "licenses".
 *
 * The followings are the available columns in table 'licenses':
 * @property string $id
 * @property string $id_propertie
 * @property string $type_license
 * @property string $lic_date_expedition
 * @property string $lic_date_expiration
 * @property string $id_document
 * @property string $created_at
 * @property string $updated_at
 */
class Licenses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'licenses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_propertie, type_license, lic_date_expedition, lic_date_expiration', 'required'),
			array('id_propertie', 'length', 'max'=>10),
			array('type_license', 'length', 'max'=>100),
			array('id_document', 'length', 'max'=>500),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_propertie, type_license, lic_date_expedition, lic_date_expiration, id_document, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'id_propertie' => 'Id Propertie',
			'type_license' => 'Type License',
			'lic_date_expedition' => 'Lic Date Expedition',
			'lic_date_expiration' => 'Lic Date Expiration',
			'id_document' => 'Id Document',
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
		$criteria->compare('id_propertie',$this->id_propertie,true);
		$criteria->compare('type_license',$this->type_license,true);
		$criteria->compare('lic_date_expedition',$this->lic_date_expedition,true);
		$criteria->compare('lic_date_expiration',$this->lic_date_expiration,true);
		$criteria->compare('id_document',$this->id_document,true);
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
	 * @return Licenses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
