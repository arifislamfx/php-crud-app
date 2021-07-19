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

        // update data 
        public function update_data($data) {
            $std_name_u = $data['u_std_name'];
            $std_roll_u = $data['u_std_roll'];
            $idNo = $data['id'];
            $std_img_u = $_FILES['u_std_img'] ['name'];
            $tmp_name = $_FILES['u_std_img'] ['tmp_name'];

            $query = "UPDATE students SET std_name = '$std_name_u', std_roll = $std_roll_u, std_img = '$std_img_u' WHERE id=$idNo";
            
            if(mysqli_query($this->conn, $query)) {
                move_uploaded_file($tmp_name, 'upload/'.$std_img_u );
                return "Information Updated Successfully!";
            }

        }

        // // delete items
        public function deleteItem ($id) {

            $catchImg = "SELECT * FROM students WHERE id = $id";
            $deleteInfo = mysqli_query($this->conn, $catchImg);
            $studentsInfo = mysqli_fetch_assoc($deleteInfo);
            $delete_img_data = $studentsInfo['std_img'];


            $query = "DELETE FROM students WHERE id = $id";
            if(mysqli_query($this->conn, $query)) {

                unlink('upload/'.$delete_img_data);

                return "Successfully deleted";
            }
        }


}



?>