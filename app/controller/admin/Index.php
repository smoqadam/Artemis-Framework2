<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class IndexController extends BaseController {


    function index() {
        echo $this->view->render('admin/index.php',array('hello'=>__('hello')));
    }

}