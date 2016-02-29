<?php

/**
 * This is the model class for table "tramite_actividad".
 *
 * The followings are the available columns in table 'tramite_actividad':
 * @property integer $id_tramite_actividad
 * @property integer $id_tramite
 * @property string $fecha_tramite_actividad
 * @property integer $id_estado
 * @property integer $id_paso
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Estado $idEstado
 * @property Paso $idPaso
 */
class TramiteActividad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tramite_actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tramite', 'required'),
			array('id_tramite, id_estado, id_paso', 'numerical', 'integerOnly'=>true),
			array('fecha_tramite_actividad, observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tramite_actividad, id_tramite, fecha_tramite_actividad, id_estado, id_paso, observaciones', 'safe', 'on'=>'search'),
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
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idPaso' => array(self::BELONGS_TO, 'Paso', 'id_paso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tramite_actividad' => 'Id Tramite Actividad',
			'id_tramite' => 'Id Tramite',
			'fecha_tramite_actividad' => 'Fecha Tramite Actividad',
			'id_estado' => 'Id Estado',
			'id_paso' => 'Id Paso',
			'observaciones' => 'Observaciones',
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

		$criteria->compare('id_tramite_actividad',$this->id_tramite_actividad);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('fecha_tramite_actividad',$this->fecha_tramite_actividad,true);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_paso',$this->id_paso);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        	public function tramitesactividad($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
 		$criteria->compare('id_tramite',$id);
		$criteria->compare('id_tramite_actividad',$this->id_tramite_actividad);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('fecha_tramite_actividad',$this->fecha_tramite_actividad,true);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_paso',$this->id_paso);
		$criteria->compare('observaciones',$this->observaciones,true);
        $criteria->order = 'id_tramite_actividad desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TramiteActividad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
