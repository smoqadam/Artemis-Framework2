<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 *
 * Class IndexController
 *
 */
class IndexController extends Controller {


    public function index() {

       echo $this->view->render('index.php',array('msg'=>"Hello World!"));
    }

}