<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Summary Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<div class="container">
  <div><a href="index.php"><img src="resources/YoSoccer.jpg"></a><a href="index.php"><img src="resources/yosoccertitle.jpg" style="margin-left:15em"></a></div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <?php
        session_start(); //starting the session
        $id= $_SESSION['customerid']; //get customer
        $quantity1 = $_SESSION['quantity1']; //get quantity1
        $quantity2 = $_SESSION['quantity2'];
        $size1 = $_SESSION['size1'];
        $size2 = $_SESSION['size2'];
        $type1 = $_SESSION['type1'];
        $type2= $_SESSION['type2'] ;
        $sum=$_SESSION['sum'] ;
        $t= $_SESSION['timestamp'];
        $shipping= $_SESSION['shipping']  ;
        $tax=$_SESSION['tax']  ;
        $total=$_SESSION['total'];
        //received all session variables
        echo "<h3>Hello, Your Customer Id is $id</h3>";
        echo "<div><h2>Your Order Summary</h2></div>";
        echo "<div<h3>Order was Placed at $t</h3>";
        if($_SESSION['quantity1'] > 0){
            echo '<th><img src = "resources/adidas_ball.jpg" class="img-thumbnail"> </th>';
            echo "<th><p>Name: Adidas Soccer Ball<br>Size: $size1 <br> Type:$type1 </p></th>";
        }
        if($_SESSION['quantity2'] > 0){
          echo '<th><img src = "resources/nike_ball.jpg" class="img-thumbnail" height="290" width="290"></th>';
          echo "<th><p>Name: Nike Soccer Ball<br>Size: $size2 <br> Type:$type2 </p></th>";
        }
        ?>
      </tr>
    </thead>
  </table>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr><td>Total Quantity Ordered:</td><td id="totalQuantity"><?php $e=(intval($quantity1)+intval($quantity2)); echo "$e";?></td></tr>
        <tr><td>Cost:</td><td id="cost"><?php echo "$ $sum";?></td></tr>
        <tr><td>Tax (8.25%):</td><td id="tax"><?php echo "$ $tax";?></td></tr>
        <tr><td>Shipping / Handling Charges (1%):</td><td id="handling"><?php echo "$ $shipping";?></td></tr>
        <tr><td>Total Cost</td><td id="totalcost"><?php echo "$ $total";?></td></tr>
      </table>
    </div>
  </div>
</div>
<div align="center"><a href="index.php">Go back</a></div>
</html>
