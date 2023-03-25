function ajaxPaymentPageCall() {
  $.ajax({
    url: './pages/payment.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}
function reload(){
    window.location.href = "http://localhost/internship-/dashboard.php#";
}
///Cart Code
/* get cart total from session on load */
updateCartTotal();

/* button event listeners */
document.getElementById("emptycart").addEventListener("click", emptyCart);
var btns = document.getElementsByClassName('addtocart');
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function() {addToCart(this);});
}

/* ADD TO CART functions */

function addToCart(elem) {
    //init
    var sibs = [];
    var getprice;
    var getproductName;
    var cart = [];
    var stringCart;
    var productExists = false; // flag to check if product already exists in cart
    var productIndex = -1; // index of existing product in cart array

    //cycles siblings for product info near the add button
    while(elem = elem.previousSibling) {
        if (elem.nodeType === 3) continue; // text node
        if(elem.className == "price"){
            getprice = elem.innerText;
            
        }
        if (elem.className == "productname") {
            getproductName = elem.innerText;
       
        }
        if (elem.className == "productid") {
            getproductid = elem.innerText;
       
        }
       
        sibs.push(elem);
    }
    //create product object
    var product = {
        productname : getproductName,
        price : getprice,
        productid : getproductid,
        quantity: 1 // initialize quantity to 1
    };
    
    //convert product data to JSON for storage
    var stringProduct = JSON.stringify(product);
    
    /*send product data to session storage */
    
    if(!sessionStorage.getItem('cart')){
        //append product JSON object to cart array
    
        cart.push(stringProduct);
        //cart to JSON
        stringCart = JSON.stringify(cart);
        //create session storage cart item
        sessionStorage.setItem('cart', stringCart);
        addedToCart(getproductName);
        updateCartTotal();
    }
    else {
        //get existing cart data from storage and convert back into array
       cart = JSON.parse(sessionStorage.getItem('cart'));
         // check if product already exists in cart
         for (var i = 0; i < cart.length; i++) {
            var existingProduct = JSON.parse(cart[i]);
            if (existingProduct.productid === product.productid) {
                productExists = true;
                productIndex = i;
                break;
            }
        }
          // if product exists, update its quantity
        if (productExists) {
            var existingProduct = JSON.parse(cart[productIndex]);
            existingProduct.quantity++;
            cart[productIndex] = JSON.stringify(existingProduct);
        }    // otherwise, add the new product to the cart
        else {
            cart.push(stringProduct);
        }


       
        //cart back to JSON
        stringCart = JSON.stringify(cart);
        //overwrite cart data in sessionstorage 
        sessionStorage.setItem('cart', stringCart);
        addedToCart(getproductName);
        updateCartTotal();
    }
}
/* Calculate Cart Total */
function updateCartTotal(){
    //init
    var total = 0;
    var price = 0;
    var items = 0;
    var productname = "";
    var carttable = "";
    var totalcount=0;
    if(sessionStorage.getItem('cart')) {
        //get cart data & parse to array
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        //get no of items in cart 
        items = cart.length;
        
        //loop over cart array
        for (var i = 0; i < items; i++){
            //convert each JSON product in array back into object
            var x = JSON.parse(cart[i]);
            //get property value of price
            cur=x.price[0];
            price = parseFloat(x.price.split(/[$₹₤]/)[1]);
            productname = x.productname;
            productquan=x.quantity;
            //add price to total
            carttable += "<tr class='p-2'><td class='p-2'>" + productname + " * "+productquan+"</td><td class='p-2'>"+cur+ price.toFixed(2) + "</td></tr>";
            total +=productquan * price;
            totalcount +=productquan;
        }
        
    }
    //update total on website HTML
    document.getElementById("total").innerHTML = total.toFixed(2);
    //insert saved products to cart table
    document.getElementById("carttable").innerHTML = carttable;
    //update items in cart on website HTML
    document.getElementById("itemsquantity").innerHTML = totalcount;
    document.getElementById("itemscount").innerHTML = totalcount;
}
//user feedback on successful add
function addedToCart(pname) {
  var message = pname + " was added to the cart";
  var alerts = document.getElementById("alerts");
  alerts.innerHTML = message;
  if(!alerts.classList.contains("message")){
     alerts.classList.add("message");
  }
}
/* User Manually empty cart */
function emptyCart() {
    //remove cart session storage object & refresh cart totals
    if(sessionStorage.getItem('cart')){
        sessionStorage.removeItem('cart');
        updateCartTotal();
      //clear message and remove class style
      var alerts = document.getElementById("alerts");
      alerts.innerHTML = "";
      if(alerts.classList.contains("message")){
          alerts.classList.remove("message");
      }
    }
}
