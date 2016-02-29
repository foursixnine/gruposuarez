<?php

/**
 * This is the model class for table "cobros".
 *
 * The followings are the available columns in table 'cobros':
 * @property integer $id_cobros
 * @property string $fecha_cobro
 * @property integer $id_proyecto
 * @property integer $monto_total
 * @property integer $monto_abonado
 * @property integer $id_cliente_gs
 * @property integer $id_tipo_cobro
 * @property string $id_cartera
 * @property string $monto_liquidacion
 * @property string $monto_ultimo_pago
 *
 * The followings are the available model relations:
 * @property TipoCobro $idTipoCobro
 * @property Cliente $idClienteGs
 */
class Cobros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cobros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_proyecto, monto_total, monto_abonado, id_cliente_gs, id_tipo_cobro', 'numerical', 'integerOnly'=>true),
			array('fecha_cobro, id_cartera, monto_liquidacion, monto_ultimo_pago', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cobros, fecha_cobro, id_proyecto, monto_total, monto_abonado, id_cliente_gs, id_tipo_cobro, id_cartera, monto_liquidacion, monto_ultimo_pago', 'safe', 'on'=>'search'),
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
			'idTipoCobro' => array(self::BELONGS_TO, 'TipoCobro', 'id_tipo_cobro'),
			'idClienteGs' => array(self::BELONGS_TO, 'Cliente', 'id_cliente_gs'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cobros' => 'Id Cobros',
			'fecha_cobro' => 'Fecha Cobro',
			'id_proyecto' => 'Id Proyecto',
			'monto_total' => 'Monto Total',
			'monto_abonado' => 'Monto Abonado',
			'id_cliente_gs' => 'Id Cliente Gs',
			'id_tipo_cobro' => 'Id Tipo Cobro',
			'id_cartera' => 'Id Cartera',
			'monto_liquidacion' => 'Monto Liquidacion',
			'monto_ultimo_pago' => 'Monto Ultimo Pago',
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

		$criteria->compare('id_cobros',$this->id_cobros);
		$criteria->compare('fecha_cobro',$this->fecha_cobro,true);
		$criteria->compare('id_proyecto',$this->id_proyecto);
		$criteria->compare('monto_total',$this->monto_total);
		$criteria->compare('monto_abonado',$this->monto_abonado);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('id_tipo_cobro',$this->id_tipo_cobro);
		$criteria->compare('id_cartera',$this->id_cartera,true);
		$criteria->compare('monto_liquidacion',$this->monto_liquidacion,true);
		$criteria->compare('monto_ultimo_pago',$this->monto_ultimo_pago,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cobros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
