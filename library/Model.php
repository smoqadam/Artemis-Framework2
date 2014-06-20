<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class Model extends Zend_Db_Table_Abstract {

    protected $_name = '';
    
    protected $_primary = 'id';

    function __construct() {
        
        $dbAdapter = new Zend_Db_Adapter_Pdo_Mysql(array(
                    'host' => Config::DBHOST,
                    'username' => Config::DBUSERNAME,
                    'password' => Config::DBPASSWORD,
                    'dbname' => Config::DBNAME
                ));
        Zend_Db_Table::setDefaultAdapter($dbAdapter);
        
        if($this->_name == '')
            $this->_name =strtolower(get_class($this));
        
        
        parent::__construct();
    }

}
