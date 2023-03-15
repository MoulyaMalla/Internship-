<?php 
session_start();

include('./include/config.php');
error_reporting(E_ALL);


if (isset($_SESSION['sess_user']))
{
    $active_user = $_SESSION['sess_user'];
    $location = $_SESSION['sess_location'];
}


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
	<link rel="stylesheet" href="css/demo.css">
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
 <body onload="ajaxProductsPageCall()"> 
    <!-- Image and text -->
<nav>
  <div class="container">
    <ul class="navbar-left">
      <li><img src="https://tse1.mm.bing.net/th?id=OIP.BrvR9-atH0KR2dbpeW0wxAHaF7&pid=Api&P=0" width="30" height="40" class="d-inline-block align-top" alt="">
      <font color=white> MFU Portal</font></li>
      
    </ul> <!--end navbar-left -->

    <ul class="navbar-right">
      <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">3</span></a></li>
    </ul> <!--end navbar-right -->
  </div> <!--end container -->
</nav>
<!-- start shopping cart conatiner -->
<div class="container d-flex justify-content-end">
  <div class="shopping-cart" style ="display : none ; z-index : +1000; position: absolute; ">
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">$2,229.97</span>
      </div>
    </div> <!--end shopping-cart-header -->

    <ul class="shopping-cart-items">
      <li class="clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg" alt="item1" />
        <span class="item-name">Sony DSC-RX100M III</span>
        <span class="item-price">$849.99</span>
        <span class="item-quantity">Quantity: 01</span>
      </li>

      <li class="clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg" alt="item1" />
        <span class="item-name">KS Automatic Mechanic...</span>
        <span class="item-price">$1,249.99</span>
        <span class="item-quantity">Quantity: 01</span>
      </li>

      <li class="clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg" alt="item1" />
        <span class="item-name">Kindle, 6" Glare-Free To...</span>
        <span class="item-price">$129.99</span>
        <span class="item-quantity">Quantity: 01</span>
      </li>
    </ul>

    <a href="#" class="button">Checkout</a>
  </div> <!--end shopping-cart -->
    <main class="ajax-main-content"> 

    </main>

</div>
<script  src="./js/script.js"></script> 
<script  src="./script.js"></script> 
<script>
(function(){
 
 $("#cart").on("click", function() {
   $(".shopping-cart").fadeToggle( "fast");
 });
 
})();

</script>

</body>
</html>