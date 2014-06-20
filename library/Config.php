<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 *
 * Class Config
 *
 */
class Config
{
    /**
     * Database host address
     */
    const DBHOST = 'localhost';

    /**
     * Database username
     */
    const DBUSERNAME = 'root';

    /**
     * Database Password
     */
    const DBPASSWORD = '';

    /**
     * Database name
     */
    const DBNAME = 'DBNAME';

    /**
     * Cache for twig template engine
     */
    const CACHE = false; // if true set : APP_DIRECTORY.DS.'tmp'

    /**
     * Default Language
     *
     * @var string
     */
    static $lang = 'fa';

    /**
     * admin area folder name
     */
    const ADMIN_AREA = 'admin';

    /**
     * if true parameters must be like this : http://domain.com/users/id/3
     */
    const NAMED_PARAMETER = false;
}