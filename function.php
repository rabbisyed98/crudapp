<?php
   Class crudApp{
        private $conn;

        public function __construct()
        {
            # database host, database user, database password, database name
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'crud_app';

            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if(!$this->conn){
                die('Database connection Error!!!');
            }
        }

        public function add_data($data){
            $name = $data['name'];
            $roll = $data['roll'];
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];


            $query = "INSERT INTO students(name,roll,image) VALUE('$name', $roll, '$image')";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name,'upload/'.$image);
                return 'Information Added Successfully!';
            }
        }

        public function display_data(){
            $query = "SELECT * FROM students";
            if(mysqli_query($this->conn, $query)){
                $return_data = mysqli_query($this->conn, $query);
                return $return_data;
            }
        }

        public function display_data_by_id($id){
            $query = "SELECT * FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                $return_data = mysqli_query($this->conn, $query);
                $studen_data_ed = mysqli_fetch_assoc($return_data);
                return $studen_data_ed;
            }
        }

        public function update_data($data)
        {
            # code...
            $name = $data['ed_name'];
            $roll = $data['ed_roll'];
            $id = $data['id'];
            $image = $_FILES['ed_image']['name'];
            $tmp_name = $_FILES['ed_image']['tmp_name'];



            $query = "UPDATE students SET name='$name', roll='$roll', image='$image' WHERE id='$id' ";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, 'upload/'.$image);
                return "Informatiton Updated Succesfully!";
            }
        }

        public function delete_data($id){
            $catch_image = "SELECT * FROM students WHERE id=$id";
            $delete_info = mysqli_query($this->conn, $catch_image);
            $info_delete = mysqli_fetch_assoc($delete_info);
            $delete_img_data = $info_delete["image"];
            $query = "DELETE FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                unlink('upload/'.$delete_img_data);
                return "Deleted Successfully!";
            }
        }
   }



?>