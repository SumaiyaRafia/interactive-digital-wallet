<?php 
	require 'dbInsert.php';
	$category = $phone = $amount = "";
	$isValid = true;
	$categoryErr = $phoneErr = $amountErr = "";
	$successfulMessage = $errorMessage = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$category = $_POST['category'];
    	$phone = $_POST['phone'];
    	$amount = $_POST['amount'];
    	
    	 
    	 if(empty($category)) {
           $categoryErr = "REQUIRED!";
           $isValid = false;
    	 }
    	
    	 
    	 if(empty($phone)) {
           $phoneErr = "REQUIRED!";
           $isValid = false;
    	 }
        
        if(empty($amount)) {
           $amountErr = "REQUIRED!";
           $isValid = false;
    	 }

        	if($isValid) {
			$category = test_input($category);
			$phone = test_input($phone);
			$amount = test_input($amount);

			$response = register($category,$phone,$amount);
			if($response) {
				$successfulMessage = "Successfully saved.";
			}
			else {
				$errorMessage = "Error while saving.";
			}
		}
	}
	function write($content) {
			$resource = fopen(filepath, "a");
			$fw = fwrite($resource, $content . "\n");
			fclose($resource);
			return $fw;
	}
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}




?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" name= "DwalletForm">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>

	<h1>Page1 [Home]</h1>
	<h2>Digital Wallet</h2>

	<br>

	<p>1-<a href="home.php">Home</a></p>
	<p>2- <a href="trans.php">Transaction History</a></p>

    <br>
    
    <h2>Fund Transfer</h2>

    

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	<label for="category">Select Catagory:</label>
		<select id="category" name="category">
			<option value="mobile">Mobile Recharge</option>
			<option value="send">Send Money</option>
			<option value="pay">Merchant Pay</option>
			<span style="color: red;" id="$categoryErr"><?php echo $categoryErr; ?></span>
		</select>

		<br><br>


		<label for="phone">To:</label>
		<input type="tel" id="phone">
		<span style="color: red;" id="$phoneErr"><?php echo $phoneErr; ?></span>

		<br><br>

        <label for="amount">Amount:</label>
		<input type="number"  id="amount" min="0.00" max="100000.00" step="0.01" / id="amount">
		<span style="color: red;" id="$amountErr"><?php echo $amountErr; ?></span>

		<br><br>

		<input type="submit" name="submit" value="Submit">


    <p style="color:green;"><?php echo $successfulMessage; ?></p>
	<p style="color:red;"><?php echo $errorMessage; ?></p>

	<br>



	<script>
		function isValid(){
			var flag = true;
			var categoryErr = document.getElementById("categoryErrr");
			var phoneErr = document.getElementById("phoneErr");
			var amountErr = document.getElementById("amountErr");


            var category = document.forms["DwalletForm"]["category"].value;
            var phone = document.forms["DwalletForm"]["phone"].value;
            var amount = document.forms["DwalletForm"]["amount"].value;
    

            categoryErr.innerHTML = "" ;
            phoneErr.innerHTML = "" ;
            amountErr.innerHTML = "" ;


           if(category === ""){
           	flag = false;
           	categoryErr.innerHTML = "REQUIRED!" ;
           }
           if(phone === ""){
           	flag = false;
           	phoneErr.innerHTML = "REQUIRED!" ;
           }

           if(amount === ""){
           	flag = false;
           	amountErr.innerHTML = "REQUIRED!" ;
           }
          

         return flag;

		}

	</script>


</body>
</html>