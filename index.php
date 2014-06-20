<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 *
 */
session_start();


define('DS', DIRECTORY_SEPARATOR);
define('LIBRARY_DIRECTORY', 'library');
define('ROOT_DIRECTORY', 'ofogh/');
define('APP_DIRECTORY', 'app');
define('BASE_URL', 'http://127.0.0.1/'.ROOT_DIRECTORY);
define('PUBLIC_PATH', str_replace('\\',DS,realpath(dirname(__FILE__))));
define('JSF',BASE_URL.'/public/js/');
define('CSSF',BASE_URL.'/public/css/');
define('IMGF',BASE_URL.'/public/image/');

/**
 * Set Default time  zone
 */
date_default_timezone_set('Asia/Tehran');

include LIBRARY_DIRECTORY . '/Load.php';

/**
 * Set PATH SEPARATOR for windows or linux
 */
if ( ! defined( "PATH_SEPARATOR" ) ) {
  if ( strpos( $_ENV[ "OS" ], "Win" ) !== false )
    define( "PATH_SEPARATOR", ";" );
  else define( "PATH_SEPARATOR", ":" );
} 

set_include_path(implode(PATH_SEPARATOR , array(LIBRARY_DIRECTORY,PATH_SEPARATOR,  get_include_path())));
spl_autoload_register(array('Load', 'autoload'));
   
include LIBRARY_DIRECTORY. '/Functions.php';
include LIBRARY_DIRECTORY. '/Exceptions.php';

Router::route($_GET['req']);