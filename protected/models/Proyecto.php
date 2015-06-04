<?php

/**
 * This is the model class for table "proyecto".
 *
 * The followings are the available columns in table 'proyecto':
 * @property integer $id_proyecto
 * @property string $id_crm
 * @property string $titulo
 * @property string $fecha
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_status
 * @property string $comentario
 * @property integer $id_agente
 * @property string $lote
 *
 * The followings are the available model relations:
 * @property Clientes[] $clientes
 * @property Agente $idAgente
 */
class Proyecto extends GActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_status, id_agente', 'numerical', 'integerOnly'=>true),
			array('id_crm, titulo, fecha, fecha_inicio, fecha_fin, comentario, lote', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_proyecto, id_crm, titulo, fecha, fecha_inicio, fecha_fin, id_status, comentario, id_agente, lote', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Clientes', 'id_proyecto'),
			'idAgente' => array(self::BELONGS_TO, 'Agente', 'id_agente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_proyecto' => 'Id Proyecto',
			'id_crm' => 'Id Crm',
			'titulo' => 'Proyecto',
			'fecha' => 'Fecha',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'id_status' => 'Id Status',
			'comentario' => 'Comentario',
			'id_agente' => 'Id Agente',
			'lote' => 'Lote',
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

		$criteria->compare('id_proyecto',$this->id_proyecto);
		$criteria->compare('id_crm',$this->id_crm,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('id_agente',$this->id_agente);
		$criteria->compare('lote',$this->lote,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function nombreproyectos()
        {
            $sql = "SELECT titulo FROM proyecto";            
            
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $dataReader = $command->queryAll();
            return array_filter($dataReader) ;
            

        }
        
        
        public static function getListProyecto()
        {
            return CHtml::listData(Proyecto::model()->findAll(),'id_proyecto','titulo');
        }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
