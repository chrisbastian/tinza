<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $ciudad
 * @property string $area
 * @property integer $experiencia
 * @property integer $edad
 * @property integer $llave
 * @property string $estado
 * @property string $pais
 * @property string $dirección
 *
 * The followings are the available model relations:
 * @property Llaves $llave0
 */
class Usuarios extends CActiveRecord
{
	public $confirmar_password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email,password,usuario', 'required'),

			array('email','email'),
			array('email','unique','message'=>'Este email ya fue utilizado por otra persona.'),
			array('usuario','unique','message'=>'Este usuario ya fue utilizado por otra persona.'),
			array('usuario', 'length', 'max'=>20),
			array('nombre, ciudad,telefono, estado, pais, dirección,email,rol', 'length', 'max'=>500),

			/*
			array('nombre','match' ,'pattern'=>'/^[a-zA-Z´ñÑáéíóúÁÉÍÓÚ\s]+$/u','message'=>'El Nombre solo puede llevar letras,espacios y tildes.'),
			array('dirección','match' ,'pattern'=>'/^[a-zA-Z0-9#´ñÑáéíóúÁÉÍÓÚ\s]+$/u','message'=>'La Dirección solo puede llevar letras,números,espacios y tildes.'),
			array('ciudad','match' ,'pattern'=>'/^[a-zA-Z´-#ñÑáéíóúÁÉÍÓÚ\s]+$/u','message'=>'La Ciudad solo puede llevar letras,espacios y tildes.'),
			array('area','match' ,'pattern'=>'/^[a-zA-Z´,-#ñÑáéíóúÁÉÍÓÚ\s]+$/u','message'=>'La Dirección solo puede llevar letras,espacios y tildes.'),
			*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, nombre, ciudad,email, edad, estado, pais,password, dirección,rol,usuario', 'safe', 'on'=>'search'),
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
			'llave0' => array(self::BELONGS_TO, 'Llaves', 'llave'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'ciudad' => 'Ciudad',
			'estado' => 'Estado',
			'pais' => 'País',
			'dirección' => 'Dirección',
			'email'=>'Correo Electronico',
			'password'=>'Contraseña',
			'confirmar_password'=>'Confirmar Contraseña',
			'telefono'=>'Telefono',
			'usuario'=>'Usuario',


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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('llave',$this->llave);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('dirección',$this->dirección,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('curriculum',$this->curriculum,true);
		$criteria->compare('confirmar_password',$this->confirmar_password,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('sponsor',$this->sponsor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
