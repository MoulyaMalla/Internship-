function loadProducts() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var xmlDoc = this.responseXML;
      var products = xmlDoc.getElementsByTagName("product");
      var productHtml = "";
      for (var i = 0; i < products.length; i++) {
        var name = products[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
        var price = products[i].getElementsByTagName("price")[0].childNodes[0].nodeValue;
        var image = products[i].getElementsByTagName("image")[0].childNodes[0].nodeValue;
        var description = products[i].getElementsByTagName("description")[0].childNodes[0].nodeValue;
        productHtml += '<div class="product"><img src="' + image + '"><h3>' + name + '</h3><p>' + description + '</p><p>$' + price + '</p></div>';
      }
      document.getElementById("product-list").innerHTML = productHtml;
    }