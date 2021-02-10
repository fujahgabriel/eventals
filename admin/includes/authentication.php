<?php

class Authentication
{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $db;
    public function __construct($db)
    {
        $this->conn = $db;
    }


    function doLogin($email, $password)
    {

        $sql = "SELECT * FROM  " . $this->table_name . " WHERE email='$email' AND password='$password' AND role =1 AND is_active = 1";

        $query = $this->conn->query($sql);

       // error_log($sql, 3, "errors.log");
        if (mysqli_num_rows($query) == 1) :
            $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        else :
            $data = $sql;
        endif;
        return $data;

        $this->conn->close();
    }

    function escape($string)
    {
        return $this->conn->escape_string($string);
    }
}
