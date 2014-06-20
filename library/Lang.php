<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class Lang {
 
    static function _($key)
    {
        include PUBLIC_PATH.'/app/language/'.Config::$lang.'.php';
        echo $lang[$key];
    }
    
}
