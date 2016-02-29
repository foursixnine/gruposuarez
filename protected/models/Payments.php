<?php

/**
 * This is the model class for table "payments".
 *
 * The followings are the available columns in table 'payments':
 * @property string $id
 * @property string $Fiscal_id
 * @property string $Fiscal_print
 * @property string $Cliente
 * @property string $Acreedor
 * @property string $Nombre
 * @property string $Fecha
 * @property double $Monto
 * @property string $Comentario
 * @property string $Actualizado
 * @property string $Agente
 * @property string $Tipo
 * @property string $Referencia
 * @property string $Cash_Account
 * @property string $Type
 * @property string $Status
 * @property string $CashAmount
 * @property string $CreditCardAmount
 * @property string $CreditCardType
 * @property string $CheckAmount
 * @property string $CheckReff
 * @property string $CertAmount
 * @property string $CertId
 * @property string $Cashier
 * @property string $POS
 * @property string $POS_Pagado
 * @property string $POS_Cambio
 * @property string $Company
 * @property string $WareHouse
 * @property string $POSType
 * @property string $AnulatedDate
 * @property string $AnulatedBy
 * @property string $AnulatedComment
 * @property string $Deposit_Reff
 * @property string $Abono_Club_Reff
 * @property string $Abono_Reff
 * @property string $POS_Control_id
 * @property integer $Sem_Actual
 * @property integer $Sem_Adelant
 * @property integer $Sem_Atrasad
 * @property integer $Sem_Pag
 * @property string $Prox_Pago
 * @property double $Club_Pagos
 * @property double $Club_Saldo
 * @property double $Pagos
 * @property string $POS_Serial
 * @property string $Doc_Type
 * @property string $AuthorizedBy
 * @property string $Authorized_Date
 * @property string $Payment_Reff
 * @property double $Penalty_Monto
 * @property double $Penalty_Factor
 * @property string $Penalty_Account
 * @property string $Cron_id_Abono
 * @property string $Libreta
 * @property string $Payment_Match
 * @property string $Reason
 * @property string $Document_Type
 * @property string $Sucursal
 * @property string $Proyecto
 * @property string $Modelo
 * @property string $Propiedad
 * @property string $Cliente_Reff
 * @property string $Tipo_Pago
 *
 * The followings are the available model relations:
 * @property PointOfSales $pOS
 */
