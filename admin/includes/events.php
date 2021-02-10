<?php

class Events
{

    // database connection and table name
    private $conn;
    private $table_name = "events";
    private $table_name_et = "event_types";

    // object properties

    public $db;
    public $id;
    public $title;
    public $userID;
    public $description;
    public $slug;
    public $location;
    public $price;
    public $event_type;
    public $image;
    public $start_date;
    public $end_date;
    public $is_featured;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    function loadEvents()
    {

        $sql = "SELECT * FROM  " . $this->table_name . "   ORDER BY id DESC";

        $query = $this->conn->query($sql);

        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $data;

        $this->conn->close();
    }

    function storeEvent()
    {
        $now = date('Y-m-d h:i:s');
        $eventType = implode(',', $this->event_type);
        $sql = "INSERT INTO  " . $this->table_name . " (`userID`,`title`,`slug`,`description`,`eventType`,`price`,`image`,`startDate`,`endDate`,`location`,`is_featured`,`created_at`,`updated_at`)  VALUES ('$this->userID','$this->title','$this->slug','$this->description','$eventType','$this->price','$this->image','$this->start_date','$this->end_date','$this->location','$this->is_featured','$now','$now')";
        $query = $this->conn->query($sql);

        if (!$query) {
            error_log($this->conn->error . "\r\n", 3, "errors.log");
        }

        if ($query) :
            return true;
        else :
            return false;
        endif;


        $this->conn->close();
    }

    function deleteEvent($id)
    {

        $sql = "DELETE  FROM  " . $this->table_name . "  WHERE id='$id'";

        $query = $this->conn->query($sql);

        if ($query) :
            return true;
        else :
            return false;
        endif;


        $this->conn->close();
        //error_log($sql, 3, "errors.log");
    }

    function storeEventType($title)
    {
        $now = date('Y-m-d h:i:s');
        $sql = "INSERT INTO  " . $this->table_name_et . " (`title`,`created_at`,`updated_at`)  VALUES ('$title','$now','$now')";

        $query = $this->conn->query($sql);

        if ($query) :
            return true;
        else :
            return false;
        endif;


        $this->conn->close();
    }

    function getEventTypes($id = null)
    {

        if (!empty($id)) :
            $sql = "SELECT * FROM  " . $this->table_name_et . "   WHERE id='$id' ";
        else :
            $sql = "SELECT * FROM  " . $this->table_name_et . "   ORDER BY id DESC";
        endif;
        $query = $this->conn->query($sql);

        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $data;

        $this->conn->close();
    }


    function deleteEventType($id)
    {

        $sql = "DELETE  FROM  " . $this->table_name_et . "  WHERE id='$id'";

        $query = $this->conn->query($sql);

        if ($query) :
            return true;
        else :
            return false;
        endif;


        $this->conn->close();
        //error_log($sql, 3, "errors.log");
    }

    function updateEventType($title, $id)
    {
        $now = date('Y-m-d h:i:s');
        $sql = "UPDATE " . $this->table_name_et . " SET  `title`='$title', `updated_at`='$now' WHERE id='$id'";

        $query = $this->conn->query($sql);

        if ($query) :
            return true;
        else :
            return false;
        endif;


        $this->conn->close();
    }


    function escape($string)
    {
        return $this->conn->escape_string($string);
    }
}
