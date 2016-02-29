<?php

/**
 * This is the model class for table "customers_view".
 *
 * The followings are the available columns in table 'customers_view':
 * @property string $TIPO_DE_CLIENTE
 * @property string $NOMBRE_DE_EMPRESA
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $STATUS
 * @property string $PROYECTO
 * @property string $NUMERO_DE_LOTE
 * @property string $ID_CLIENTE
 * @property string $ID_PROYECTO
 * @property string $NUMERO_CELULAR
 * @property string $NUMERO_CASA
 * @property string $NUMERO_ADICIONAL
 * @property string $CORREO
 * @property string $DIRECCION
 * @property string $CEDULA
 * @property string $LUGAR_TRABAJO
 * @property string $OCUPACION
 * @property string $SEXO
 * @property string $ESTADO_CIVIL
 * @property string $NACIONALIDAD
 * @property string $REFERENCIA_1
 * @property string $REFERENCIA_2
 * @property string $TELEFONO_REF_1
 * @property string $TELEFONO_REF_2
 * @property string $RELACION_REF_1
 * @property string $RELACION_REF_2
 * @property string $CARTERA_CORRIENTE
 * @property string $CARTERA_30_DIAS
 * @property string $CARTERA_60_DIAS
 * @property string $CARTERA_90_DIAS
 * @property string $CARTERA_120_DIAS
 * @property string $TOTAL_VENCIDO
 * @property string $MONTO_ABONO
 * @property string $MONTO_LIQUIDACION
 * @property string $TOTAL_VENTA
 * @property integer $CANTIDAD_DE_QUOTAS
 * @property string $MONTO_QUOTA_ABONO
 * @property string $GASTO_LEGAL
 * @property string $FECHA_DE_PAGO_ABONO
 * @property string $TOTAL
 * @property string $MONTO_MEJORAS
 * @property integer $CANTIDAD_DE_QUOTAS_MEJORAS
 * @property string $MONTO_CUOTA_MEJORAS
 * @property double $MONTO_ULTIMO_PAGO
 * @property string $FECHA_ULTIMO_PAGO
 * @property string $MOTIVO_DEL_PAGO
 * @property string $ID_DE_REASON
 * @property string $FORMA_DE_PAGO
 * @property string $VENDEDOR
 * @property string $ID_VENDEDOR
 * @property string $BANCO_ACREEDOR
 * @property string $ID_BANCO
 * @property string $BANCO_INTERINO
 * @property string $STATUS_PLAN_PAGO
 * @property string $FECHA_DE_ENTREGA
 * @property string $FECHA_DE_PERMISO_CONTRUCCION
 * @property string $FECHA_DE_PERMISO_BOMBEROS
 * @property string $FECHA_DE_PERMISO_OCUPACION
 * @property string $STATUS_DE_LOTE
 * @property string $FECHA_DE_CARTA_PROMESA
 */
