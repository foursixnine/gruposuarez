<?php

/**
 * This is the model class for table "pago".
 *
 * The followings are the available columns in table 'pago':
 * @property integer $id_pago
 * @property string $fecha_pago
 * @property integer $id_proyecto
 * @property integer $monto_total
 * @property integer $id_cliente
 * @property integer $id_tipo_cobro
 * @property string $trienta
 * @property string $sesenta
 * @property string $noventa
 * @property string $cientoveiente
 *
 * The followings are the available model relations:
 * @property Clientes $idCliente
 * @property TipoCobro $idTipoCobro
 */
class Pago extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_proyecto, monto_total, id_cliente, id_tipo_cobro', 'numerical', 'integerOnly'=>true),
			array('fecha_pago, trienta, sesenta, noventa, cientoveiente', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pago, fecha_pago, id_proyecto, monto_total, id_cliente, id_tipo_cobro, trienta, sesenta, noventa, cientoveiente', 'safe', 'on'=>'search'),
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
			'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'idTipoCobro' => array(self::BELONGS_TO, 'TipoCobro', 'id_tipo_cobro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pago' => 'Id Pago',
			'fecha_pago' => 'Fecha Pago',
			'id_proyecto' => 'Id Proyecto',
			'monto_total' => 'Monto Total',
			'id_cliente' => 'Id Cliente',
			'id_tipo_cobro' => 'Id Tipo Cobro',
			'trienta' => 'Trienta',
			'sesenta' => 'Sesenta',
			'noventa' => 'Noventa',
			'cientoveiente' => 'Cientoveiente',
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

		$criteria->compare('id_pago',$this->id_pago);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('id_proyecto',$this->id_proyecto);
		$criteria->compare('monto_total',$this->monto_total);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('id_tipo_cobro',$this->id_tipo_cobro);
		$criteria->compare('trienta',$this->trienta,true);
		$criteria->compare('sesenta',$this->sesenta,true);
		$criteria->compare('noventa',$this->noventa,true);
		$criteria->compare('cientoveiente',$this->cientoveiente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
