<?php
     class login{
        private $error = "";
        function evaluate($data){
          $email= addslashes($data['email']);
          $password = addslashes($data['password']);
    
          $query = "select * from users where email = '$email' limit 1";
          $DB = new database();
          $result = $DB->read($query);
    
          if ($result) {
            $row = $result[0];
            if ($password == $row['password']){
              $_SESSION['userid'] = $row['userid'];
            }else{
              $this->error .= "Wrong password<br>";
            }
          }else{
            $this->error .= "No such email was found<br>";
          }
          return $this->error;
        }
    
        public function check_login($id){
          if( is_numeric($id)){
            $query = "select * from users where userid = '$id' limit 1";
            $DB = new database();
            $result = $DB->read($query);
    
            if($result){
              $user_data = $result[0];
              return $user_data;
            }else{
              header("Location:home.php");
              die;
            }
        }else{
          header("Location:home.php");
          die;
        }
      }
    }


    class signup{
        private $error = "";
        public function evaluate($data){
          foreach ($data as $key => $value) {
            // code...
            if(empty($value)){
              $this->error .= $key . " is empty!<br>";
            }
            if($key == "email"){
              if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {        //emailcode - unexplained
                // code...
                $this->error .=  " please enter valid email address<br>";
              }
            }
            if($key == "first_name"){
              if (is_numeric($value)) {
                // code...
                $this->error .=  "first name can't be a number<br>";
              }
            }
            if($key == "last_name"){
              if (is_numeric($value)) {
                // code...
                $this->error .=  "first name can't be a number<br>";
              }
            }
            if($key == "password"){
                if($data['password'] != $data['re-password']){
                    $this->error .= "password is not the same";
                }
            }
            
                
          }
          if($this->error == ""){
            //no error
            // $comment = "no error";
            // return $comment;
            $this->create_user($data);
          }else {
            return $this->error;
          }
        }
        public function create_user($data){
          $first_name = ucfirst($data['first_name']);
          $last_name = ucfirst($data['last_name']);
          $email= $data['email'];
          $password = $data['password'];
    
          $userid = $this->create_userid();
            //$url_address = strtolower($first_name) . "." . strtolower($last_name);
    
    
          $query = "insert into users
                    (userid, first_name, last_name, email, password)
                    values
                    ('$userid', '$first_name', '$last_name', '$email', '$password')";
    
    
          $DB = new database();
          $DB->save($query);
        }
        private function create_userid(){
          $length = rand(4,19);
          $number = "";
          for ($i=0; $i < $length ; $i++) {
            // code...
            $new_rand = rand(0,9);
            $number .= $new_rand;
          }
          return $number;
        }
      }


?>