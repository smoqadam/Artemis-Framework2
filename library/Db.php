<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class DB
{
    const FETCH = PDO::FETCH_OBJ;

    private $pdo;
    private $stm;
    private $query;
    private $error;
    private $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO('mysql:host=' . Config::DBHOST. ';dbname=' . Config::DBNAME.';charset=utf8', Config::DBUSERNAME, Config::DBPASSWORD);
    }

    /**
     *  all for fetchAll
     *  one for fetch
     *  count for rowCount
     *  lastID for lastInsertId
     * 
     * @param type $query
     * @param type $bind
     * @param type $fetchStyle
     * @return type 
     */
    function query($query, $bind=array(), $fetchStyle = 'none')
    {
        try
        {
            $st = $this->pdo->prepare($query);

            foreach ($bind as $f => $v)
            {
                if (is_int($v))
                {
                    $st->bindValue(':' . $f, $v, PDO::PARAM_INT);
                } else
                {
                    $st->bindValue(':' . $f, $v);
                }
            }
            if(INVIR == 'develop')
            {
                echo '<pre>';
                echo  $query  .= ' ex '.$st->execute() .'<br>';
                p($st->errorInfo());
                //debug_print_backtrace();
                echo '</pre>';
            }
            else
               $ex = $st->execute ();

            switch ($fetchStyle)
            {
                case 'all':
                    return $st->fetchAll(DB::FETCH);
                    break;
                case 'one':
                    return $st->fetch(DB::FETCH);
                    break;
                case 'count':
                    return $st->rowCount();
                    break;
                case 'lastID':
                    return $this->pdo->lastInsertId();
                    break;
                case 'fields':
                    $i = 0;
                    while($i < $st->columnCount())
                    {
			//  $i;
			$meta = $st->getColumnMeta($i);
			$fields[$meta['name']]=  '' ;
			$i++;
                    }
                    return $fields;
                    break;
                case 'none':
                    return $ex;
                    break;
            }
           
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            $this->set_error($e->getMessage());
        }
    }

    function set_error($error)
    {
        $this->error = $error;
        
    }

    function lastID()
    {
        return $this->pdo->lastInsertId();
    }
    function get_error()
    {
        return $this->error;
    }
    
    
}
