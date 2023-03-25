<?php 
session_start();
include('./include/config.php');
error_reporting(E_ALL);
if (isset($_SESSION['sess_user']))
{
    $active_user = $_SESSION['sess_user'];
    $location = $_SESSION['sess_location'];
    ?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./shoppingcart.scss">
	<!-- Demo CSS (No need to include it into your project) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<style>

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}


    .test {
  display: flex;
  flex-direction: row;
}
  </style>
 </head>
 <body> 
    <!-- Image and text -->
<nav>
  <div class="container">
    <ul class="navbar-left">
      <li><img src="https://tse1.mm.bing.net/th?id=OIP.BrvR9-atH0KR2dbpeW0wxAHaF7&pid=Api&P=0" width="30" height="40" class="d-inline-block align-top" alt="">
      <font color=white> MFU Portal</font></li>
      
    </ul> <!--end navbar-left -->

    
    <ul class="navbar-right">
    <li><a href="./logout.php" ><i class="fa fa-sign-out"></i> Logout</li>
    </ul>
    <ul class="navbar-right">
      <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span id="itemscount" class="badge">0</span></a></li>
    </ul> <!--end navbar-right -->
  </div> <!--end container -->
</nav>
<div class="container">
  <div class="row">
      <!-- start shopping cart conatiner -->
<div class="container d-flex justify-content-end">
  <div class="shopping-cart" style ="display : none ; z-index : +1000; position: absolute; ">
  <div class="cart-container">
          <h2>Cart</h2>
          <table>
            <thead>
              <tr >
              <th><strong>Product</strong></th>
              <th><strong>Price</strong></th>
              <th><strong>Remove Item</strong></th>
            </tr>
            </thead>
            <tbody id="carttable">

            </tbody>
          </table>
          <hr>
          <table id="carttotals">
            <tr>
              <td><strong>Items</strong></td>
              <td><strong>Total</strong></td>
              
            </tr>
            <tr>
              <td>x <span id="itemsquantity">0</span></td>
             
              <td> <?php //echo "$".$row['price'] 
                          if($location=='uk')
                          {
                            echo "&#8356;";
                          }
                          else if($location=='usa')
                          {
                            echo "$";
                          }
                          else
                          {
                            echo "₹";
                          }
                        ?> <span id="total">0</span></td>
            </tr></table>            
          <div class="cart-buttons">  
            <button id="emptycart">Empty Cart</button>
            <button onclick="ajaxPaymentPageCall()" id="checkout">Checkout</button>
          </div>
        </div>
  </div> <!--end shopping-cart -->

  </div>
  <div class="row">
  <main class="ajax-main-content"> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h2>Featured <b>Products</b>
        </h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
        <h4 id="alerts"></h4>
          <!-- Carousel indicators -->
          <!-- Wrapper for carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <?php 
                    $sqlquery=mysqli_query($conn,"SELECT * FROM `products` WHERE `location` = '$location'");
                    if(mysqli_num_rows($sqlquery)>0){
                      while($row=mysqli_fetch_array($sqlquery)) { ?> 
                  <div class="col-sm-3 mt-5 product">
                  <div class="thumb-wrapper">
                    <span class="wish-icon">
                      <i class="fa fa-heart-o"></i>
                    </span>
                    <div class="img-box">
                      <img src="https://www.91-cdn.com/hub/wp-content/uploads/2021/09/iphone-13-ipad-mini-india-price-image.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="thumb-content">
                    <h4  hidden class="productid"> <?php  echo htmlentities($row['pId']) ?> </h4>
                    <h4 class="productname"> <?php  echo htmlentities($row['productName']) ?> </h4>
                      <div class="star-rating">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star-o"></i>
                          </li>
                        </ul>
                      </div>
                     
                      <p class="price">
                        <?php //echo "$".$row['price'] 
                      
                          if($location=='uk')
                          { 
                            if($row['ukPrice']){
                            $pri=$row['ukPrice'];
                            echo "&#8356;".$pri;
                            }else{
                              echo "&#8356;".$row['price']*0.0099;
                            }
                          }
                          else if($location=='usa')
                          {
                            if($row['usaPrice']){
                            $pri=$row['usaPrice'];
                            echo "$".$pri;
                            }else{
                              echo "$".$row['price']*0.012;
                            }
                          }
                          else
                          {
                            echo "₹".$row['price'];
                          }
                        ?> 

                      </p>
                      <p class="item-price">
                        <b><?php  echo htmlentities($row['description']) ?> </b>
                      </p>                      
                      <button class="btn button-primary addtocart">Add To Cart</button>
                    </div>
                  </div>
                </div> <?php }
          
        }
      ?> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </main>

  </div>
</div>
  
  
 

</div>
<script  src="./script.js"></script> 

<script>
  $(document).ready(function() {
    $(".wish-icon i").click(function() {
      $(this).toggleClass("fa-heart fa-heart-o");
    });
  });
</script>

<script>
(function(){
 
 $("#cart").on("click", function() {
   $(".shopping-cart").fadeToggle( "fast");
 });
 
})();

</script>

</body>
</html>
<?php 
}else{
  header("Location: ./index.php");
}

?> 