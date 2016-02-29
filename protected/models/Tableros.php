<?php

/**
 * This is the model class for table "tableros".
 *
 * The followings are the available columns in table 'tableros':
 * @property integer $id_tablero
 * @property string $id_crm_proyecto
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $campo
 * @property integer $id_usuario
 * @property string $mes
 * @property string $anno
 * @property integer $id_tipo_cobro
 *
 * The followings are the available model relations:
 * @property Proyecto $idCrmProyecto
 * @property Usuarios $idUsuario
 * @property TipoCobro $idTipoCobro
 */
class Tableros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tableros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, id_tipo_cobro', 'numerical', 'integerOnly'=>true),
			array('id_crm_proyecto, id_banco, fecha_inicio, fecha_fin, campo, mes, anno', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tablero,id_banco, id_crm_proyecto, fecha_inicio, fecha_fin, campo, id_usuario, mes, anno, id_tipo_cobro', 'safe', 'on'=>'search'),
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
			'idCrmProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_crm_proyecto'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'idTipoCobro' => array(self::BELONGS_TO, 'TipoCobro', 'id_tipo_cobro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tablero' => 'Id Tablero',
			'id_crm_proyecto' => 'Id Crm Proyecto',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'campo' => 'Campo',
			'id_usuario' => 'Id Usuario',
			'mes' => 'Mes',
			'anno' => 'A&ntilde;o',
			'id_tipo_cobro' => 'Id Tipo Cobro',
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

		$criteria->compare('id_tablero',$this->id_tablero);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('campo',$this->campo,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('mes',$this->mes,true);
		$criteria->compare('anno',$this->anno,true);
		$criteria->compare('id_tipo_cobro',$this->id_tipo_cobro);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tableros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
