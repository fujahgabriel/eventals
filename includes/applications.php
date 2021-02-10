<?php

class Applications
{

    // database connection and table name
    private $conn;
    private $table_name = "event_applications";

    // object properties
    public $db;
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $eventID;
  

    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    function get()
    {

        $sql = "SELECT * FROM  " . $this->table_name . " WHERE id='$this->id'";

        $query = $this->conn->query($sql);

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        $data = mysqli_fetch_assoc($query);

        return $data;

        $this->conn->close();
    }

    function store()
    {
        $now = date('Y-m-d h:i:s');
        
        $sql = "INSERT INTO  " . $this->table_name . " (`eventID`,`firstName`,`lastName`,`phone`,`email`,`created_at`)  VALUES ('$this->eventID','$this->firstName','$this->lastName','$this->phone','$this->email','$now')";
       
        $query = $this->conn->query($sql);
       

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        if ($query) :
            return $this->conn->insert_id;
        else :
            return false;
        endif;


        $this->conn->close();
    }


}