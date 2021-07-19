<?php 

Class webDevs {
    private $conn;

    public function __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'webdevs';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if(!$this->conn) {
            die('Could not find webdevs');
        }
    }

    public function add_data($data) {
        $std_name = $data['std_name'];
        $std_roll =  $data['std_roll'];
        $std_img = $_FILES['std_img'] ['name'];
        $tmp_name = $_FILES['std_img'] ['tmp_name'];

        $query = "INSERT INTO students(std_name,std_roll,std_img) VALUE('$std_name', $std_roll, '$std_img' )";
        
        if(mysqli_query($this->conn, $query)) {
            move_uploaded_file($tmp_name, 'upload/'.$std_img);
            return "Information Added Successfully";
        }

    }

         // Read or Desplay data 
         public function display_data() {
            $query = "SELECT * FROM students";
            if(mysqli_query($this->conn, $query)) {
                $returndata = mysqli_query($this->conn, $query);
                return $returndata;
            }
        }

        // display data by id
        public function display_data_by_id($id) {
            $query = "SELECT * FROM students WHERE id = $id";
            
            if(mysqli_query($this->conn, $query)) {
                $returndata = mysqli_query($this->conn, $query);
                $stdData = mysqli_fetch_assoc($returndata);
                return $stdData;
            }
        }


}



?>