class CustomersView extends GActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_DE_EMPRESA, NOMBRE, APELLIDO, NUMERO_DE_LOTE, CEDULA, LUGAR_TRABAJO, OCUPACION, SEXO, ESTADO_CIVIL, NACIONALIDAD, REFERENCIA_1, TELEFONO_REF_1, RELACION_REF_1, MONTO_ABONO, MONTO_LIQUIDACION, TOTAL_VENTA, MONTO_QUOTA_ABONO, GASTO_LEGAL, FECHA_DE_PAGO_ABONO, TOTAL, FECHA_DE_CARTA_PROMESA', 'required'),
			array('CANTIDAD_DE_QUOTAS, CANTIDAD_DE_QUOTAS_MEJORAS', 'numerical', 'integerOnly'=>true),
			array('MONTO_ULTIMO_PAGO', 'numerical'),
			array('TIPO_DE_CLIENTE', 'length', 'max'=>8),
			array('NOMBRE_DE_EMPRESA, CORREO', 'length', 'max'=>200),
			array('NOMBRE, APELLIDO, NUMERO_DE_LOTE, ID_PROYECTO, LUGAR_TRABAJO, OCUPACION, NACIONALIDAD, REFERENCIA_1, REFERENCIA_2, RELACION_REF_1, RELACION_REF_2, ID_BANCO', 'length', 'max'=>50),
			array('STATUS', 'length', 'max'=>20),
			array('PROYECTO, NUMERO_CELULAR, NUMERO_CASA, NUMERO_ADICIONAL, VENDEDOR, BANCO_ACREEDOR, BANCO_INTERINO', 'length', 'max'=>100),
			array('ID_CLIENTE, SEXO, TELEFONO_REF_1, TELEFONO_REF_2, CARTERA_CORRIENTE, CARTERA_30_DIAS, CARTERA_60_DIAS, CARTERA_90_DIAS, CARTERA_120_DIAS, TOTAL_VENCIDO, MONTO_ABONO, MONTO_LIQUIDACION, TOTAL_VENTA, MONTO_QUOTA_ABONO, GASTO_LEGAL, TOTAL, MONTO_MEJORAS, MONTO_CUOTA_MEJORAS, ID_VENDEDOR, STATUS_DE_LOTE', 'length', 'max'=>22),
			array('CEDULA', 'length', 'max'=>55),
			array('ESTADO_CIVIL', 'length', 'max'=>13),
			array('ID_DE_REASON', 'length', 'max'=>11),
			array('STATUS_PLAN_PAGO', 'length', 'max'=>9),
			array('DIRECCION, FECHA_ULTIMO_PAGO, MOTIVO_DEL_PAGO, FORMA_DE_PAGO, FECHA_DE_ENTREGA, FECHA_DE_PERMISO_CONTRUCCION, FECHA_DE_PERMISO_BOMBEROS, FECHA_DE_PERMISO_OCUPACION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TIPO_DE_CLIENTE, NOMBRE_DE_EMPRESA, NOMBRE, APELLIDO, STATUS, PROYECTO, NUMERO_DE_LOTE, ID_CLIENTE, ID_PROYECTO, NUMERO_CELULAR, NUMERO_CASA, NUMERO_ADICIONAL, CORREO, DIRECCION, CEDULA, LUGAR_TRABAJO, OCUPACION, SEXO, ESTADO_CIVIL, NACIONALIDAD, REFERENCIA_1, REFERENCIA_2, TELEFONO_REF_1, TELEFONO_REF_2, RELACION_REF_1, RELACION_REF_2, CARTERA_CORRIENTE, CARTERA_30_DIAS, CARTERA_60_DIAS, CARTERA_90_DIAS, CARTERA_120_DIAS, TOTAL_VENCIDO, MONTO_ABONO, MONTO_LIQUIDACION, TOTAL_VENTA, CANTIDAD_DE_QUOTAS, MONTO_QUOTA_ABONO, GASTO_LEGAL, FECHA_DE_PAGO_ABONO, TOTAL, MONTO_MEJORAS, CANTIDAD_DE_QUOTAS_MEJORAS, MONTO_CUOTA_MEJORAS, MONTO_ULTIMO_PAGO, FECHA_ULTIMO_PAGO, MOTIVO_DEL_PAGO, ID_DE_REASON, FORMA_DE_PAGO, VENDEDOR, ID_VENDEDOR, BANCO_ACREEDOR, ID_BANCO, BANCO_INTERINO, STATUS_PLAN_PAGO, FECHA_DE_ENTREGA, FECHA_DE_PERMISO_CONTRUCCION, FECHA_DE_PERMISO_BOMBEROS, FECHA_DE_PERMISO_OCUPACION, STATUS_DE_LOTE, FECHA_DE_CARTA_PROMESA', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TIPO_DE_CLIENTE' => 'Tipo De Cliente',
			'NOMBRE_DE_EMPRESA' => 'Nombre De Empresa',
			'NOMBRE' => 'Nombre',
			'APELLIDO' => 'Apellido',
			'STATUS' => 'Status',
			'PROYECTO' => 'Proyecto',
			'NUMERO_DE_LOTE' => 'Numero De Lote',
			'ID_CLIENTE' => 'Id Cliente',
			'ID_PROYECTO' => 'Id Proyecto',
			'NUMERO_CELULAR' => 'Numero Celular',
			'NUMERO_CASA' => 'Numero Casa',
			'NUMERO_ADICIONAL' => 'Numero Adicional',
			'CORREO' => 'Correo',
			'DIRECCION' => 'Direccion',
			'CEDULA' => 'Cedula',
			'LUGAR_TRABAJO' => 'Lugar Trabajo',
			'OCUPACION' => 'Ocupacion',
			'SEXO' => 'Sexo',
			'ESTADO_CIVIL' => 'Estado Civil',
			'NACIONALIDAD' => 'Nacionalidad',
			'REFERENCIA_1' => 'Referencia 1',
			'REFERENCIA_2' => 'Referencia 2',
			'TELEFONO_REF_1' => 'Telefono Ref 1',
			'TELEFONO_REF_2' => 'Telefono Ref 2',
			'RELACION_REF_1' => 'Relacion Ref 1',
			'RELACION_REF_2' => 'Relacion Ref 2',
			'CARTERA_CORRIENTE' => 'Cartera Corriente',
			'CARTERA_30_DIAS' => 'Cartera 30 Dias',
			'CARTERA_60_DIAS' => 'Cartera 60 Dias',
			'CARTERA_90_DIAS' => 'Cartera 90 Dias',
			'CARTERA_120_DIAS' => 'Cartera 120 Dias',
			'TOTAL_VENCIDO' => 'Total Vencido',
			'MONTO_ABONO' => 'Monto Abono',
			'MONTO_LIQUIDACION' => 'Monto Liquidacion',
			'TOTAL_VENTA' => 'Total Venta',
			'CANTIDAD_DE_QUOTAS' => 'Cantidad De Quotas',
			'MONTO_QUOTA_ABONO' => 'Monto Quota Abono',
			'GASTO_LEGAL' => 'Gasto Legal',
			'FECHA_DE_PAGO_ABONO' => 'Fecha De Pago Abono',
			'TOTAL' => 'Total',
			'MONTO_MEJORAS' => 'Monto Mejoras',
			'CANTIDAD_DE_QUOTAS_MEJORAS' => 'Cantidad De Quotas Mejoras',
			'MONTO_CUOTA_MEJORAS' => 'Monto Cuota Mejoras',
			'MONTO_ULTIMO_PAGO' => 'Monto Ultimo Pago',
			'FECHA_ULTIMO_PAGO' => 'Fecha Ultimo Pago',
			'MOTIVO_DEL_PAGO' => 'Motivo Del Pago',
			'ID_DE_REASON' => 'Id De Reason',
			'FORMA_DE_PAGO' => 'Forma De Pago',
			'VENDEDOR' => 'Vendedor',
			'ID_VENDEDOR' => 'Id Vendedor',
			'BANCO_ACREEDOR' => 'Banco Acreedor',
			'ID_BANCO' => 'Id Banco',
			'BANCO_INTERINO' => 'Banco Interino',
			'STATUS_PLAN_PAGO' => 'Status Plan Pago',
			'FECHA_DE_ENTREGA' => 'Fecha De Entrega',
			'FECHA_DE_PERMISO_CONTRUCCION' => 'Fecha De Permiso Contruccion',
			'FECHA_DE_PERMISO_BOMBEROS' => 'Fecha De Permiso Bomberos',
			'FECHA_DE_PERMISO_OCUPACION' => 'Fecha De Permiso Ocupacion',
			'STATUS_DE_LOTE' => 'Status De Lote',
			'FECHA_DE_CARTA_PROMESA' => 'Fecha De Carta Promesa',
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

		$criteria->compare('TIPO_DE_CLIENTE',$this->TIPO_DE_CLIENTE,true);
		$criteria->compare('NOMBRE_DE_EMPRESA',$this->NOMBRE_DE_EMPRESA,true);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('APELLIDO',$this->APELLIDO,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('PROYECTO',$this->PROYECTO,true);
	/*	$criteria->compare('NUMERO_DE_LOTE',$this->NUMERO_DE_LOTE,true);
		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE,true);
		$criteria->compare('ID_PROYECTO',$this->ID_PROYECTO,true);
		$criteria->compare('NUMERO_CELULAR',$this->NUMERO_CELULAR,true);
		$criteria->compare('NUMERO_CASA',$this->NUMERO_CASA,true);
		$criteria->compare('NUMERO_ADICIONAL',$this->NUMERO_ADICIONAL,true);
		$criteria->compare('CORREO',$this->CORREO,true);
		$criteria->compare('DIRECCION',$this->DIRECCION,true);
		$criteria->compare('CEDULA',$this->CEDULA,true);
		$criteria->compare('LUGAR_TRABAJO',$this->LUGAR_TRABAJO,true);
		$criteria->compare('OCUPACION',$this->OCUPACION,true);
		$criteria->compare('SEXO',$this->SEXO,true);
		$criteria->compare('ESTADO_CIVIL',$this->ESTADO_CIVIL,true);
		$criteria->compare('NACIONALIDAD',$this->NACIONALIDAD,true);
		$criteria->compare('REFERENCIA_1',$this->REFERENCIA_1,true);
		$criteria->compare('REFERENCIA_2',$this->REFERENCIA_2,true);
		$criteria->compare('TELEFONO_REF_1',$this->TELEFONO_REF_1,true);
		$criteria->compare('TELEFONO_REF_2',$this->TELEFONO_REF_2,true);
		$criteria->compare('RELACION_REF_1',$this->RELACION_REF_1,true);
		$criteria->compare('RELACION_REF_2',$this->RELACION_REF_2,true);*/
		$criteria->compare('CARTERA_CORRIENTE',$this->CARTERA_CORRIENTE,true);
		$criteria->compare('CARTERA_30_DIAS',$this->CARTERA_30_DIAS,true);
		$criteria->compare('CARTERA_60_DIAS',$this->CARTERA_60_DIAS,true);
		$criteria->compare('CARTERA_90_DIAS',$this->CARTERA_90_DIAS,true);
		$criteria->compare('CARTERA_120_DIAS',$this->CARTERA_120_DIAS,true);
	/*	$criteria->compare('TOTAL_VENCIDO',$this->TOTAL_VENCIDO,true);
		$criteria->compare('MONTO_ABONO',$this->MONTO_ABONO,true);
		$criteria->compare('MONTO_LIQUIDACION',$this->MONTO_LIQUIDACION,true);
		$criteria->compare('TOTAL_VENTA',$this->TOTAL_VENTA,true);
		$criteria->compare('CANTIDAD_DE_QUOTAS',$this->CANTIDAD_DE_QUOTAS);
		$criteria->compare('MONTO_QUOTA_ABONO',$this->MONTO_QUOTA_ABONO,true);
		$criteria->compare('GASTO_LEGAL',$this->GASTO_LEGAL,true);
		$criteria->compare('FECHA_DE_PAGO_ABONO',$this->FECHA_DE_PAGO_ABONO,true);
		$criteria->compare('TOTAL',$this->TOTAL,true);
		$criteria->compare('MONTO_MEJORAS',$this->MONTO_MEJORAS,true);
		$criteria->compare('CANTIDAD_DE_QUOTAS_MEJORAS',$this->CANTIDAD_DE_QUOTAS_MEJORAS);
		$criteria->compare('MONTO_CUOTA_MEJORAS',$this->MONTO_CUOTA_MEJORAS,true);
		$criteria->compare('MONTO_ULTIMO_PAGO',$this->MONTO_ULTIMO_PAGO);
		$criteria->compare('FECHA_ULTIMO_PAGO',$this->FECHA_ULTIMO_PAGO,true);
		$criteria->compare('MOTIVO_DEL_PAGO',$this->MOTIVO_DEL_PAGO,true);
		$criteria->compare('ID_DE_REASON',$this->ID_DE_REASON,true);
		$criteria->compare('FORMA_DE_PAGO',$this->FORMA_DE_PAGO,true);
		$criteria->compare('VENDEDOR',$this->VENDEDOR,true);
		$criteria->compare('ID_VENDEDOR',$this->ID_VENDEDOR,true);
		$criteria->compare('BANCO_ACREEDOR',$this->BANCO_ACREEDOR,true);
		$criteria->compare('ID_BANCO',$this->ID_BANCO,true);
		$criteria->compare('BANCO_INTERINO',$this->BANCO_INTERINO,true);
		$criteria->compare('STATUS_PLAN_PAGO',$this->STATUS_PLAN_PAGO,true);
		$criteria->compare('FECHA_DE_ENTREGA',$this->FECHA_DE_ENTREGA,true);
		$criteria->compare('FECHA_DE_PERMISO_CONTRUCCION',$this->FECHA_DE_PERMISO_CONTRUCCION,true);
		$criteria->compare('FECHA_DE_PERMISO_BOMBEROS',$this->FECHA_DE_PERMISO_BOMBEROS,true);
		$criteria->compare('FECHA_DE_PERMISO_OCUPACION',$this->FECHA_DE_PERMISO_OCUPACION,true);
		$criteria->compare('STATUS_DE_LOTE',$this->STATUS_DE_LOTE,true);
		$criteria->compare('FECHA_DE_CARTA_PROMESA',$this->FECHA_DE_CARTA_PROMESA,true);*/

	        $criteria->order = 'CARTERA_90_DIAS DESC';
                $criteria->limit = 20;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                        'criteria'=> $criteria,     
                        'pagination' => array('pageSize' => 5),

                'totalItemCount'=>'50',
                 
      
        ));
	}

        public function noventadias()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('TIPO_DE_CLIENTE',$this->TIPO_DE_CLIENTE,true);
		$criteria->compare('NOMBRE_DE_EMPRESA',$this->NOMBRE_DE_EMPRESA,true);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('APELLIDO',$this->APELLIDO,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('PROYECTO',$this->PROYECTO,true);
		$criteria->compare('CARTERA_CORRIENTE',$this->CARTERA_CORRIENTE,true);
		$criteria->compare('CARTERA_30_DIAS',$this->CARTERA_30_DIAS,true);
		$criteria->compare('CARTERA_60_DIAS',$this->CARTERA_60_DIAS,true);
		$criteria->compare('CARTERA_90_DIAS',$this->CARTERA_90_DIAS,true);
		$criteria->compare('CARTERA_120_DIAS',$this->CARTERA_120_DIAS,true);
	        $criteria->order = 'CARTERA_90_DIAS DESC';
                $criteria->limit = 20;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                        'criteria'=> $criteria,     
                        'pagination' => array('pageSize' => 5),

        ));
	}
	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbconix;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CustomersView the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
