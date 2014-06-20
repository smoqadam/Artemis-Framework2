<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
set_exception_handler('artemis_ex_handler');

/**
 * custom theme Exception Handler
 *  
 * @param Exception $ex
 */
function artemis_ex_handler($ex) {
    $errorArr = $ex->getTrace();
    //print_r($errorArr);
    $file = $errorArr[0]['file'];
    $line = $errorArr[0]['line'];
    $func = $errorArr[0]['function'];
    $message = "<hr>";
    $message .= $ex->getMessage();
    $message .= 'Exception occured in :';
    $message .= "<pre>";
    $message .= "File : {$file}<br>";
    $message .= "Line : {$line}<br>";
    $message .= "Function : {$func}<br>";
    $message .= "</pre>";
    $message .= "<hr>";
    echo $message, '<br>';
}


/**
 * 
 * print_r debug function
 * @param array $var
 */
function p($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

function baseUrl() {
    if (Config::$lang == 'fa')
        return BASE_URL;
    elseif (Config::$lang == 'en')
        return BASE_URL . 'en';
}

function redirect($controller, $action = NULL, $param = NULL) {
    $location = baseUrl();
    $location .= '/' . $controller;
    $location .= ( $action != NULL ) ? '/' . $action : '';
    $location .= ( $param != NULL ) ? '/' . $param : '';
    ob_start();
    header('Location: ' . $location);
    ob_clean();
}

function set_flush($title, $msg, $type = 'error'/* info */) {

    $_SESSION['flush']['title'] = $title;
    $_SESSION['flush']['msg'] = $msg;
    $_SESSION['flush']['type'] = $type;
}

function get_flush() {

    if (!isset($_SESSION['flush']['msg']))
        return false;
    $msg = $_SESSION['flush']['msg'];
    $type = $_SESSION['flush']['type'];
    $title = $_SESSION['flush']['title'];

    unset($_SESSION['flush']);

    return $msg;
}


function get_excerpt($text, $numb = 200) {
    if (mb_strlen($text) > $numb) {
        
        $text = strip_tags($text);
          $text = substr($text, 0, $numb);
        $text = mb_substr($text, 0, mb_strrpos($text, " "));
        $etc = " ...";
        $text = $text . $etc;
    }
    return $text;
}

/**
 *
 * @param type $path
 * @return type 
 */
function abstohttp($path) {
    return str_replace(PUBLIC_PATH, BASE_URL, $path);
}

/**
 * translate
 *
 * @param $key
 *
 * @return mixed3
 */
function __($key) {
    include PUBLIC_PATH . '/app/language/' . Config::$lang . '.php';
    return $lang[$key];
}

/**
 *
 *  return Date En OR Fa
 *
 * @param string $lang
 * @param bool   $hour
 * @param bool   $fdigit
 *
 * @return bool|string
 */
function get_date($lang='en', $hour = false, $fdigit = true) {
	$date = date('Y/m/j');
   if($lang == 'fa'){
		$d = new Farsi();
		$d->farsiDigits = $fdigit;
		if ($hour)
			return $d->date('Y/m/j H:i', strtotime($date), '+3.30');
		else
			return $d->date('Y/m/j', strtotime($date), '+3.30');
   }else 
   {
		return $date;   
   }
}
