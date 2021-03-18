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
          <a href="Photos.php"><button id="photos" class="btn" onclick="opentab(event, 'Photos')"><i class="fa fa-file-photo-o"></i> Photos</button></a>
          <a href="About.php"><button id="about" class="btn active" onclick="opentab(event, 'About')"><i class="fa fa-info-circle"></i> About Shop</button></a>
        </div>
        <div class="shop-search">
          <form class="" method="post">
            <input type="search" name="" value="" placeholder="find product">
            <input id="search-shop-button" type="submit" name="" value="Search">
          </form>
        </div>
      </div>
    </section>

    <!-- about content -->
    <section id="About">
      <div class="history_container">
        <div class="history_title">
          <h1>History</h1>
        </div>
        <button type="button" id="btn" onclick="show()">></button>
        <div id="history_content">
          <p>K & M Cycle parts was established ..... and served for almost </p>
        </div>
      </div>
      <div class="management_container">
          <div class="management_content">
            <p>K & M Cycle parts was established ..... and served for almost </p>
          </div>
          <div class="management_title">
            <h1>Management</h1>
          </div>
        </div>
      <div class="goal_container">
        <div class="goal_title">
          <h1>Goal</h1>
        </div>
        <div class="goal_content">
          <p> We serve you a high quality product and service</p>
        </div>

      </div>
    </section>

    <!-- java script -->
    <script type="text/javascript">
      //see more
      var i=0;
      function show(){
        if(!i){
          document.getElementById("history_content").style.
            display = "inline";
          document.getElementById("btn").innerHTML.
            "Read less";
        }else{
          document.getElementById("history_content").style.
            display = "none";
          document.getElementById("btn").innerHTML.
            "Read More";

        }
      }


      // tabs selected   
      opentab(event, 'About') // to active the home ta
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
