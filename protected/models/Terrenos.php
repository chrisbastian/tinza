<?php

/**
 * This is the model class for table "terrenos".
 *
 * The followings are the available columns in table 'terrenos':
 * @property integer $id_terreno
 * @property string $titulo
 * @property string $imagen1
 * @property string $imagen2
 * @property string $imagen3
 * @property string $imagen4
 * @property string $imagen5
 * @property string $imagen6
 * @property string $precio
 * @property string $metros_cuadrados
 * @property string $region
 * @property string $ciudad
 * @property string $comuna
 * @property string $descripcion
 * @property integer $id_vendedor
 */
class Terrenos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'terrenos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo,telefono,imagen1, precio, metros_cuadrados, region, ciudad, comuna, descripcion, id_vendedor, direccion, pais', 'required'),
			array('titulo, precio, metros_cuadrados, region, ciudad, comuna, pais, direccion', 'length', 'max'=>100),
			array('imagen1, imagen2, imagen3, imagen4, imagen5, imagen6', 'length', 'max'=>500),
			array('bloqueado,descripcion, imagen2, imagen3, imagen4, imagen5, imagen6,', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_terreno, titulo, imagen1, imagen2, imagen3, imagen4, imagen5, imagen6, precio, metros_cuadrados, region, ciudad, comuna, descripcion, id_vendedor', 'safe', 'on'=>'search'),
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
			'id_terreno' => 'Id Terreno',
			'titulo' => 'Titulo',
			'imagen1' => 'Imagen1',
			'imagen2' => 'Imagen2',
			'imagen3' => 'Imagen3',
			'imagen4' => 'Imagen4',
			'imagen5' => 'Imagen5',
			'imagen6' => 'Imagen6',
			'precio' => 'Precio',
			'metros_cuadrados' => 'Metros Cuadrados',
			'region' => 'Region',
			'ciudad' => 'Ciudad',
			'comuna' => 'Comuna',
			'descripcion' => 'Descripcion',
			'id_vendedor' => 'Id Vendedor',
			'direccion'=>'Dirección'
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

		$criteria->compare('id_terreno',$this->id_terreno);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('imagen1',$this->imagen1,true);
		$criteria->compare('imagen2',$this->imagen2,true);
		$criteria->compare('imagen3',$this->imagen3,true);
		$criteria->compare('imagen4',$this->imagen4,true);
		$criteria->compare('imagen5',$this->imagen5,true);
		$criteria->compare('imagen6',$this->imagen6,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('metros_cuadrados',$this->metros_cuadrados,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('comuna',$this->comuna,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_vendedor',$this->id_vendedor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Terrenos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
