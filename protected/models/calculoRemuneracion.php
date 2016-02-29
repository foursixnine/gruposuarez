<?php

/**
 * This is the model class for table "calculo_remuneracion".
 *
 * The followings are the available columns in table 'calculo_remuneracion':
 * @property integer $id_calculo_remuneracion
 * @property integer $id_usuario
 * @property string $resultado
 * @property integer $id_pago_remuneracion
 * @property string $cumplimiento
 * @property string $peso
 * @property string $peso1
 * @property string $resultadov
 *
 * The followings are the available model relations:
 * @property PagoRemuneracion $idPagoRemuneracion
 * @property Usuarios $idUsuario
 */
class calculoRemuneracion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculo_remuneracion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resultado, cumplimiento, peso, peso1, resultadov', 'required'),
			array('id_usuario, id_pago_remuneracion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id_calculo_remuneracion, id_usuario, resultado, id_pago_remuneracion, cumplimiento, peso, peso1, resultadov', 'safe', 'on'=>'search'),
//array('peso1', 'compare', 'compareAttribute'=>'peso', 'compareValue'=>'100', 'operator'=>'>=', 'message'=>'Debe repetir la clave exactamente igual'),
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
			'idPagoRemuneracion' => array(self::BELONGS_TO, 'PagoRemuneracion', 'id_pago_remuneracion'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
		public function attributeLabels()
	{
		return array(
			'id_calculo_remuneracion' => 'Calculo Remuneracion',
			'id_usuario' => 'Usuario',
			'resultado' => 'Resultado Translado de Cartera',
			'id_pago_remuneracion' => 'Id Pago Remuneracion',
			'cumplimiento' => 'Cumplimiento Total',
			'peso' => 'Peso Cartera Corriente',
			'peso1' => 'Peso Cartera Vencidad',
			'resultadov' => 'Resultado Cartera Vencida',
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

		$criteria->compare('id_calculo_remuneracion',$this->id_calculo_remuneracion);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('resultado',$this->resultado,true);
		$criteria->compare('id_pago_remuneracion',$this->id_pago_remuneracion);
		$criteria->compare('cumplimiento',$this->cumplimiento,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('peso1',$this->peso1,true);
		$criteria->compare('resultadov',$this->resultadov,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return calculoRemuneracion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
