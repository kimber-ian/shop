<?php
  session_start();
  include("classes/connect.php");
  include("classes/log-in.php");
  include("classes/add-item.php");
  $category = "";
  $items = "";
  $description = "";
  $stocks = "";
  $price = "";
  $item_id = "";
  $ws_price = "";
  $picture_location = "";
  $picture_name = "";

  $login = new login();
  $user_data = $login->check_login($_SESSION['userid']);


  // adding data
  if (isset($_POST['addproduct'])) {
    if($_SERVER['REQUEST_METHOD']=='POST'){
      // echo "<pre>";
      // print_r($_POST);
      // print_r($_FILES);
      // echo "</pre>";
      
      if($_FILES['myFile']['name']){
        $filename =  "Images/uploaded_images/" . $_FILES['myFile']['name'];   // getting the images and save to uploads folder
      }else{
        $filename = "";
      }
     
      move_uploaded_file($_FILES['myFile']['tmp_name'], $filename);

      $item = new item();
      $userid = $_SESSION['userid'];
      // print_r($userid);
      // echo "<br>";
      $result = $item->evaluate($userid,$_POST,$filename);
      if($result == ""){
        header("Location:Shop.php");
        die;
      }else{
        echo $result;
      }
    }
  // updating data
  }else if (isset($_POST['submit-btn'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";
      $item_id = $_POST['item_id'];
      $category = $_POST['category'];
      $items =$_POST['items'];
      $description = $_POST['description'];
      $stocks = $_POST['stock'] ;
      $price = $_POST['price'];
      $ws_price = $_POST['ws_price'];
      $picture_location = $_POST['picture_location'];
      $picture_name = $_POST['picture_name'];
    }
  // deleting data 
  }else if (isset($_POST['delete-btn'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      // echo "<pre>";
      // print_r($_POST['item_id']);
      // echo "</pre>";
      $itemid = $_POST['item_id'];
      $query = "delete from items where item_id = '$itemid'";

      $item = new database();
      $item->save($query);
    }
  }else if(isset($_POST['add-btn'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";
      $itemid = $_POST['item_id'];
      $stock = $_POST['stock'] - 1;
      $add = $_POST['item_sold'] + 1;
      $query = "update items set stock = '$stock', item_sold = '$add' where item_id = '$itemid'";
      $item = new database();
      $item->save($query);
    }
  }else if(isset($_POST['sub-btn'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $itemid = $_POST['item_id'];
      if($_POST['item_sold'] > 0){
        $sub = $_POST['item_sold'] - 1;
        $stock = $_POST['stock'] + 1;
        $query = "update items set stock = '$stock', item_sold = '$sub' where item_id = '$itemid'";
        $item = new database();
        $item->save($query);
      }
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Page | Shop-Cut</title>
    <link rel="stylesheet" href="page-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="lightbox.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  </head>



  <body>
    <!-- menubar -->
    <section id="menubar">
      <div class="menutab">
        <h2><a href="#">SHOP-cut</a></h2>
        <div class="search_box">
          <form class="" action="index.html" method="post">
            <input type="search" name="" placeholder="Find">
          </form>
        </div>
        <div class="menu-tabs">
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Order</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="log-out.php">Log-out</a></li>
          </ul>
        </div>
      </div>
    </section>

    <section id="shop-info">
      <div class="cover-photo">
        <img src="Images/Home/cover.png" alt="">
      </div>
      <div class="shop-tab" id="myBtnContainer">
        <div class="tab-btn">
          <a href="page.php"><button id="home" class="btn " onclick="opentab(event, 'Home')"><i class="fa fa-home"></i> Home</button></a>
          <a href="Shop.php"><button id="shop" class="btn active" onclick="opentab(event, 'Shop')"><i class="fa fa-shopping-cart"></i> Shop</button></a>
          <a href="Photos.php"><button id="photos" class="btn" onclick="opentab(event, 'Photos')"><i class="fa fa-file-photo-o"></i> Photos</button></a>
          <a href="About.php"><button id="about" class="btn" onclick="opentab(event, 'About')"><i class="fa fa-info-circle"></i> About Shop</button></a>
        </div>
        <div class="shop-search">
          <form class="" method="post">
            <input type="text" name="keyword" value="" placeholder="find product">
            <input id="search-shop-button" type="submit" name="search" value="Search">
          </form>
        </div>
      </div>
    </section>



    <!-- shop content -->
    <section id="Shop"  class="tabcontent">
      <form method="post" enctype="multipart/form-data">
        <!-- update or input data -->
        <div class="add-product">
          <div class='drop-zone'>
            <span class='drop-zone__prompt'>Drop file here or click to upload</span>
            <input type='file' name='myFile' class='drop-zone__input' >
          </div>
          <div class="inputs">
            <h3>Parts Details</h3>
          <input id="pic_location" type='text' name='picture_location' placeholder='Picture location' value="<?php echo $picture_location ?>">
          <input id="pic_name" type='text' name='picture_name' placeholder='Picture Name' value="<?php echo $picture_name ?>">
          <select id="category" name="category" placeholder="Category">
              <option value="<?php echo $category ?>" ><?php echo $category ?></option>
              <option value="<?php echo $category ?>" ><?php echo $category ?></option>
              <option value="motor">motor</option>
              <option value="bicycle">bicycle</option>
            </select>
            <input id="items" type="text" value="<?php echo $items ?>" name="items" placeholder="Items">
            <input id="stocks" type="text" value="<?php echo $stocks ?>" name="stock" placeholder="Stocks">
            <div id="price_menu" class="price_menu">
              <input type="text" value="<?php echo $ws_price ?>" name="ws_price" placeholder="Whole Sale Price">
              <input type="text" value="<?php echo $price ?>" name="price" placeholder="Retail Price">
            </div>
            <textarea name="description" id="description" cols="30" rows="2" placeholder="Description"><?php echo $description ?></textarea>
            <input type='hidden' name='item_id' value='<?php echo $item_id ?>'>
          </div>
            <div class="add-btn">
              <input id="update_btn" type="submit" name="addproduct"value="Add/Update">
            </div>
        </div>
      </form>
      <caption><h2>All Product</h2></caption>
      <div class="product-list">
        <table>
          <tr>
            <th>no.</th>
            <th>Category</th>
            <th>Items</th>
            <th>Description</th>
            <th>Avail. Qty.</th>
            <th colspan="2">Price</th>
            <th>Option</th>
          </tr>
          <form class="edit_table" method="post">
            <?php
              // search data 
              if((isset($_POST['search'])) && $_POST['keyword'] != "" ){
                if($_SERVER['REQUEST_METHOD']=='POST'){
                  
                  $keyword = $_POST['keyword'];
                  // $stock = $_POST['stock'] + 1;
                  $query = "select * from items where items like '%$keyword%' or description like '%$keyword%' order by items,description asc";
                  $item = new database();
                  $item = $item->read($query);
                  if($item){

                    foreach ($item as $key => $value) {
                      if($value == ""){
                      }else{
                        // echo "<pre>";
                        // print_r($value);
                        // echo "</pre>";
                        $number = $key +1;
                        $category = $value['category'];
                        $items = $value['items'];
                        $description = $value['description'];
                        $stock = $value['stock'];
                        $price = $value['price'];
                        $item_id = $value["item_id"];
                        $ws_price = $value['ws_price'];
                        $item_sold = $value['item_sold'];
                        $picture_location = $value['picture'];
                        $picture_name = $value['picture_name'];

                        echo "<tr>
                        <td> $number </td>
                        <td>$category </td>
                        <td>$items</td>
                        <td>$description</td>
                        <td style='text-align:center'>$stock</td>
                        <td>P $ws_price </td>
                        <td>P $price  </td>
                        <td><form method='post' style='margin:auto; justify-content:space-between;'>
                            <input type='hidden' name='item_id' value='$item_id'>
                            <input type='hidden' name='category' value='$category'>
                            <input type='hidden' name='items' value='$items'>
                            <input type='hidden' name='description' value='$description'>
                            <input type='hidden' name='stock' value='$stock'>
                            <input type='hidden' name='price' value='$price'>
                            <input type='hidden' name='ws_price' value='$ws_price'>
                            <input type='hidden' name='item_sold' value='$item_sold'>
                            <input type='hidden' name='picture_location' value='$picture_location'>
                            <input type='hidden' name='picture_name' value='$picture_name'>
                            <button type='submit' name='submit-btn'><i class='fa fa-edit'></i></button>
                            <button type='submit' name='delete-btn'><i class='fa fa-trash'></i></button>
                            <button type='submit' name='sub-btn'><i class='fa fa-minus-square'></i></button>
                            <input style='width:10px;text-align:center' type='text' name='item_sold' value='$item_sold'>
                            <button type='submit' name='add-btn'><i class='fa fa-plus-square'></i></button>";
                            
                            if($picture_location != ""){
                              echo "<a href='$picture' data-lightbox='mygallery'><button type='submit' name='image-btn'><i class='fa fa-file-picture-o'></i></button></a>";
                            }
                            echo "
                        </form></td>
                    </tr>";
                      }
                    }
                  }
                  
                      
                }
              }else{
                // all data in table display
                $item = new item();
                $userid = $_SESSION['userid'];
                $item = $item->get_item($userid);
                if($item){
                  // echo "<pre>";
                  // print_r($userid);
                  // // print_r($item);
                  // echo "</pre>";
                  foreach ($item as $key => $value) {
                    // echo "<pre>";
                    // print_r($value);
                    // echo "</pre>";
                    if($value == ""){
                    }else{
                      $number = $key +1;
                      $category = $value['category'];
                      $items = $value['items'];
                      $description = $value['description'];
                      $stock = $value['stock'];
                      $price = $value['price'];
                      $item_id = $value["item_id"];
                      $ws_price = $value['ws_price'];
                      $item_sold = $value['item_sold'];
                      $picture_location = $value['picture'];
                      $picture_name = $value['picture_name'];

                      echo "<tr>
                      <td> $number </td>
                      <td>$category </td>
                      <td>$items</td>
                      <td>$description</td>
                      <td style='text-align:center'>$stock</td>
                      <td>P $ws_price </td>
                      <td>P $price  </td>
                      <td><form method='post'>
                          <input type='hidden' name='item_id' value='$item_id'>
                          <input type='hidden' name='category' value='$category'>
                          <input type='hidden' name='items' value='$items'>
                          <input type='hidden' name='description' value='$description'>
                          <input type='hidden' name='stock' value='$stock'>
                          <input type='hidden' name='price' value='$price'>
                          <input type='hidden' name='ws_price' value='$ws_price'>
                          <input type='hidden' name='item_sold' value='$item_sold'>
                          <input type='hidden' name='picture_location' value='$picture_location'>
                          <input type='hidden' name='picture_name' value='$picture_name'>
                          <button type='submit' name='submit-btn'><i class='fa fa-edit'></i></button>
                          <button type='submit' name='delete-btn'><i class='fa fa-trash'></i></button>
                          <button type='submit' name='sub-btn'><i class='fa fa-minus-square'></i></button>
                          <input style='width:10px;text-align:center' type='text' name='item_sold' value='$item_sold'>
                          <button type='submit' name='add-btn'><i class='fa fa-plus-square'></i></button>";
                          if($picture_location != ""){
                            echo "<a href='$picture_location' data-lightbox='mygallery'><button type='submit' name='image-btn'><i class='fa fa-file-picture-o'></i></button></a>";
                          }
                          echo "
                      </form></td>
                  </tr>";
                    }
                  }
                }
                
              }
              
              
            ?>
            
          </form>
          
        </table>
      </div>
      <div class="line">
        
      </div>
    </section>
    
    <!-- java script -->
    <script>
      // tabs selected   
      opentab(event, 'Shop') // to active the home ta
      function opentab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
      }
        


        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
          const dropZoneElement = inputElement.closest(".drop-zone");

          dropZoneElement.addEventListener("click", (e) => {
          inputElement.click();
          });

          inputElement.addEventListener("change", (e) => {
          if (inputElement.files.length) {
          updateThumbnail(dropZoneElement, inputElement.files[0]);
          }
          });

          dropZoneElement.addEventListener("dragover", (e) => {
          e.preventDefault();
          dropZoneElement.classList.add("drop-zone--over");
          });

          ["dragleave", "dragend"].forEach((type) => {
          dropZoneElement.addEventListener(type, (e) => {
          dropZoneElement.classList.remove("drop-zone--over");
          });
          });

          dropZoneElement.addEventListener("drop", (e) => {
          e.preventDefault();

          if (e.dataTransfer.files.length) {
          inputElement.files = e.dataTransfer.files;
          updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
          }

          dropZoneElement.classList.remove("drop-zone--over");
          });
          });



          /**
          * Updates the thumbnail on a drop zone element.  drop zone for upload photos 
          *
          * @param {HTMLElement} dropZoneElement
          * @param {File} file
          */
          function updateThumbnail(dropZoneElement, file) {
          let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

          // First time - remove the prompt
          if (dropZoneElement.querySelector(".drop-zone__prompt")) {
          dropZoneElement.querySelector(".drop-zone__prompt").remove();
          }

          // First time - there is no thumbnail element, so lets create it
          if (!thumbnailElement) {
          thumbnailElement = document.createElement("div");
          thumbnailElement.classList.add("drop-zone__thumb");
          dropZoneElement.appendChild(thumbnailElement);
          }

          thumbnailElement.dataset.label = file.name;

          // Show thumbnail for image files
          if (file.type.startsWith("image/")) {
          const reader = new FileReader();

          reader.readAsDataURL(file);
          reader.onload = () => {
          thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
          };
          } else {
          thumbnailElement.style.backgroundImage = null;
          }
          }
    </script>



  </body>
</html>
