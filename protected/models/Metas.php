<?php

/**
 * This is the model class for table "metas".
 *
 * The followings are the available columns in table 'metas':
 * @property integer $id_meta
 * @property integer $id_proyecto
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $monto
 * @property string $porcentaje_meta
 * @property string $monto_mes_proyecto
 * @property integer $id_usuario
 * @property integer $cartera
 *
 * The followings are the available model relations:
 * @property Proyecto $idProyecto
 * @property Usuarios $idUsuario
 */
class Metas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'metas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_proyecto, fecha_inicio, fecha_fin, monto, porcentaje_meta, monto_mes_proyecto', 'required'),
			array('id_proyecto, id_usuario, cartera', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_meta, id_proyecto, fecha_inicio, fecha_fin, monto, porcentaje_meta, monto_mes_proyecto, id_usuario, cartera', 'safe', 'on'=>'search'),
		
    array('fecha_inicio, fecha_fin, id_proyecto', 'unique'),                
 
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_meta' => 'Id Meta',
			'id_proyecto' => 'Id Proyecto',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'monto' => 'Monto',
			'porcentaje_meta' => 'Porcentaje Meta',
			'monto_mes_proyecto' => 'Monto Mes Proyecto',
			'id_usuario' => 'Id Usuario',
			'cartera' => '1 o 2 (Para determinar si esta vencida o no)',
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

		$criteria->compare('id_meta',$this->id_meta);
		$criteria->compare('id_proyecto',$this->id_proyecto);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('porcentaje_meta',$this->porcentaje_meta,true);
		$criteria->compare('monto_mes_proyecto',$this->monto_mes_proyecto,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('cartera',$this->cartera);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Metas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
