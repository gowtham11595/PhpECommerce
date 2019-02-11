<?php
//error supression and connection to database
$mysqli = @ new mysqli('student-db.cse.unt.edu', 'gk0157', 'gk0157', 'gk0157');

if (mysqli_connect_error())
{
	echo '<script>alert("Error: Could not connect to database. Please try again later.");</script>';
	//exit();
}

$mysqli->select_db("gk0157")or die("<p>Unable to select the database.</p>"
        . "<p>Error code " . mysqli_errno($mysqli)
				. ": " . mysqli_error($mysqli)) . "</p>";

//echo "<script>alert('Connection Successful');</script>";
$id="";
$bool = false;
//POST method
if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $customerId=$_POST['customerid'];  //get id of login customer
    $customerNewId = $_POST['customernewid']; //get id of new customer id
    //echo "<br> $customerId - $customerNewId";
		$isFirst = false;
     if($customerId!=null){
			 $isFirst = true;
       $id = $customerId;
       $sql="select `id` from `customers` where `id` = '$id'"; //retrieve id from customers table
       if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_array($result)){
             $bool = true; //found the customer id from the database
              break;
           }
        }
      }
     }
		 //if the customer id is not found in database
		 if($isFirst == true && $bool == false){
			echo "<script>alert('Customer Id does not exist!! please check'); window.location='index.php'; </script>";
			//header("Location:index.php");
		} else {
			if($isFirst == false) {
			$zipcode = $_POST['zipcode'];
			$name = $_POST['name'];
			$name  =  strtolower($name);
			$name = ucwords($name);  //changing first character to capitals and other characters to small
			if (preg_match('#[0-9]{5}#', $zipcode)) //zipcode with only 5 digits only
			 $bool = true;
			else {
					$bool = false;
					echo "<script>alert('Enter correct zipcode of 5 characters');</script>";
					return;
			 }  //insertion to customers table as new customer has come for regist
			 $sql = "INSERT INTO `customers`(`name`,`zipcode`) VALUES ('$name',$zipcode)";
			if($mysqli->query($sql) === FALSE)
			{
				echo "<script> alert('Customer ID already exists, Choose another');</script>";
				return;
			}
		}
			 $quantity1 = $_POST['quantity'];
			 $quantity2 = $_POST['quantity1'];
			 $type1 = $_POST['type1'];
			 $type2 = $_POST['type2'];
			 $size1 = $_POST['size1'];
			 $size2 = $_POST['size2'];

			 $t=date("m-d-Y H:i:s",time()); //get current timestamp
			 //get id from customers
			 $sql="select `id` from `customers` where `name` = '$name' and `zipcode` = $zipcode";
			 $retrievedCustId = "";
			 if($result = mysqli_query($mysqli, $sql)){
				if(mysqli_num_rows($result) > 0){
					 while($row = mysqli_fetch_array($result)){
						 $id = $row['0'];
						 echo "retrieved = $retrievedCustId";
							break;
					 }
				}
			}

			 if($quantity1 !=null && $quantity1 > 0){
				 //insert to orders
				 $sql = "INSERT INTO `orders` (`customerid`, `name`, `size`, `type`,`quantity`,`timestamp`) VALUES ('$id','Adidas Soccer Ball','$size1','$type1','$quantity1','$t')";
				 if($mysqli->query($sql) === FALSE)
				 {
					 echo "<script>alert('Error')</script>";
					 return;
				 }
			 }
			 if($quantity2 !=null && $quantity2 > 0){
				 //insert to orders
				 $sql = "INSERT INTO `orders` (`customerid`, `name`, `size`, `type`,`quantity`,`timestamp`) VALUES ('$id','Nike Soccer Ball','$size2','$type2','$quantity2','$t')";
				 if($mysqli->query($sql) === FALSE)
				 {
					 echo "<script>alert('Error')</script>";
					 return;
				 }
			 }

				 $sum = 0;
				 if($quantity1!=null && $quantity1 > 0){
					 $sum = $quantity1 * 35;
				 }
				 if($quantity2!=null && $quantity2 > 0){
					 $sum = $sum + $quantity2 * 30;
				 }
				 define("taxValue",0.0825);
				 define("shippingValue",0.01);
				 //echo "sum = $sum";
				 if($sum > 0){
					 $tax = $sum * taxValue;
					 $shipping = $sum * shippingValue;
					 $total = $sum + $shipping + $tax;
				 } else {
					 echo "<script>alert('Please increase the quantity');</script>";
				 }


				 session_start();
					$_SESSION['customerid'] = $id;
					$_SESSION['quantity1'] = $quantity1;
					$_SESSION['quantity2'] = $quantity2;
					$_SESSION['size1'] = $size1;
					$_SESSION['size2'] = $size2;
					$_SESSION['type1']  =$type1;
					$_SESSION['type2']  =$type2;
					$_SESSION['sum']  =$sum;
					$_SESSION['timestamp']  =$t;
					$_SESSION['shipping']  =$shipping;
					$_SESSION['tax']  =$tax;
					$_SESSION['total']  =$total;
				 header("Location:finals.php"); // Navigate to final page
		}


      if($customerNewId!=null){
        $id = $customerNewId;
        $zipcode = $_POST['zipcode'];
        $name = $_POST['name'];
        $name  =  strtolower($name);
        $name = ucwords($name);  // first letter capital and other characters small
        if (preg_match('#[0-9]{5}#', $zipcode))
	       $bool = true;
        else {
            $bool = false;
            echo "<script>alert('Enter correct zipcode of 5 characters');</script>";
            return;
         }
				 //insert to customers table with new details of customer
         $sql = "INSERT INTO `customers` VALUES ('$name',$zipcode)";
        if($mysqli->query($sql) === FALSE)
        {    //customer id already exists
          echo "<script> alert('Customer ID aleady exists, Choose another');</script>";
          return;
        }
      }

  }

$mysqli->close();
exit;
?>
