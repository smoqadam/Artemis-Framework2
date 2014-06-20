<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class Load {

    static function autoload($class) {

        if (strpos($class, 'Zend') !== false) {
            require(str_replace('_', '/', $class) . '.php');
        } 
        elseif (strpos($class,'Twig') !== false) 
        {
                require (str_replace('_', '/', $class).'.php');
        } 
        else { // load other class and lib
            include LIBRARY_DIRECTORY . DS . $class . '.php';
        }
    }

    static function autoloadZendLibrary($class) {
        //Load zend library
        if (strpos($class, 'Zend') !== false) {
            require(str_replace('_', '/', $class) . '.php');
        } elseif (strpos($class, 'Twig') !== false) {
            require (str_replace('_', '/', $class) . '.php');
        } else { // load other class and lib
            include LIBRARY_DIRECTORY . DS . $class . '.php';
        }
    }

    static function autoloadTwigLibrary($class) {
        //Load zend library
        if (strpos($class, 'Zend') !== false) {
            require(str_replace('_', '/', $class) . '.php');
        } 
        elseif (strpos($class,'Twig') !== false) 
        {
                require (str_replace('_', '/', $class).'.php');
        } 
        else { // load other class and lib
            include LIBRARY_DIRECTORY . DS . $class . '.php';
        }
        // echo str_replace('_', '/', $class) . '.php';
        require LIBRARY_DIRECTORY . DS . 'Twig/' . (str_replace('_', '/', $class) . '.php');
    }

    static function Model($table) {

        if (file_exists(APP_DIRECTORY . '/model/' . $table . '.php')) {
            require_once APP_DIRECTORY . '/model/' . $table . '.php';
            $model = ucfirst($table);
            return new $model;
        } else {
            throw new ArtemisFileNotFoundException("Model $table Not found in app/$table.php ");
        }
    }

}

?>
