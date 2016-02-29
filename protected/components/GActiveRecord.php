<?php
class GActiveRecord extends CActiveRecord
{
    public static $dbconix;
	

	
    protected static function getDatos1DbConnection()
    {
        if (self::$dbconix !== null)
            return self::$dbconix;
        else
        {
            self::$dbconix = Yii::app()->dbconix;
            if (self::$dbconix instanceof CDbConnection)
            {
                self::$dbconix->setActive(true);
                return self::$dbconix;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "dbconix" CDbConnection application component.'));
       }
    }

}

?>