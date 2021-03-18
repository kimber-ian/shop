<?php
    class item{
        private $error="";
        public function evaluate($userid,$data,$filename){
            foreach ($data as $key => $value) {
              // code...
              if(empty($value)){
                if (empty($key == "item_id")) {
                  if($value == ""){
                  }else{
                    $this->error .= $key . " is empty!<br>";
                  }
                }
                
              }
              if($key == "items"){
                if (is_numeric($value)) {
                  // code...
                  $this->error .=  "items can't be a number<br>";
                }
              }
              if($key == "stock"){
                if (!is_numeric($value)) {
                  // code...
                  $this->error .=  "stock must be a number<br>";
                }
              }
              if($key == "price"){
                if (!is_numeric($value)) {
                  // code...
                  $this->error .=  "price must be a number<br>";
                }
              }
            }

            if($this->error == ""){
              if ($data['item_id'] == "") {
                $this->create_item($userid,$data,$filename);
              }else{
                $this->update_item($userid,$data,$filename);

              }
            }else {
              return $this->error;
            }
          }
          //update the data
          public function update_item($userid,$data,$filename){
            $category = $data['category'];
            $items = ucfirst($data['items']);
            $description = ucfirst($data['description']);
            $stock = $data['stock'];
            $price = $data['price'];
            $item_id = $data['item_id'];
            $ws_price = $data['ws_price'];
            $picture_name = $data['picture_name'];
            if($filename == ""){
              $filename = $data['picture_location'];
            }
            
            $query = "Update items set 
            ws_price = '$ws_price', 
            category = '$category', 
            items = '$items', 
            price = '$price',
            description = '$description',
            stock = '$stock',
            picture = '$filename',
            picture_name = '$picture_name'
            
            where item_id = '$item_id' ";
            $item = new database();
            $item->save($query);
        }
          
        
          public function create_item($userid,$data,$filename){
              $category = $data['category'];
              $items = ucfirst($data['items']);
              $description = ucfirst($data['description']);
              $stock = $data['stock'];
              $price = $data['price'];
              $ws_price = $data['ws_price'];
              
              $item_id = $this->create_itemid();
              print_r($item_id);
              if($item_id == $userid){
                $this->create_item($userid,$data);
              }else{
                $query = "insert into items
                (item_id, category, items, description, stock, price, userid, ws_price, picture)
                values
                ($item_id, '$category', '$items', '$description', '$stock', '$price', '$userid', '$ws_price','$filename')";
              }
             

            $item = new database();
            $item->save($query);
          }
          private function create_itemid(){
            $length = rand(4,19);
            $number = "";
            for ($i=0; $i < $length ; $i++) {
              // code...
              $new_rand = rand(0,9);
              $number .= $new_rand;
            }
            return $number;
          }
          public function get_item($id){


              $query = "select * from items where userid = '$id' order by items,description asc ";
              
              $DB = new database();
              $result = $DB->read($query);
              if($result){
                  return $result;
              }else{
                  return false;
              }
          }
          public function get_topitem($id){
              $query = "select * from items order by item_sold desc limit 4";
              $DB = new database();
              $result = $DB->read($query);
              if($result){
                  return $result;
              }else{
                return false;
                }
            }
          public function get_newitem($id){
            $query = "select * from items order by price desc limit 4";
            $DB = new database();
            $result = $DB->read($query);
            if($result){
                return $result;
            }else{
              return false;
              }
          }
        





    }
?>