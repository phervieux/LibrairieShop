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

    <!-- Initialize FooTable -->
    <script>
        jQuery(function($){
            $('.table').footable();
        });
    </script>
  </body>
</html>