<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 *
 * Class Controller
 *
 */
class Controller
{


    /**
     * access to Twig object for View layer
     *
     * @var type Twig object
     */
    protected $view;

    function __construct()
    {

        /**
         * Twig options
         */
        $loader = new Twig_Loader_Filesystem(APP_DIRECTORY . DS . '/view');
        $twig = new Twig_Environment($loader, array(
            'cache' => Config::CACHE
        ));

        /**
         * create global function for access in twig view
         */
        $twig->addFunction('baseUrl', new Twig_Function_Function('baseUrl'));
        $twig->addFunction('getFlush', new Twig_Function_Function('get_flush'));
        $twig->addFunction('thumb', new Twig_Function_Function(array('Image', 'thumb')));
        $twig->addFunction('get_options', new Twig_Function_Function('get_options'));
        $twig->addFunction('_', new Twig_Function_Function('__'));
        $twig->addFunction('excerpt', new Twig_Function_Function('get_excerpt'));
        $twig->addFunction('date', new Twig_Function_Function('date'));
        $twig->addFunction('get_date', new Twig_Function_Function('get_date'));
        $twig->addFilter('strip', new Twig_Filter_Function('stripslashes'));
        $twig->addGlobal("JSF", JSF);
        $twig->addGlobal("CSSF", CSSF);
        $twig->addGlobal("IMGF", IMGF);
        $twig->addGlobal("SITEURL", BASE_URL);
        $twig->addGlobal("lang", Config::$lang);
        $twig->addGlobal("layout", 'layout.php');
        $this->view = $twig;


        if (method_exists($this, 'init')) {
            $this->init();
        }
    }
}