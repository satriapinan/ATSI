<?php

class DB
{
    private $db_host = "";
    private $db_user = "";
    private $db_pass = "";
    private $db_name = "";
    private $db_link = null;
    private $result = null;

    public function __construct($db_host = '', $db_user = '', $db_pass = '', $db_name = '')
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    public function open()
    {
        $this->db_link = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    public function execute($query = "")
    {
        $this->result = $this->db_link->query($query);

        if ($this->result === false) {
            return false; // Return false to indicate query execution failure
        }

        return $this->result;
    }


    public function getResult()
    {
        return $this->result->fetch_array();
    }

    public function getError()
    {
        return $this->db_link->error;
    }


    public function close()
    {
        $this->db_link->close();
    }
}
