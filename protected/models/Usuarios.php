<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string $rol
 * @property string $empresa
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $rfc
 * @property string $telefono
 * @property string $celular
 * @property string $calle_domicilio
 * @property string $num_ext_domicilio
 * @property string $num_int_domicilio
 * @property string $colonia_domicilio
 * @property string $estado_domicilio
 * @property string $municipio_domicilio
 * @property string $cp_domicilio
 * @property string $calle_fiscal
 * @property string $num_ext_fiscal
 * @property string $num_int_fiscal
 * @property string $colonia_fiscal
 * @property string $estado_fiscal
 * @property string $municipio_fiscal
 * @property string $cp_fiscal
 */
class Usuarios extends CActiveRecord
{
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
			array('nombre, email, password, empresa, apellido_paterno, apellido_materno, rfc, telefono, celular, calle_domicilio, num_ext_domicilio, num_int_domicilio, colonia_domicilio, estado_domicilio, municipio_domicilio, cp_domicilio', 'required'),

			array('id_fuente', 'numerical', 'integerOnly'=>true),
			array('email','email'),
			array('nombre email, fecha_registro,password,status, rol, empresa, apellido_paterno, apellido_materno, rfc, telefono, celular, calle_domicilio, num_ext_domicilio, num_int_domicilio, colonia_domicilio, estado_domicilio, municipio_domicilio, cp_domicilio, calle_fiscal, num_ext_fiscal, num_int_fiscal, colonia_fiscal, estado_fiscal, municipio_fiscal, cp_fiscal', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, fecha_registro, nombre, email, password, rol, empresa, apellido_paterno, apellido_materno, rfc, telefono, celular, calle_domicilio, num_ext_domicilio, num_int_domicilio, colonia_domicilio, estado_domicilio, municipio_domicilio, cp_domicilio, calle_fiscal, num_ext_fiscal, num_int_fiscal, colonia_fiscal, estado_fiscal, municipio_fiscal, cp_fiscal', 'safe', 'on'=>'search'),
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
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'password' => 'Password',
			'rol' => 'Rol',
			'empresa' => 'Empresa',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'rfc' => 'Rfc',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'calle_domicilio' => 'Calle Domicilio',
			'num_ext_domicilio' => 'Num Ext Domicilio',
			'num_int_domicilio' => 'Num Int Domicilio',
			'colonia_domicilio' => 'Colonia Domicilio',
			'estado_domicilio' => 'Estado Domicilio',
			'municipio_domicilio' => 'Municipio Domicilio',
			'cp_domicilio' => 'Cp Domicilio',
			'calle_fiscal' => 'Calle Fiscal',
			'num_ext_fiscal' => 'Num Ext Fiscal',
			'num_int_fiscal' => 'Num Int Fiscal',
			'colonia_fiscal' => 'Colonia Fiscal',
			'estado_fiscal' => 'Estado Fiscal',
			'municipio_fiscal' => 'Municipio Fiscal',
			'cp_fiscal' => 'Cp Fiscal',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('rol',$this->rol,true);
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('calle_domicilio',$this->calle_domicilio,true);
		$criteria->compare('num_ext_domicilio',$this->num_ext_domicilio,true);
		$criteria->compare('num_int_domicilio',$this->num_int_domicilio,true);
		$criteria->compare('colonia_domicilio',$this->colonia_domicilio,true);
		$criteria->compare('estado_domicilio',$this->estado_domicilio,true);
		$criteria->compare('municipio_domicilio',$this->municipio_domicilio,true);
		$criteria->compare('cp_domicilio',$this->cp_domicilio,true);
		$criteria->compare('calle_fiscal',$this->calle_fiscal,true);
		$criteria->compare('num_ext_fiscal',$this->num_ext_fiscal,true);
		$criteria->compare('num_int_fiscal',$this->num_int_fiscal,true);
		$criteria->compare('colonia_fiscal',$this->colonia_fiscal,true);
		$criteria->compare('estado_fiscal',$this->estado_fiscal,true);
		$criteria->compare('municipio_fiscal',$this->municipio_fiscal,true);
		$criteria->compare('cp_fiscal',$this->cp_fiscal,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
