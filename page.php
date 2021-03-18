<?php
  session_start();
  include("classes/connect.php");
  include("classes/log-in.php");
  include("classes/add-item.php");

  $login = new login();
  $user_data = $login->check_login($_SESSION['userid']);

  if(isset($_POST['search'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // header("Location:Shop.php");
    // die;
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Page | Shop-Cut</title>
    <link rel="stylesheet" href="page-style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="lightbox.min.css?v=<?php echo time(); ?>"">
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
            <li><a href="#">Cart</a></li>
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
          <a href="page.php"><button id="home" class="btn active " onclick="opentab(event, 'Home')"><i class="fa fa-home"></i> Home</button></a>
          <a href="Shop.php"><button id="shop" class="btn" onclick="opentab(event, 'Shop')"><i class="fa fa-shopping-cart"></i> Shop</button></a>
          <a href="Photos.php"><button id="photos" class="btn" onclick="opentab(event, 'Photos')"><i class="fa fa-file-photo-o"></i> Photos</button></a>
          <a href="About.php"><button id="about" class="btn" onclick="opentab(event, 'About')"><i class="fa fa-info-circle"></i> About Shop</button></a>
        </div>
        <div class="shop-search">
          <form class=""  action="Shop.php" method="post">
            <input type="search" name="keyword" value="" placeholder="find product">
            <input id="search-shop-button" type="submit" name="search" value="Search">
          </form>
        </div>
      </div>
    </section>


    <!-- home content -->
    <section id="Home" class="tabcontent">
      <div class="video-container">
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/ixV5USZ73e4" allowfullscreen></iframe>
          <img src="https://www.icn.ch/sites/default/files/inline-images/Picture1.png" alt="">
      </div>
      <div class="message-container">
          
      </div>
      <div class="top-product">
        <table>
          <caption><h2>Hot Product List</h2></caption>
          <tr>
            <th>no.</th>
            <th>Items</th>
            <th style="width:300px">Description</th>
            <th>Sold item</th>
            <th>Price</th>
            
          </tr>
          <?php
          // collect data from data base
          $top = new item();
          $userid = $_SESSION['userid'];
          $top = $top->get_topitem($userid);
          if($top){
            foreach ($top as $key => $value) {
              // echo "<pre>";
              // print_r($value);
              // echo "</pre>";
              if($value == ""){
              }else{
                $key =$key+1;
                $item = $value['items'];
                $description = $value['description'];
                $item_sold = $value['item_sold'];
                $price = $value['price'];

                echo 
                "<tr>
                <td>$key</td>
                <td>$item</td>
                <td>$description</td>
                <td>$item_sold</td>
                <td>P $price</td>
                </tr>";
              }
            }
          }
    
          ?>
      </div>
      <div class="new-list">
          <table>
            <caption><h3>Top Price Product</h3></caption>
            <tr>
              <th>no.</th>
              <th>Category</th>
              <th>Items</th>
              <th>Description</th>
              <th>Stock</th>
              <th>Price</th>
            </tr>
            <?php
            // collect data from data base
              $top = new item();
              $userid = $_SESSION['userid'];
              $new = $top->get_newitem($userid);
              if($new){
                foreach ($new as $key => $value) {
                  // echo "<pre>";
                  // print_r($value);
                  // echo "</pre>";
                  if($value == ""){
                  }else{
                    $key =$key+1;
                    $category = $value['category'];
                    $item = $value['items'];
                    $description = $value['description'];
                    $item_sold = $value['item_sold'];
                    $price = $value['price'];
    
                    echo 
                    "<tr>
                    <td>$key</td>
                    <td>$category</td>
                    <td>$item</td>
                    <td>$description</td>
                    <td>$item_sold</td>
                    <td>P $price</td>
                    </tr>";
                  }
                }
              }
        
            ?>
          </table>
      </div>
    </section>

    <!-- java script -->
    <script>
      // tabs selected   
      opentab(event, 'Home') // to active the home ta
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
    </script>



  </body>
</html>
