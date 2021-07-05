<?php

class DBConnection
{
    public $serverName = 'localhost'; // server ip
    public $dbUserName = 'root';      // server acess username
    public $dbUserNamePass = '';      // the password of the specified username, in this case there's no password, http://localhost/phpmyadmin/server_privileges.php?viewing_mode=server formore info
    public $dbName = 'testapp';     // database name
    private $dbConnection;
    public static $instance;


    function __construct()
    {
        $this->dbConnection = mysqli_connect($this->serverName, $this->dbUserName, $this->dbUserNamePass, $this->dbName);
        if (!$this->dbConnection) {
          
            die();
        }
    }

    public static function getInst()
    {
        if (!self::$instance) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}
