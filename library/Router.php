<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */

class Router {

    private static $dir;

    /**
     *
     * Router
     *
     * @param $url
     * @throws ArtemisControllerNotFoundException
     * @throws ArtemisActionNotFoundException
     */
    public static function route($url) {

        $dir = '';
        $url = trim($url,'/');
        $urlParts = @explode('/', $url);
        if (count($urlParts) == 0 OR empty($urlParts[0])) {
            $urlParts[0] = 'Index'; //set default controller
            $urlParts[1] = 'index'; //set default action
        }

        /**
         * for language
         */
        if ($urlParts[0] == 'en') {
            array_shift($urlParts);
            Config::$lang = 'en';
        }

        /**
         * Admin area
         */
        if ($urlParts[0] == Config::ADMIN_AREA) {
            array_shift($urlParts);
            $dir = 'admin';
        }

        /**
         * Base Contoller
         */
        if (file_exists($baseController = APP_DIRECTORY . DS . 'controller' . DS . 'Base.php')) {
            include $baseController;
        }

        /**
         * Controller
         */
        if (file_exists($file = APP_DIRECTORY . DS . 'controller' . DS . $dir . DS . ucfirst($urlParts[0]) . '.php')) {
            $controller = $urlParts[0];
            array_shift($urlParts); // remove controller name from urlParts
            include $file;
        } elseif ($urlParts[0] == '' AND file_exists($file = APP_DIRECTORY . DS . 'controller' . DS . $dir . DS . 'Index.php')) {
            $controller = 'index';
            include $file;
        }else {
            throw new ArtemisControllerNotFoundException("Controller <kbd>$urlParts[0]</kbd> Not found in <kbd>app/controller</kbd> directory ");
        }

        $className = ucfirst($controller) . 'Controller';
        $obj = new $className();

        /**
         * Action
         */
        if (isset($urlParts[0]) AND method_exists($obj, $urlParts[0])) {
            $action = $urlParts[0];
            array_shift($urlParts);
        }
        elseif ($urlParts[0] == '' AND method_exists($obj, 'index')) {
            $action = 'index'; // defaulr action
        }
        else {
            throw new ArtemisActionNotFoundException("Action <b>$urlParts[0]</b> Not found in controller <b>$controller</b> ");
        }

        /*
         * set named parameter like domain.com/user/id/12
         */
        if (count($urlParts) >= 1 ) {
            if(Config::NAMED_PARAMETER)
                $params = self::getArgs($urlParts);
            else
                $params = $urlParts;
        }else
            $params = array();

        call_user_func_array(array($obj, $action), $params);
    }


    private function controller_exists($controller){

    }

    /**
     * @param $params
     *
     * @return array
     */
    static function getArgs($params) {
        $argsname = array();
        foreach ($params as $key => $value) {
            if ($key % 2 == 0) {
                $argsname[] = $value;
            }else
                $argsvalue[] = $value;
        }
        return (count($argsvalue) > 0) ? array_combine($argsname, $argsvalue) : array();
    }

}