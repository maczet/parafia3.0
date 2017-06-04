<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 29.05.2017
 * Time: 20:46
 */

include_once($_SERVER['DOCUMENT_ROOT'].'/php/dbconfig.php');
/**
 * Class AdditionalConnectionOptions
 * Use magic methods to implement any  additional
 * connection options e.g. charset or application-name
 * custom to any database engine
 *
 * @set - any custom property
 * @get - any custom property
 *
 * <code>
 *   $additional = new AdditionalConnectionOptions;
 *   $
 * </code>
 *
 */

class AdditionalConnectionOptions
{

}


/**
 * Class ConnectionOptions
 * @Hostname string;
 * @Databasename string;
 * @Username string;
 * @Port integer;
 * @Password string;
 * @Additionals AdditionalConnectionOptions;
 */
class ConnectionOptions {

    private $hostname;
    private $databasename;
    private $username;
    private $port;
    private $password;
    private $additionals;
    //private $connection;

    function __construct($hostname, $databasename, $username, $password, $port = "", $additionals = "")
    {
        $this->hostname = $hostname;
        $this->databasename = $databasename;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
        $this->additionals = $additionals;
    }

    /**
     * @return mixed
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param mixed $hostname
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
    }

    /**
     * @return mixed
     */
    public function getDatabasename()
    {
        return $this->databasename;
    }

    /**
     * @param mixed $databasename
     */
    public function setDatabasename($databasename)
    {
        $this->databasename = $databasename;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}


/**
 * Class customDBEngine
 * Implements basic methods and properties
 * to all db engines
 */

class customDBEngine
{
    private $connection;
    private $connectionOptions;
    private $loggedUser;
    protected static $singleton = null;

    public static function getDatabase() {
       if (!isset(static::$singleton)) {
           static::$singleton = new static(DB_HOST, DB_NAME, DB_USER, DB_PASS);
           static::$singleton->connect();
        }
      return static::$singleton;
    }

    // this is singleton
    protected function __construct($hostname, $databasename, $username, $password, $port = "", $additionals = "")
    {
        $this->connectionOptions = new ConnectionOptions($hostname, $databasename, $username, $password, $port, $additionals);
    }

    protected function __clone()
    {
        // this is singleton
    }

    /**
     * @return customQuery
     */
    public function query()
    {
        return new customQuery($this);
    }

    public function connect()
    {
        $this->connection = new PDO("mysql:host=$this->connectionOptions->getHostname();dbname=$this->connectionOptions->getDatabasename()", $this->connectionOptions->getUsername(), $this->connectionOptions->getPassword());
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql)
    {
        return $this->prepare($sql);
    }

    public function login($user, $password)
    {
       if ($this->query()->open("SELECT firstname, lastname FROM users WHERE
          username= ? and password = ?", array($user, hash('sha256', $password)))->rowCount() > 0)
       {
           $this->loggedUser = $user;
           return true;
       }
       return false;
    }

    public function isLogged()
    {
        return $this->loggedUser <> '';
    }

    public function getLoggedUser()
    {
        return $this->loggedUser;
    }
}

/**
 * Class DBEngine
 * Implements only MySQL driver for now
 */
class DBEngine extends customDBEngine
{

}

interface queryInterface
{

}

class customQuery implements queryInterface
{
    private $connection;
    private $sql; // sql text
    private $stmt;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function open($sql, $values = "")
    {
        $this->stmt = $this->connection->prepare($sql);
        $this->stmt->execute(array($values));
        return $this;
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }

    public function getResult() {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSQL() {
        return $this->sql;
    }

    public function setSQL($sql)
    {
        $this->sql = $sql;
    }

}

