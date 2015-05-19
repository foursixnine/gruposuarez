<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property string $id_gruposuarez
 * @property string $cedula
 * @property string $nom_cliente
 * @property string $ape_cliente
 * @property string $fe_cumpleannos
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property string $telefono2
 * @property integer $id_cliente
 * @property integer $id_status
 * @property string $ocupacion
 * @property string $id_ciudad
 * @property string $fax
 * @property string $ruc
 * @property string $estado_civil
 * @property string $nacionalidad
 * @property string $sexo
 * @property string $lugar_trabajo
 * @property integer $id_proyecto
 * @property string $referencia
 * @property string $telef_referecia
 * @property string $parentesco
 * @property string $treinta
 * @property string $sesenta
 * @property string $noventa
 * @property string $cientoveiente
 *
 * The followings are the available model relations:
 * @property Proyecto $idProyecto
 * @property Pago[] $pagos
 * @property Gestion[] $gestions
 * @property Cobros[] $cobroses
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_gruposuarez', 'required'),
			array('id_status, id_proyecto', 'numerical', 'integerOnly'=>true),
                        array('treinta, sesenta', 'length', 'max'=>1),
			array('cedula, nom_cliente, ape_cliente, fe_cumpleannos, direccion, telefono, celular, correo, telefono2, ocupacion, id_ciudad, fax, ruc, estado_civil, nacionalidad, sexo, lugar_trabajo, referencia, telef_referecia, parentesco', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_gruposuarez, cedula, nom_cliente, ape_cliente, fe_cumpleannos, direccion, telefono, celular, correo, telefono2, id_cliente, id_status, ocupacion, id_ciudad, fax, ruc, estado_civil, nacionalidad, sexo, lugar_trabajo, id_proyecto, referencia, telef_referecia, parentesco', 'safe', 'on'=>'search'),
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
			'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
			'pagos' => array(self::HAS_MANY, 'Pago', 'id_cliente'),
			'gestions' => array(self::HAS_MANY, 'Gestion', 'id_cliente'),
			'cobroses' => array(self::HAS_MANY, 'Cobros', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gruposuarez' => 'Id Gruposuarez',
			'cedula' => 'CedulaVacia',
			'nom_cliente' => 'Nombre Cliente',
			'ape_cliente' => 'Apellido Cliente',
			'fe_cumpleannos' => 'Fecha de Cumpleaños',
			'direccion' => 'Dirección',
			'telefono' => 'Teléfono',
			'celular' => 'Celular',
			'correo' => 'Correo',
			'telefono2' => 'Teléfono Casa',
			'id_cliente' => 'Id Cliente',
			'id_status' => 'Id Status',
			'ocupacion' => 'Ocupacion',
			'id_ciudad' => 'Id Ciudad',
			'fax' => 'Fax',
			'ruc' => 'Cedula',
			'estado_civil' => 'Estado Civil',
			'nacionalidad' => 'Nacionalidad',
			'sexo' => 'Sexo',
			'lugar_trabajo' => 'Lugar Trabajo',
			'id_proyecto' => 'Id Proyecto',
			'referencia' => 'Referencia',
			'telef_referecia' => 'Telef Referecia',
			'parentesco' => 'Parentesco',
                        'treinta' => '30 Días',
			'sesenta' => '60 Días',
			'noventa' => '90 Días',
			'cientoveiente' => '120 Días',
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

		$criteria->compare('id_gruposuarez',$this->id_gruposuarez,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nom_cliente',$this->nom_cliente,true);
		$criteria->compare('ape_cliente',$this->ape_cliente,true);
		$criteria->compare('fe_cumpleannos',$this->fe_cumpleannos,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('telefono2',$this->telefono2,true);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('id_ciudad',$this->id_ciudad,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('lugar_trabajo',$this->lugar_trabajo,true);
		$criteria->compare('id_proyecto',$this->id_proyecto);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('telef_referecia',$this->telef_referecia,true);
		$criteria->compare('parentesco',$this->parentesco,true);
                $criteria->compare('treinta',$this->treinta,true);
		$criteria->compare('sesenta',$this->sesenta,true);
		$criteria->compare('noventa',$this->noventa,true);
		$criteria->compare('cientoveiente',$this->cientoveiente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
          public function buscarproyecto()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_gruposuarez',$this->id_gruposuarez,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nom_cliente',$this->nom_cliente,true);
		$criteria->compare('ape_cliente',$this->ape_cliente,true);
		$criteria->compare('fe_cumpleannos',$this->fe_cumpleannos,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('telefono2',$this->telefono2,true);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('id_ciudad',$this->id_ciudad,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('ruc',$this->ruc,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('lugar_trabajo',$this->lugar_trabajo,true);
		$criteria->compare('id_proyecto',$this->id_proyecto);
        /*$criteria->with =array('idProyecto');
       $criteria->compare('idProyecto.titulo', $this->titulo, true);*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
 

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
