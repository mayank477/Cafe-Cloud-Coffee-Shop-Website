<?php
session_start();

if(!isset($_SESSION['login_status']))
{
  echo "You skipped the login";
  echo "<a href='login.html'>Login Here</a>";
  die;
}
if($_SESSION['login_status']==false)
{
  echo "Login Failed";
  echo "<a href='login.html'>Login Here</a>";
  die;
}

//$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
//$userd=$_SESSION['userid'];

// echo "<div>
//       <div class='username'>$uname</div>
// </div>"
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="cafe-cloud.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
    <div class="modal fade modal-fullscreen-md-down modal-lg" id="mymodal">
      <div class="modal-dialog bg-dark">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <div class="modal-title">
              <h2 class="text-std f-std">Login Form</h2>
            </div>
            <button type="button" class="cc-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-column">
              <div class="form-row">
                <input type="text" class="cc-form-control" placeholder="UserName" name="un">
              </div>
              <div class="form-row mt-3">
                <input type="password" class="cc-form-control" placeholder="Password" name="pw">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="p-2 cc-btn" value="Login">
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-expand-md navbar-light bg-std cc-navbar fixed-top">
      <div class="container">
        <div class="navbar-brand">LOGO</div>
        <button name="Menu" class="navbar-toggler" data-bs-target="#mynav" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynav">
            <div class="navbar-nav">
                <div class="nav-item">
                    <a href="" class="nav-link active f-std">Home</a>
                </div>
                <div class="nav-item">
                    <a href="#gallery" class="nav-link f-std">BestSellers</a>
                </div>
                <div class="nav-item">
                    <a href="" class="nav-link f-std">About Us</a>
                </div>
                <div class="nav-item">
                    <a href="#contact" class="nav-link f-std">Contact</a>
                </div>
                <div class="nav-item">
                    <a href="menu.php" class="nav-link f-std">View Menu</a>
                </div>
                <div class="nav-item">
                    <a href="viewcart.php" class="nav-link f-std">View Cart</a>
                </div>
                <div class="nav-item">
                    <a href="logout.php" class="nav-link f-std">Logout</a>
                </div>
                <!-- <div class="nav-item">
                  <a href="" class="nav-link f-std" data-bs-toggle="modal" data-bs-target="#mymodal">Login</a>
                  <a href="login.html" class="nav-link f-std" >Login</a>
                </div>
                <div class="nav-item">
                <a href="signup.html" class="nav-link f-std">Signup</a>
                </div> -->
                <div>
                  <?php
                  echo "
                  <div>
                      <div class='username'>Welcome $username</div>
                  </div>";
                  ?>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="cc-carousel carousel slide" data-bs-ride="carousel" id="myslider">
      <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url(images/4.jpeg);">
        <div class="carousel-caption">
          <h2 class="text-std">Some Text</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque dolores ducimus vitae similique, velit perspiciatis temporibus quo, ad, repellat aperiam rem odit dicta dignissimos nisi iste officiis soluta. Consequuntur, dolor.</p>
        </div>
      </div>
        <div class="carousel-item" style="background-image: url(images/7.jpeg);">
        <div class="carousel-caption">
          <h2 class="text-std">Some Text</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum aliquid veniam ipsa architecto, necessitatibus ex sunt blanditiis magnam vitae adipisci dolore tenetur voluptatem dicta accusamus. Id asperiores praesentium exercitationem et!</p>
        </div>
        </div>
      </div>
      <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#myslider">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#myslider">
        <span class="carousel-control-next-icon"></span>
      </button>
      <div class="carousel-indicators">
        <div data-bs-target="#myslider" data-bs-slide-to="0" class="active"></div>
        <div data-bs-target="#myslider" data-bs-slide-to="1"></div>
      </div>
    </div>   

    <div class="cc-quote container mt-5" id="contact">
      <div class="row">
        <div class="col-lg-5 pe-4">
          <img src="images/8.jpeg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-7 p-5 bg-dark d-flex flex-column">
          <div class="cc-quote-main">
            <div class="cc-quote-header">
              <h2 class="text-std f-std">SEAT RESERVING</h2>
              <p class="d-std">Reserve a <span>SEAT</span></p>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-6">
              <input type="text" class="cc-form-control" placeholder="Your Name">
            </div>
            <div class="col-md-6">
              <input type="text" class="cc-form-control" placeholder="Your Email">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="cc-form-control" placeholder="Phone Number">
            </div>
            <div class="col-md-6">
              <input type="text" class="cc-form-control" placeholder="Number Of People">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"> 
                <textarea class="cc-form-control" rows="5" placeholder="Order Here"></textarea>
            </div>
            <div class="col-md-6 d-flex align-items-end">
              <input type="submit" class="p-2 cc-btn" value="SEND MESSAGE">
          </div>

        </div>
        </div>
      </div>
    </div>
    <div class="container mt-5" id="gallery">
      <p class="text-center text-std f-std">OUR BESTSELLERS</p>
      <p class="text-center text-lg f-std text-dark">
        We Have Food For <span>Everyone to Enjoy</span>
      </p>

      <div class="row">
        <div class="col-lg-3 col-md-6 mt-4">
          <div class="cc-team-img">
              <img src="images/1.jpeg" class="img-fluid">
              <div class="cc-team-contact d-flex flex-column">
                <i class="fa-solid fa-cart-shopping p-2 bg-light mb-2"></i>
              </div>
          </div>
          <div class="text-center">
            <h3 class="text-lg f-std">Chicken Spl Burger</h3>
            <p class="text-center text-std f-std">110/-</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4">
          <div class="cc-team-img">
            <img src="images/3.jpeg" class="img-fluid">
            <div class="cc-team-contact d-flex flex-column">
              <i class="fa-solid fa-cart-shopping p-2 bg-light mb-2"></i>
            </div>
          </div>
          <div class="text-center">
            <h3 class="text-lg f-std">Cheesy Fries</h3>
            <p class="text-center text-std f-std">90/-</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4">
          <div class="cc-team-img">
            <img src="images/5.jpeg" class="img-fluid">
            <div class="cc-team-contact d-flex flex-column">
              <i class="fa-solid fa-cart-shopping p-2 bg-light mb-2"></i>
            </div>
          </div>
          <div class="text-center">
            <h3 class="text-lg f-std">Chicken BBQ Pizza</h3>
            <p class="text-center text-std f-std">190/-</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4">
          <div class="cc-team-img">
            <img src="images/2  .jpeg" class="img-fluid">
            <div class="cc-team-contact d-flex flex-column">
              <i class="fa-solid fa-cart-shopping p-2 bg-light mb-2"></i>
            </div>
          </div>
          <div class="text-center">
            <h3 class="text-lg f-std">Cold Coffee With Ice-cream</h3>
            <p class="text-center text-std f-std">60/-</p>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4">LOGO</p>
            <h3 class="footer-head">
              <span>Address</span>
            </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minus aliquam error tempora officia eveniet.</p>
            <p>Learn More</p>
          </div>
          
          <div class="col-lg-3">
            <h3 class="footer-head">
              <span>Our Services</span>
            </h3>
            <!-- <ul class="list-unstyled"> 
              <li><a href="" class="nav-link f-std">Industrial</a></li>
              <li><a href="" class="nav-link f-std">Construction</a></li>
              <li><a href="" class="nav-link f-std">Remodeling</a></li>
            </ul>-->
          </div>
          <div class="col-lg-3">
            <h3 class="footer-head">
              <span>Contact</span>
            </h3>
            <!-- <ul class="list-unstyled"> 
              <li><a href="" class="nav-link f-std">Help Center</a></li>
              <li><a href="" class="nav-link f-std">Support Community</a></li>
              <li><a href="" class="nav-link f-std">Press</a></li>
              <li><a href="" class="nav-link f-std">FAQ</a></li>
              <li><a href="" class="nav-link f-std">OurPartners</a></li>
            </ul>-->
          </div>
        </div>
        <div class="row"></div>
      </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>