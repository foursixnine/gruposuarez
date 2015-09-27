<?php

/**
 * This is the model class for table "tramite".
 *
 * The followings are the available columns in table 'tramite':
 * @property integer $id_tramite
 * @property integer $id_cliente_gs
 * @property string $descripcion
 * @property string $fecha_pazysalvo
 * @property integer $id_expediente_fisico
 * @property integer $id_usuario
 * @property integer $casa_entregada
 * @property string $fecha_inicio
 * @property integer $id_pasos
 * @property string $fecha_fin
 * @property integer $id_razones_estado
 * @property integer $id_estado
 * @property string $fecha_paso
 * @property integer $id_responsable_ejecucion
 * @property string $plano
 * @property string $fecha_entrega
 * @property string $ganancia_capital
 * @property integer $permiso_ocupacion
 * @property integer $inicio
 * @property string $fecha_escritura
 * @property string $fecha_inscripcion_escritura
 * @property string $num_escritura
 * @property string $num_finca_inscrita
 * @property string $transferencia_inmueble
 * @property string $num_permiso_ocupacion
 * The followings are the available model relations:
 * @property Chat[] $chats
 * @property Cliente $idClienteGs
 * @property ExpedienteFisico $idExpedienteFisico
 * @property Usuarios $idUsuario
 * @property Estado $idEstado
 * @property ResponsableEjecucion $idResponsableEjecucion
 * @property Paso $idPasos
 */
class Tramite extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tramite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente_gs, id_expediente_fisico, id_usuario, id_pasos, id_razones_estado, id_estado, id_responsable_ejecucion, permiso_ocupacion, inicio', 'numerical', 'integerOnly'=>true),
			array('descripcion, fecha_pazysalvo, fecha_inicio, fecha_fin, fecha_paso, plano, fecha_entrega, ganancia_capital', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tramite, id_cliente_gs, descripcion, fecha_pazysalvo, id_expediente_fisico, id_usuario, fecha_inicio, id_pasos, fecha_fin, id_razones_estado, id_estado, fecha_paso, id_responsable_ejecucion, plano, fecha_entrega, ganancia_capital, permiso_ocupacion, inicio', 'safe', 'on'=>'search'),
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
			'chats' => array(self::HAS_MANY, 'Chat', 'id_tramite'),
			'idClienteGs' => array(self::BELONGS_TO, 'Cliente', 'id_cliente_gs'),
			'idExpedienteFisico' => array(self::BELONGS_TO, 'ExpedienteFisico', 'id_expediente_fisico'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idResponsableEjecucion' => array(self::BELONGS_TO, 'ResponsableEjecucion', 'id_responsable_ejecucion'),
			'idPasos' => array(self::BELONGS_TO, 'Paso', 'id_pasos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tramite' => 'Id Tramite',
			'id_cliente_gs' => 'Id Cliente Gs',
			'descripcion' => 'Descripcion',
			'fecha_pazysalvo' => 'Fecha Pazysalvo',
			'id_expediente_fisico' => 'Expediente Fisico',
			'id_usuario' => 'Id Usuario',
			'fecha_inicio' => 'Fecha Inicio',
			'id_pasos' => 'Pasos',
			'fecha_fin' => 'Fecha Fin',
			'id_razones_estado' => 'Id Razones Estado',
			'id_estado' => 'Estado',
			'fecha_paso' => 'Fecha Paso',
			'id_responsable_ejecucion' => 'Responsable Ejecucion',
			'plano' => 'Plano',
			'fecha_entrega' => 'Fecha Entrega',
			'ganancia_capital' => 'Ganancia Capital',
			'permiso_ocupacion' => 'Permiso Ocupacion',
			'inicio' => 'Inicio',
            'fecha_escritura' => 'Fecha Escritura',
			'fecha_inscripcion_escritura' => 'Fecha Inscripcion Escritura',
			'num_escritura' => 'Num Escritura',
			'num_finca_inscrita' => 'Num Finca Inscrita',
			'transferencia_inmueble' => 'Impuesto Transferencia de Inmueble',
			'num_permiso_ocupacion'  => 'Num Permiso de Ocupacion',
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
                $criteria->condition = 'inicio = 0 ';
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_pasos',$this->id_pasos);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('plano',$this->plano,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('ganancia_capital',$this->ganancia_capital,true);
		$criteria->compare('permiso_ocupacion',$this->permiso_ocupacion);
		$criteria->compare('inicio',$this->inicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function activos()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = 'inicio = 0 ';
        

           
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_pasos',$this->id_pasos);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('plano',$this->plano,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('ganancia_capital',$this->ganancia_capital,true);
		$criteria->compare('permiso_ocupacion',$this->permiso_ocupacion);
		$criteria->compare('inicio',$this->inicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function tramitadora()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = 'inicio = 1 AND id_pasos!=11';
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_pasos',$this->id_pasos);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('plano',$this->plano,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('ganancia_capital',$this->ganancia_capital,true);
		$criteria->compare('permiso_ocupacion',$this->permiso_ocupacion);
		$criteria->compare('inicio',$this->inicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
                public function tramitesliquidados()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = 'inicio = 1 AND id_pasos=11';
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_pasos',$this->id_pasos);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('plano',$this->plano,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('ganancia_capital',$this->ganancia_capital,true);
		$criteria->compare('permiso_ocupacion',$this->permiso_ocupacion);
		$criteria->compare('inicio',$this->inicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tramite the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
