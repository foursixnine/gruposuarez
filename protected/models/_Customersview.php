<?php

/**
 * This is the model class for table "categorias".
 *
 * The followings are the available columns in table 'categorias':
 * @property string $nombre
 * 
 */
class Customersview extends GActiveRecord
{
/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categorias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
    public function getDbConnection()
    {
        return self::getDatos1DbConnection();
    }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enx_suarez.customers_view';
	}
        public function rules()
	{
		return array(
                    //    array('NOMBRE', 'safe'),
			array('ID_CLIENTE,NOMBRE, APELLIDO, STATUS, PROYECTO, CARTERA_30_DIAS,CARTERA_60_DIAS,CARTERA_90_DIAS', 'safe', 'on'=>'search'),
		);
	}
        public function attributeLabels()
        {
            return array(                   
                'TIPO_DE_CLIENTE'=> 'Tipo de Cliente',
                'NOMBRE_DE_EMPRESA'=> 'Nombre Cliente',
                'NOMBRE'=> 'Nombre Cliente',
                'APELLIDO'=> 'Apellido Cliente',
                'STATUS'=> 'Status',
                'PROYECTO'=> 'Proyecto',
                'NUMERO_DE_LOTE'=> 'N de Lote',
                'ID_CLIENTE'=> 'Id Cliente',
                'ID_PROYECTO'=> 'Id Proyecto',
                'NUMERO_CELULAR'=> 'Número de Celular',
                'NUMERO_CASA'=> 'Número de Casa',
                'NUMERO_ADICIONAL'=> 'Número Adicional',
                'CORREO'=> 'Correo',
                'DIRECCION'=> 'Dirección',
                'CEDULA'=> 'Cedula',
                'LUGAR_TRABAJO'=> 'Lugar de Trabajo',
                'OCUPACION'=> 'Ocupación',
                'SEXO'=> 'Sexo',
                'ESTADO_CIVIL'=> 'Estado Civil',
                'NACIONALIDAD'=> 'Nacionalidad',
                'REFERENCIA_1'=> 'Nombre Referencia 1',
                'REFERENCIA_2'=> 'Nombre Referencia 2',
                'TELEFONO_REF_1'=> 'Telefono de Referencia 1',
                'TELEFONO_REF_2'=> 'Telefono de Referencia 2',
                'RELACION_REF_1'=> 'Parentesco de Referencia 1',
                'RELACION_REF_2'=> 'Parentesco de Referencia 2',
                'CARTERA_CORRIENTE'=> 'Cartera Corriente',
                'CARTERA_30_DIAS'=> 'Cartera a los 30 días',
                'CARTERA_60_DIAS'=> 'Cartera a los 30 días',
                'CARTERA_90_DIAS'=> 'Cartera a los 90 días',
                'CARTERA_120_DIAS'=> 'Cartera a los 120 días',
                'TOTAL_VENCIDO'=> 'Total Vencido',
                'MONTO_ABONO'=> 'Monto Abono',
                'MONTO_LIQUIDACION'=> 'Monto de Liquidación',
                'TOTAL_VENTA'=> 'Total Venta',
                'CANTIDAD_DE_QUOTAS'=> 'Cantidad de Cuoatas',
                'MONTO_QUOTA_ABONO'=> 'Id Cumplimiento',
                'GASTO_LEGAL'=> 'Id Cumplimiento',
                'FECHA_DE_PAGO_ABONO'=> 'Id Cumplimiento',
                'TOTAL'=> 'Id Cumplimiento',
                'MONTO_MEJORAS'=> 'Id Cumplimiento',
                'CANTIDAD_DE_QUOTAS_MEJORAS'=> 'Id Cumplimiento',
                'MONTO_CUOTA_MEJORAS'=> 'Id Cumplimiento',
                'MONTO_ULTIMO_PAGO'=> 'Id Cumplimiento',
                'FECHA_ULTIMO_PAGO'=> 'Id Cumplimiento',
                'MOTIVO_DEL_PAGO'=> 'Id Cumplimiento',
                'ID_DE_REASON'=> 'Id Cumplimiento',
                'FORMA_DE_PAGO'=> 'Forma de Pago',
                'VENDEDOR'=> 'Vendedor',
                'ID_VENDEDOR'=> 'Id Vendedor',
                'BANCO_ACREEDOR'=> 'Banco Acreedor',
                'ID_BANCO'=> 'Id Banco',
                'BANCO_INTERINO'=> 'Banco Interino',
                'STATUS_PLAN_PAGO'=> 'Status Plan de Pago',
                'FECHA_DE_ENTREGA'=> 'Fecha de Entrega',
                'FECHA_DE_PERMISO_CONTRUCCION'=> 'Id Cumplimiento',
                'FECHA_DE_PERMISO_BOMBEROS'=> 'Id Cumplimiento',
                'FECHA_DE_PERMISO_OCUPACION'=> 'Id Cumplimiento',
                'STATUS_DE_LOTE'=> 'Status Lote',
                'FECHA_DE_CARTA_PROMESA'=> 'Fecha de Carta Promesa',
            );
        }

        public static function getListProyecto()
	{
		return CHtml::listData(Proyecto::model()->findAll(),'id_proyecto','titulo');
	}
        
        public function buscarproyecto()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('APELLIDO',$this->APELLIDO);
		$criteria->compare('NOMBRE',$this->NOMBRE);
                $criteria->compare('NOMBRE',$this->PROYECTO);
	
        /*$criteria->with =array('idProyecto');
       $criteria->compare('idProyecto.titulo', $this->titulo, true);*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
     /*   public function agendagestion()
        {
        
        $criteria = new CDbCriteria;
        $criteria->compare('ID_CLIENTE',$this->ID_CLIENTE,true);
        $criteria->compare('NOMBRE',$this->NOMBRE,true);
        $criteria->compare('APELLIDO',$this->APELLIDO,true);
        $criteria->compare('CARTERA_30_DIAS',$this->CARTERA_30_DIAS,true);
        $criteria->compare('CARTERA_60_DIAS', $this->CARTERA_60_DIAS,true);
        $criteria->compare('CARTERA_90_DIAS', $this->CARTERA_90_DIAS,true);  
        $criteria->compare('CARTERA_120_DIAS', $this->CARTERA_120_DIAS,true);  
  // $criteria->compare('id_cumplimiento',$this->id_cumplimiento);
   //var_dump( $criteria->compare('idCliente.nom_cliente', $this->clinom, true));die;
        return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,                        
                        'pagination' => array('pageSize' => 5),
        ));
         
     }*/
        public function buscarclientes()
        {
                $criteria = new CDbCriteria; 

                $criteria->condition = 'CARTERA_90_DIAS > 0 ';
                $criteria->addSearchCondition('NOMBRE', $this->NOMBRE, true);
                $criteria->addSearchCondition('APELLIDO',$this->APELLIDO,true);
                $criteria->addSearchCondition('CARTERA_30_DIAS',$this->CARTERA_30_DIAS,true);
                $criteria->addSearchCondition('CARTERA_60_DIAS', $this->CARTERA_60_DIAS,true);
                $criteria->addSearchCondition('CARTERA_90_DIAS', $this->CARTERA_90_DIAS,true);  
                $criteria->addSearchCondition('CARTERA_120_DIAS', $this->CARTERA_120_DIAS,true);
                $criteria->order = 'CARTERA_90_DIAS DESC';
                
                $criteria->limit = 20;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' => 10),

                  'totalItemCount'=>'50',


                ));
         
        }
        
        public function noventadias()
        {
              $criteria = new CDbCriteria; 

              $criteria->condition = 'CARTERA_90_DIAS > 0 ';
              $criteria->addSearchCondition('NOMBRE', $this->NOMBRE, true);
              $criteria->addSearchCondition('APELLIDO',$this->APELLIDO,true);
              $criteria->addSearchCondition('CARTERA_30_DIAS',$this->CARTERA_30_DIAS,true);
              $criteria->addSearchCondition('CARTERA_60_DIAS', $this->CARTERA_60_DIAS,true);
              $criteria->addSearchCondition('CARTERA_90_DIAS', $this->CARTERA_90_DIAS,true); 
              $criteria->order = 'CARTERA_90_DIAS DESC';
              $criteria->limit = 10;
              $criteria->offset = 0;
              return new CActiveDataProvider($this, array(
                              'criteria'=> $criteria,     
                              'pagination' => array('pageSize' => 5),
                              'totalItemCount'=>'50',
              ));
         
        }
     
      public function search()
        {
        
        $criteria = new CDbCriteria; 

        $criteria->condition = 'CARTERA_90_DIAS > 0 ';
        //$criteria->addSearchCondition('upper(t.NOMBRE)',strtoupper($this->NOMBRE),true,'OR');
         //$criteria->addSearchCondition('NOMBRE','a',true);  addCondition
       // $criteria->addSearchCondition('NOMBRE',$this->NOMBRE, true, 'OR');
     //   $this->NOMBRE = 'MAGALY';
         $criteria->addSearchCondition('NOMBRE', $this->NOMBRE, true);
         $criteria->addSearchCondition('APELLIDO',$this->APELLIDO,true);
        //$criteria->addSearchCondition('NOMBRE',$this->NOMBRE,true,'OR');   
      /*  $criteria->compare('CARTERA_90_DIAS', $this->CARTERA_90_DIAS,true,'or'); addCondition */
        

        $criteria->order = 'CARTERA_90_DIAS DESC';
        $criteria->limit = 20;
        $criteria->offset = 0;
        return new CActiveDataProvider($this, array(
                        'criteria'=> $criteria,     
                        'pagination' => array('pageSize' => 5),

          'totalItemCount'=>'50',
                 
      
        ));
         
     }
     
        public function cientoveinte()
        {
        
        $criteria = new CDbCriteria; 

        $criteria->condition = 'CARTERA_120_DIAS > 0 ';
        //$criteria->addSearchCondition('upper(t.NOMBRE)',strtoupper($this->NOMBRE),true,'OR');
         //$criteria->addSearchCondition('NOMBRE','a',true);  addCondition
       // $criteria->addSearchCondition('NOMBRE',$this->NOMBRE, true, 'OR');
     //   $this->NOMBRE = 'MAGALY';
         $criteria->addSearchCondition('NOMBRE', $this->NOMBRE, true);
        //$criteria->addSearchCondition('NOMBRE',$this->NOMBRE,true,'OR');   
      /*  $criteria->compare('CARTERA_90_DIAS', $this->CARTERA_90_DIAS,true,'or'); addCondition */
        

        $criteria->order = 'CARTERA_120_DIAS DESC';
        $criteria->limit = 20;
        $criteria->offset = 0;
        return new CActiveDataProvider($this, array(
                        'criteria'=> $criteria,     
                        'pagination' => array('pageSize' => 5),

          'totalItemCount'=>'20',
                 
      
        ));
         
     }
	
}

?>