class Payments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Fiscal_id, Acreedor, CashAmount, CreditCardAmount, CheckAmount, CertAmount, POS_Pagado, POS_Cambio, AnulatedDate, AnulatedComment, Abono_Club_Reff, POS_Control_id, Sem_Actual, Sem_Adelant, Sem_Atrasad, Sem_Pag, Prox_Pago, Club_Pagos, Club_Saldo, Pagos, POS_Serial, Doc_Type, AuthorizedBy, Authorized_Date, Penalty_Monto, Penalty_Factor, Penalty_Account, Cron_id_Abono, Libreta, Reason, Sucursal', 'required'),
			array('Sem_Actual, Sem_Adelant, Sem_Atrasad, Sem_Pag', 'numerical', 'integerOnly'=>true),
			array('Monto, Club_Pagos, Club_Saldo, Pagos, Penalty_Monto, Penalty_Factor', 'numerical'),
			array('id, Fiscal_id, Cliente, Acreedor, CashAmount, CreditCardAmount, CheckAmount, CertAmount, POS_Pagado, POS_Cambio, Payment_Reff, Cron_id_Abono, Proyecto, Modelo, Propiedad, Cliente_Reff, Tipo_Pago', 'length', 'max'=>22),
			array('Fiscal_print', 'length', 'max'=>1),
			array('Nombre, Referencia, CheckReff, POS, WareHouse, Deposit_Reff, Abono_Club_Reff, Abono_Reff', 'length', 'max'=>100),
			array('Agente, Tipo, Cashier, AnulatedBy, POS_Control_id, POS_Serial, AuthorizedBy, Penalty_Account, Payment_Match', 'length', 'max'=>50),
			array('Cash_Account, Type, CertId', 'length', 'max'=>11),
			array('Status, Doc_Type', 'length', 'max'=>10),
			array('CreditCardType', 'length', 'max'=>25),
			array('Company', 'length', 'max'=>200),
			array('POSType', 'length', 'max'=>13),
			array('Libreta', 'length', 'max'=>20),
			array('Document_Type', 'length', 'max'=>14),
			array('Sucursal', 'length', 'max'=>150),
			array('Fecha, Comentario, Actualizado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Fiscal_id, Fiscal_print, Cliente, Acreedor, Nombre, Fecha, Monto, Comentario, Actualizado, Agente, Tipo, Referencia, Cash_Account, Type, Status, CashAmount, CreditCardAmount, CreditCardType, CheckAmount, CheckReff, CertAmount, CertId, Cashier, POS, POS_Pagado, POS_Cambio, Company, WareHouse, POSType, AnulatedDate, AnulatedBy, AnulatedComment, Deposit_Reff, Abono_Club_Reff, Abono_Reff, POS_Control_id, Sem_Actual, Sem_Adelant, Sem_Atrasad, Sem_Pag, Prox_Pago, Club_Pagos, Club_Saldo, Pagos, POS_Serial, Doc_Type, AuthorizedBy, Authorized_Date, Payment_Reff, Penalty_Monto, Penalty_Factor, Penalty_Account, Cron_id_Abono, Libreta, Payment_Match, Reason, Document_Type, Sucursal, Proyecto, Modelo, Propiedad, Cliente_Reff, Tipo_Pago', 'safe', 'on'=>'search'),
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
			'pOS' => array(self::BELONGS_TO, 'PointOfSales', 'POS'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Fiscal_id' => 'Fiscal',
			'Fiscal_print' => 'Fiscal Print',
			'Cliente' => 'Cliente',
			'Acreedor' => 'Acreedor',
			'Nombre' => 'Nombre',
			'Fecha' => 'Fecha',
			'Monto' => 'Monto',
			'Comentario' => 'Comentario',
			'Actualizado' => 'Actualizado',
			'Agente' => 'Agente',
			'Tipo' => 'Tipo',
			'Referencia' => 'Referencia',
			'Cash_Account' => 'Cash Account',
			'Type' => 'Type',
			'Status' => 'Status',
			'CashAmount' => 'Cash Amount',
			'CreditCardAmount' => 'Credit Card Amount',
			'CreditCardType' => 'Credit Card Type',
			'CheckAmount' => 'Check Amount',
			'CheckReff' => 'Check Reff',
			'CertAmount' => 'Cert Amount',
			'CertId' => 'Cert',
			'Cashier' => 'Cashier',
			'POS' => 'Pos',
			'POS_Pagado' => 'Pos Pagado',
			'POS_Cambio' => 'Pos Cambio',
			'Company' => 'Company',
			'WareHouse' => 'Ware House',
			'POSType' => 'Postype',
			'AnulatedDate' => 'Anulated Date',
			'AnulatedBy' => 'Anulated By',
			'AnulatedComment' => 'Anulated Comment',
			'Deposit_Reff' => 'Deposit Reff',
			'Abono_Club_Reff' => 'Abono Club Reff',
			'Abono_Reff' => 'Abono Reff',
			'POS_Control_id' => 'Pos Control',
			'Sem_Actual' => 'Sem Actual',
			'Sem_Adelant' => 'Sem Adelant',
			'Sem_Atrasad' => 'Sem Atrasad',
			'Sem_Pag' => 'Sem Pag',
			'Prox_Pago' => 'Prox Pago',
			'Club_Pagos' => 'Club Pagos',
			'Club_Saldo' => 'Club Saldo',
			'Pagos' => 'Pagos',
			'POS_Serial' => 'Pos Serial',
			'Doc_Type' => 'Doc Type',
			'AuthorizedBy' => 'Authorized By',
			'Authorized_Date' => 'Authorized Date',
			'Payment_Reff' => 'Payment Reff',
			'Penalty_Monto' => 'Penalty Monto',
			'Penalty_Factor' => 'Penalty Factor',
			'Penalty_Account' => 'Penalty Account',
			'Cron_id_Abono' => 'Cron Id Abono',
			'Libreta' => 'Libreta',
			'Payment_Match' => 'Payment Match',
			'Reason' => 'Reason',
			'Document_Type' => 'Document Type',
			'Sucursal' => 'Sucursal',
			'Proyecto' => 'Proyecto',
			'Modelo' => 'Modelo',
			'Propiedad' => 'Propiedad',
			'Cliente_Reff' => 'Cliente Reff',
			'Tipo_Pago' => 'Tipo Pago',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('Fiscal_id',$this->Fiscal_id,true);
		$criteria->compare('Fiscal_print',$this->Fiscal_print,true);
		$criteria->compare('Cliente',$this->Cliente,true);
		$criteria->compare('Acreedor',$this->Acreedor,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Monto',$this->Monto);
		$criteria->compare('Comentario',$this->Comentario,true);
		$criteria->compare('Actualizado',$this->Actualizado,true);
		$criteria->compare('Agente',$this->Agente,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('Referencia',$this->Referencia,true);
		$criteria->compare('Cash_Account',$this->Cash_Account,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('CashAmount',$this->CashAmount,true);
		$criteria->compare('CreditCardAmount',$this->CreditCardAmount,true);
		$criteria->compare('CreditCardType',$this->CreditCardType,true);
		$criteria->compare('CheckAmount',$this->CheckAmount,true);
		$criteria->compare('CheckReff',$this->CheckReff,true);
		$criteria->compare('CertAmount',$this->CertAmount,true);
		$criteria->compare('CertId',$this->CertId,true);
		$criteria->compare('Cashier',$this->Cashier,true);
		$criteria->compare('POS',$this->POS,true);
		$criteria->compare('POS_Pagado',$this->POS_Pagado,true);
		$criteria->compare('POS_Cambio',$this->POS_Cambio,true);
		$criteria->compare('Company',$this->Company,true);
		$criteria->compare('WareHouse',$this->WareHouse,true);
		$criteria->compare('POSType',$this->POSType,true);
		$criteria->compare('AnulatedDate',$this->AnulatedDate,true);
		$criteria->compare('AnulatedBy',$this->AnulatedBy,true);
		$criteria->compare('AnulatedComment',$this->AnulatedComment,true);
		$criteria->compare('Deposit_Reff',$this->Deposit_Reff,true);
		$criteria->compare('Abono_Club_Reff',$this->Abono_Club_Reff,true);
		$criteria->compare('Abono_Reff',$this->Abono_Reff,true);
		$criteria->compare('POS_Control_id',$this->POS_Control_id,true);
		$criteria->compare('Sem_Actual',$this->Sem_Actual);
		$criteria->compare('Sem_Adelant',$this->Sem_Adelant);
		$criteria->compare('Sem_Atrasad',$this->Sem_Atrasad);
		$criteria->compare('Sem_Pag',$this->Sem_Pag);
		$criteria->compare('Prox_Pago',$this->Prox_Pago,true);
		$criteria->compare('Club_Pagos',$this->Club_Pagos);
		$criteria->compare('Club_Saldo',$this->Club_Saldo);
		$criteria->compare('Pagos',$this->Pagos);
		$criteria->compare('POS_Serial',$this->POS_Serial,true);
		$criteria->compare('Doc_Type',$this->Doc_Type,true);
		$criteria->compare('AuthorizedBy',$this->AuthorizedBy,true);
		$criteria->compare('Authorized_Date',$this->Authorized_Date,true);
		$criteria->compare('Payment_Reff',$this->Payment_Reff,true);
		$criteria->compare('Penalty_Monto',$this->Penalty_Monto);
		$criteria->compare('Penalty_Factor',$this->Penalty_Factor);
		$criteria->compare('Penalty_Account',$this->Penalty_Account,true);
		$criteria->compare('Cron_id_Abono',$this->Cron_id_Abono,true);
		$criteria->compare('Libreta',$this->Libreta,true);
		$criteria->compare('Payment_Match',$this->Payment_Match,true);
		$criteria->compare('Reason',$this->Reason,true);
		$criteria->compare('Document_Type',$this->Document_Type,true);
		$criteria->compare('Sucursal',$this->Sucursal,true);
		$criteria->compare('Proyecto',$this->Proyecto,true);
		$criteria->compare('Modelo',$this->Modelo,true);
		$criteria->compare('Propiedad',$this->Propiedad,true);
		$criteria->compare('Cliente_Reff',$this->Cliente_Reff,true);
		$criteria->compare('Tipo_Pago',$this->Tipo_Pago,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
	 * @return Payments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
