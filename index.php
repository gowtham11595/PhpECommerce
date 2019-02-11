<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>

function newCustClick(){
    document.getElementById("customerid").value="";
}

function custClick(){
  document.getElementById("customernewid").value="";
}

function resetAll(){
  alert("Order is cancelled");
  document.getElementById("totalQuantity").innerHTML = "";
  document.getElementById("cost").innerHTML = "";
  document.getElementById("tax").innerHTML = "";
  document.getElementById("handling").innerHTML = "";
  document.getElementById("totalcost").innerHTML = "";
}

function costCalculator(){

  var q1 = document.getElementById("quantity");
  var q2 = document.getElementById("quantity1");

  var totalQuan = 0;
  var price1 = 0, price2 = 0, price3 = 0;
  var tax1 = 0, tax2 = 0, tax3 = 0;
  var handling1 = 0, handling2 = 0, handling3 = 0;
  var total1 = 0, total2 = 0;
  var total = 0;
  if(q1==null && q2==null){
    return;
  } else if(q1.value != null && q1.value.length > 0){
      totalQuan = parseInt(q1.value);
      price1 = totalQuan * 35;
      tax1 = price1 * 0.0825;
      handling1 = price1 * 0.01;
      total1 = price1 + tax1 + handling1;
  }
  if(q2.value != null && q2.value.length > 0){
    totalQuan += parseInt(q2.value);
      price2 = parseInt(q2.value) * 30;
      tax2 = price2 * 0.0825;
      handling2 = price2 * 0.01;
      total2 = price2 + tax2 + handling2;
  }
  total = total1 + total2;
  price3 = price1 + price2;
  tax3 = tax1 + tax2;
  handling3 = handling1 + handling2;

  document.getElementById("totalQuantity").innerHTML = totalQuan;
  document.getElementById("cost").innerHTML = "$"+roundOff(price3);
  document.getElementById("tax").innerHTML = "$"+roundOff(tax3);
  document.getElementById("handling").innerHTML = "$"+roundOff(handling3);
  document.getElementById("totalcost").innerHTML = "$"+roundOff(total);
}

function roundOff(num){
  return Math.round(num * 100) / 100;
}


$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined
            $('#quantity').val(quantity + 1);
              costCalculator();

            // Increment

    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
              costCalculator();
            }
    });


    var quantitiy1=0;
       $('.quantity-right-plus1').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity1 = parseInt($('#quantity1').val());

            // If is not undefined
                $('#quantity1').val(quantity1 + 1);
                  costCalculator();


                // Increment

        });

         $('.quantity-left-minus1').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity1 = parseInt($('#quantity1').val());

            // If is not undefined
                // Increment
                if(quantity1>0){
                $('#quantity1').val(quantity1 - 1);
                  costCalculator();
                }
        });

});
</script>


</head>
<body>
<form action="test.php" method="POST">
<div class="container">
  <a href=""><img src="resources/YoSoccer.jpg"></a><a href=""><img src="resources/yosoccertitle.jpg" style="margin-left:15em"></a>
  <br>
  <h1>Catalog</h1>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><img src = "resources/adidas_ball.jpg" class="img-thumbnail"></th>
        <th><img src = "resources/nike_ball.jpg" class="img-thumbnail" height="290" width="290"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Name: <b>Adidas Soccer Ball</b></td>
        <td>Name: <b>Nike Soccer Ball</b></td>
      </tr>
      <tr>
        <td>Description: <b>An amazing Adidas soccer ball</b></td>
        <td>Description: <b>Very cool Nike soccer ball</b></td>
      </tr>
      <tr>
        <td>Cost: <b>$35</b></td>
        <td>Cost: <b>$30</b></td>
      </tr>
      <tr>
        <td>Select Size <select name="size1"><option value="Small">Small</option><option value="Medium">Medium</option><option value="Large">Large</option></select></td>
        <td>Select Size <select name="size2"><option value="Small">Small</option><option value="Medium">Medium</option><option value="Large">Large</option></select></td>
      </tr>
      <tr>
        <td>Ball Type <select name="type1"><option value="Turf Ball">Turf Ball</option><option value="Indoor Ball">Indoor Ball</option></select></td>
        <td>Ball Type <select name="type2"><option value="Indoor Ball">Indoor Ball</option><option value="Turf Ball">Turf Ball</option></select></td>
      </tr>
      <tr>
        <td>
            <div class="col-lg-2">
              <div class="input-group">
                Quantity:
                <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                </span>
          <input type="text" id="quantity" name="quantity" style="margin-right:20px" class="form-control input-number" value="0" min="0" max="100" width = "100%"/>
                <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
              </div>
            </div>
        </td>
        <td>
          <div class="col-lg-2">
                <div class="input-group">
                  Quantity:
                  <span class="input-group-btn">
                      <button type="button" class="quantity-left-minus1 btn btn-danger btn-number"  data-type="minus" data-field="">
                        <span class="glyphicon glyphicon-minus"></span>
                      </button>
                  </span>
        <input type="text" id="quantity1" name="quantity1" style="margin-right:20px" class="form-control input-number" value="0" min="0" max="100" width = "100%"/>
                  <span class="input-group-btn">
                      <button type="button" class="quantity-right-plus1 btn btn-success btn-number" data-type="plus" data-field="">
                          <span class="glyphicon glyphicon-plus"></span>
                      </button>
                  </span>
                </div>
              </div>
        </td>
      </tr>
    </tbody>
  </table>
<div class="row">
  <div class="col-md-6">
    <div align="center" style="color:#3d7e9a;"><b>Returning User?</b></div>
    <div class="form-group">
      <label for="text">Enter Customer Id:</label>
      <input type="text" class="form-control" id="customerid" name="customerid" placeholder="enter your customer id" onfocus="custClick()">
    </div>
    <div align="center" style="color:#3d7e9a;"><b>New User?</b></div>
    <div class="form-group">
      <!-- <label for="custid">Customer Id:</label>
      <input type="text" class="form-control" id="customernewid" name="customernewid" onfocus="newCustClick()" placeholder="enter a customer id"> -->
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="enter your name">
      <label for="zipcode">Zipcode (5 digit code):</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode" pattern="(\d{5}([\-]\d{4})?)" placeholder="Enter 5 digit zipcode">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button class="btn btn-danger" type="reset" onclick="resetAll()">Cancel</button>
  </div>

  <div class="col-md-6">
    <b>Overview</b>
    <table class="table table-bordered">
      <tr><td>Total Quantity:</td><td id="totalQuantity"></td></tr>
      <tr><td>Cost:</td><td id="cost"></td></tr>
      <tr><td>Tax (8.25%):</td><td id="tax"></td></tr>
      <tr><td>Shipping / Handling Charges (1%):</td><td id="handling"></td></tr>
      <tr><td>Total Cost</td><td id="totalcost"></td></tr>
    </table>
  </div>
</div>
</div>
  </form>
</body>
</html>
