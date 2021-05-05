<?php


class Database
{
    private $user;
    private $password;
    private $dbname;
    private $host;

    /**
     * Database constructor.
     * @param $user
     * @param $password
     * @param $dbname
     * @param $host
     */
    public function __construct($user, $password, $dbname, $host)
    {
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->host = $host;
    }

    public function databaseConnection()
    {
        try {
            //$conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
            $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        } catch (mysqli_sql_exception $e) {
            echo "Problem connecting to database: ".$e->getMessage();
            return false;
        }
        return $conn;
    }
}