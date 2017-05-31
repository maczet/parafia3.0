<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 29.05.2017
 * Time: 20:46
 */

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

    function __construct($hostname, $databasename, $username, $password, $port = "", $additionals = "")
    {
        this.$hostname = $hostname;
        this.$databasename = $databasename;
        this.$username = $username;
        this.$password = $password;
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
    private $connectionOptions;


    public function __construct()
    {

    }

    public function Connect()
    {

    }

    /**
     * @return customQuery
     */
    public function Query()
    {
        return new customQuery(this);
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

    public function __construct()
    {

    }

    public function open($sql)
    {

    }

    public function first()
    {

    }
}

