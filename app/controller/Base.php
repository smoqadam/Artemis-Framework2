<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 *
 * Class BaseController
 *
 */
class BaseController extends Controller {

    protected $logged_in = false;

   
    function __construct() {
      
        
        parent::__construct();
        
    }

}