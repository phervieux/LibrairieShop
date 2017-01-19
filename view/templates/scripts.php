<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.3/footable.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <!-- Initialize FooTable -->
    <script>
        jQuery(function($){
            $('.table').footable();
        });
        function add (id){
            $('#cart').load('cart.php?action=0&id='+id, function() {
                
            });
        }
        function remove (id){
            $('#cart').load('cart.php?action=1&id='+id, function() {
                
            });
        }
        function increase (id){
            $('#cart').load('cart.php?action=2&id='+id, function() {
                
            });
        }
        function decrease (id){
            $('#cart').load('cart.php?action=3&id='+id, function() {
                
            });
        }
    </script>
  </body>
</html>