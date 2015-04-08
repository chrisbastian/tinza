<?php

/**
 * This is the model class for table "correos".
 *
 * The followings are the available columns in table 'correos':
 * @property integer $id_correo
 * @property integer $id_user
 * @property string $de
 * @property string $bcc
 * @property string $titulo
 * @property string $descripcion
 */
class Correos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'correos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, de, bcc, titulo, descripcion', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('de, bcc, titulo, descripcion', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_correo, id_user, de, bcc, titulo, descripcion', 'safe', 'on'=>'search'),
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
			'id_correo' => 'Id Correo',
			'id_user' => 'Id User',
			'de' => 'De',
			'bcc' => 'Bcc',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('id_correo',$this->id_correo);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('de',$this->de,true);
		$criteria->compare('bcc',$this->bcc,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Correos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
