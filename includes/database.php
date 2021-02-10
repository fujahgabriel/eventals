<?php
class DB
{

    private $host = "localhost";
    private $dbname = "eventsdb";
    private $dbuser = "root";
    private $dbpass = "";
    public $conn;

    function __construct($autoconnect = true)
    {

        if ($autoconnect) {
            $this->connect();
        }
    }

    public function connect()
    {

        $this->conn = new mysqli($this->host, $this->dbuser, $this->dbpass, $this->dbname);

        if ($this->conn->error) :

            die("Failed to connect");

        endif;
        return  $this->conn;
    }

    function query($query)
    {
        return $this->conn->query($query);
    }

    function escape($input)
    {
        $clean = strip_tags($input);
        return $this->conn->escape_string($clean);
    }
}
