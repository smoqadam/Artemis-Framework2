<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class CustomException extends Exception{
    function __construct($message) {
        parent::__construct($message);
    }
}

class ArtemisFileNotFoundException extends CustomException{}

class ArtemisControllerNotFoundException extends CustomException{}

class ArtemisActionNotFoundException extends CustomException{}

class ArtemisLibraryNotFoundException extends CustomException{}