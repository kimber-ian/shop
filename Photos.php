<?php
  session_start();
  include("classes/connect.php");
  include("classes/log-in.php");
  include("classes/add-item.php");
  $login = new login();
  $user_data = $login->check_login($_SESSION['userid']);






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
          <a href="Shop.php"><button id="shop" class="btn" onclick="opentab(event, 'Shop')"><i class="fa fa-shopping-cart"></i> Shop</button></a>
          <a href="Photos.php"><button id="photos" class="btn active" onclick="opentab(event, 'Photos')"><i class="fa fa-file-photo-o"></i> Photos</button></a>
          <a href="About.php"><button id="about" class="btn" onclick="opentab(event, 'About')"><i class="fa fa-info-circle"></i> About Shop</button></a>
        </div>
        <div class="shop-search">
          <form class="" method="post">
            <input type="search" name="" value="" placeholder="find product">
            <input id="search-shop-button" type="submit" name="" value="Search">
          </form>
        </div>
      </div>
    </section>


    <!-- photo content -->
    <section id="Photos" class="tabcontent">
      <div class="gallery">
        <div class='photo-container'>
          <form method='post'>
          <div class='drop-zone'>
            <span class='drop-zone__prompt'>Drop file here or click to upload</span>
            <input type='file' name='myFile' class='drop-zone__input'>
          </div>
          <div class='upload'>
          <input type='text' name='myFile' placeholder='Product name'>
          <button type='submit' name='upload'>Upload</button>
          </div>
          </form>
        </div>
        <?php
          $item = new item();
            $userid = $_SESSION['userid'];
            $item = $item->get_item($userid);
            if($item){
              // echo "<pre>";
              // print_r($userid);
              // // print_r($item);
              // echo "</pre>";
              foreach ($item as $key => $value) {
                
                if($value['picture']){
                  // echo "<pre>";
                  // print_r($value);
                  // echo "</pre>";
                  $filelocation = $value['picture'];
                  if($value['picture_name'] != ""){
                    $filename = $value['picture_name'];
                  }else{
                    $filename = "Unkown";
                  }
                  
                  echo "<div class='photo-container'>
                          <a href='$filelocation' data-lightbox='mygallery'><img src='$filelocation 'alt=''></a>
                          <p>$filename</p>
                        </div>";
                }

              }
            }

          
        ?>
      </div>
    </section>

    <!-- java script -->
    <script src="page.js"> 
      
    </script>



  </body>
</html>
