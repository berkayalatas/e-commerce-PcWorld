<?php

class DBController
{
    //development database connection 
    // protected $host = 'localhost';
    // protected $user = 'root';
    // protected $password = '';
    // protected $database = 'pcworld';


    //remote database connection 
    protected $host = 'remotemysql.com';
    protected $user = '2ojATkYoIs';
    protected $password = 'l16SA78JhG';
    protected $database = '2ojATkYoIs';


    //connection property
    public $connection = null;

    //call constructor
    public function __construct()
    {
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        if ($this->connection->connect_error) {
            echo "Connection error!! ";
        }
    }

    //close db, script is stopped or exited.
    public function __destruct()
    {
        $this->closeConnection();
    }

    //close DB connetion
    protected function closeConnection()
    {
        if ($this->connection != null) {
            $this->connection->close();
            $this->connection = null;
        }
    }
}
