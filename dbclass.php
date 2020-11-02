<?php
class database
{
    public function __construct()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toronto";

        // Create connection
        $this->sql = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        mysqli_set_charset($this->sql,"utf8");
        if ($this->sql->connect_error) {
            die("Connection failed: " . $this->sql->connect_error);
        }


    }

    // public function select_servises($query){
    //     $sql = "select * from services".$query;
    //     $result = $this->sql->query($sql);
    //     return $result;
    // }


    public function select_articles($query)
    {


          $sql = "select * from articles".$query;
          $result = $this->sql->query($sql);
          return $result;
    }


     public function select_businessinsigts($query)
    {


          $sql = "select * from businessinsigts".$query;
          $result = $this->sql->query($sql);
          return $result;
    }

                                                            
}
    