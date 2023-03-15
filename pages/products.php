<?php 
session_start();

include('./../include/config.php');
error_reporting(E_ALL);


if (isset($_SESSION['sess_user']))
{
    $active_user = $_SESSION['sess_user'];
    $location = $_SESSION['sess_location'];
}

?> <script>
  $(document).ready(function() {
    $(".wish-icon i").click(function() {
      $(this).toggleClass("fa-heart fa-heart-o");
    });
  });
</script>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h2>Featured <b>Products</b>
        </h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
          <!-- Carousel indicators -->
          <!-- Wrapper for carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <?php 
                    $sqlquery=mysqli_query($conn,"SELECT * FROM `products` WHERE 1 ");
                    if(mysqli_num_rows($sqlquery)>0){
                      while($row=mysqli_fetch_array($sqlquery)) { ?> 
                  <div class="col-sm-3 mt-5">
                  <div class="thumb-wrapper">
                    <span class="wish-icon">
                      <i class="fa fa-heart-o"></i>
                    </span>
                    <div class="img-box">
                      <img src="/examples/images/products/ipad.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="thumb-content">
                      <h4> <?php  echo htmlentities($row['productName']) ?> </h4>
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
                      <p class="item-price">
                        <b>$ <?php  echo htmlentities($row['price']) ?> </b>
                      </p>
                      <p class="item-price">
                        <b><?php  echo htmlentities($row['description']) ?> </b>
                      </p>
                      <a href="#" class="btn btn-primary">Add to Cart</a>
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
