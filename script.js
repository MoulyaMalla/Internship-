function ajaxProductsPageCall() {
  $.ajax({
    url: './pages/products.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}
