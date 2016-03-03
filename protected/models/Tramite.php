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
 * @property string $permiso_ocupacion
 * @property integer $inicio
 * @property string $fecha_escritura
 * @property string $fecha_inscripcion_escritura
 * @property string $num_escritura
 * @property string $num_finca_inscrita
 * @property string $num_permiso_ocupacion
 * @property integer $casa_entregada
 * @property string $num_formulario
 * @property string $transferencia_inmueble
 * @property string $id_proyecto
 * @property integer $id_rango
 *
 * The followings are the available model relations:
 * @property Chat[] $chats
 * @property TramitePasos[] $tramitePasoses
 * @property Cliente $idClienteGs
 * @property Estado $idEstado
 * @property ExpedienteFisico $idExpedienteFisico
 * @property Paso $idPasos
 * @property ResponsableEjecucion $idResponsableEjecucion
 * @property Usuarios $idUsuario
 * @property Proyecto $idProyecto
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
    
    public $fecha_paso_range = '';

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_rango,id_cliente_gs, id_expediente_fisico, id_usuario, id_pasos, id_razones_estado, id_estado, id_responsable_ejecucion, inicio, casa_entregada', 'numerical', 'integerOnly'=>true),
            array('descripcion, fecha_pazysalvo, fecha_inicio, fecha_fin, fecha_paso_range, plano, fecha_entrega, ganancia_capital, permiso_ocupacion, fecha_escritura, fecha_inscripcion_escritura, num_escritura, num_finca_inscrita, num_permiso_ocupacion, num_formulario, transferencia_inmueble, id_proyecto', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('fecha_paso,id_tramite, id_cliente_gs, descripcion, fecha_pazysalvo, id_expediente_fisico, id_usuario, fecha_inicio, id_pasos, fecha_fin, id_razones_estado, id_estado, fecha_paso_range, id_responsable_ejecucion, plano, fecha_entrega, ganancia_capital, permiso_ocupacion, inicio, fecha_escritura, fecha_inscripcion_escritura, num_escritura, num_finca_inscrita, num_permiso_ocupacion, casa_entregada, num_formulario, transferencia_inmueble, id_proyecto', 'safe', 'on'=>'search'),
       //     array( '', 'date' , 'format' => "Y-m-d"),
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
            'tramitePasoses' => array(self::HAS_MANY, 'TramitePasos', 'id_tramite'),
            'idClienteGs' => array(self::BELONGS_TO, 'Cliente', 'id_cliente_gs'),
            'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
            'idExpedienteFisico' => array(self::BELONGS_TO, 'ExpedienteFisico', 'id_expediente_fisico'),
            'idPasos' => array(self::BELONGS_TO, 'Paso', 'id_pasos'),
            'idResponsableEjecucion' => array(self::BELONGS_TO, 'ResponsableEjecucion', 'id_responsable_ejecucion'),
            'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
            'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
               'idRango' => array(self::BELONGS_TO, 'Rango', 'id_rango'),
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
			'id_razones_estado' => 'Razones Estado',
			'id_estado' => 'Estado',
			'fecha_paso' => 'Fecha Paso',
			'id_responsable_ejecucion' => 'Responsable Ejecucion',
			'plano' => 'Plano',
			'fecha_entrega' => 'Fecha Entrega de la Casa',
			'ganancia_capital' => 'Ganancia Capital',
			'permiso_ocupacion' => 'Permiso Ocupacion',
			'inicio' => 'Inicio',
            'fecha_escritura' => 'Fecha Escritura',
			'fecha_inscripcion_escritura' => 'Fecha Inscripcion Escritura',
			'num_escritura' => 'Num Escritura',
			'num_finca_inscrita' => 'Num Finca Inscrita',
			'transferencia_inmueble' => 'Impuesto Transferencia de Inmueble',
			'num_permiso_ocupacion'  => 'Num Permiso de Ocupacion',
			'num_formulario'  => 'Num de Formulario',
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
	 public static function parseDateRange($value, $createTime = false)
    {
        if (preg_match("/(\d{4}-\d{2}-\d{2})\s*-\s*(\d{4}-\d{2}-\d{2})/", $value, $match)) {
            if ($createTime) {
                return array(strtotime($match[1] . ' 00:00:00'), strtotime($match[2] . ' 23:59:59'));
            } else {
                return array($match[1], $match[2]);
            }
        }
        return false;
    }

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
       // $criteria->condition = 'inicio = 0 ';

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
		//$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('plano',$this->plano,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('ganancia_capital',$this->ganancia_capital,true);
		$criteria->compare('permiso_ocupacion',$this->permiso_ocupacion);
		$criteria->compare('id_proyecto',$this->id_proyecto);

		
		$criteria->compare('inicio',$this->inicio);

        $criteria->order = 'id_tramite DESC';


        $dateRange = self::parseDateRange($this->fecha_paso_range, true);
   
        if ($dateRange) {
            list($startDate, $endDate) = $dateRange;
            print_r(date('Y-m-d', $endDate));
        	
			$criteria->addBetweenCondition('fecha_paso', date('Y-m-d', $startDate), date('Y-m-d', $endDate));        
        } else {
        	
        }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function activos()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->condition = 'inicio = 0 ';
        

             //$criteria->compare('idUsuario.id_proyecto',$this->id_cliente_gs,true);
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
        $criteria->order = 'id_tramite DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function activostramitador($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->condition = 'inicio = 0 ';
        

             //$criteria->compare('idUsuario.id_proyecto',$this->id_cliente_gs,true);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		//$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_usuario',$id);
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
        $criteria->order = 'id_tramite DESC';
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
       $criteria->order = 'id_tramite DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
    public function tramitesliquidados()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->condition = 'inicio = 1 AND id_pasos=11 AND id_cliente_gs >=1507';
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
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
		$criteria->compare('id_proyecto',$this->id_proyecto);
		$criteria->compare('inicio',$this->inicio);



        $dateRange = self::parseDateRange($this->fecha_paso_range, true);
   
        if ($dateRange) {
            list($startDate, $endDate) = $dateRange;
            print_r(date('Y-m-d', $endDate));
        	
			$criteria->addBetweenCondition('fecha_paso', date('Y-m-d', $startDate), date('Y-m-d', $endDate));        
        } else {
        	
        }
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
