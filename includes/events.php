<?php

class Events
{

    // database connection and table name
    private $conn;
    private $table_name = "events";

    // object properties
    public $id;
    public $title;
    public $db;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }


    function loadEvents($limit, $start, $type)
    {
        $now = date('Y-m-d h:i:s');


        if ($type == 'all') :
            $sql = "SELECT * FROM  " . $this->table_name . " WHERE published='1' AND startDate > '$now'  ORDER BY startDate ASC LIMIT $limit  OFFSET $start";
        else :
            $sql = "SELECT * FROM  " . $this->table_name . " WHERE published='1' AND startDate > '$now' AND (eventType='$type' OR eventType like '%$type%')  ORDER BY startDate ASC LIMIT $limit  OFFSET $start";
        endif;

        $query = $this->conn->query($sql);

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $data;

        $this->conn->close();
    }

    function searchEvents($q)
    {
        //$data = [];
        $now = date('Y-m-d h:i:s');


        $sql = "SELECT * FROM " . $this->table_name . " WHERE (`title` like '%$q%' OR `description` like '%$q%')  AND published='1' AND startDate > '$now'  ORDER BY startDate ASC";

        $query = $this->conn->query($sql);

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $data;

        $this->conn->close();
    }

    function loadFeatured($limits)
    {
        //$data = [];
        $now = date('Y-m-d h:i:s');


        $sql = "SELECT * FROM " . $this->table_name . " WHERE is_featured=1 AND published=1 AND startDate > '$now'  ORDER BY startDate ASC LIMIT $limits";

        $query = $this->conn->query($sql);

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $data;

        $this->conn->close();
    }

    function getEvent($condition)
    {

        $now = date('Y-m-d h:i:s');
        //$slug=$this->escape($slug);
        $sql = "SELECT * FROM " . $this->table_name . " WHERE $condition  AND published=1 AND startDate > '$now'";

        $query = $this->conn->query($sql);

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        $data = mysqli_fetch_assoc($query);

        return $data;

        $this->conn->close();
    }

    function escape($string)
    {
        return $this->conn->escape_string($string);
    }
}
