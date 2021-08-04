<?php
if($_SERVER['REQUEST_METHOD']==="POST"){

	$catagory= $_POST['catagory'];
	$phone= $_POST['phone'];
	$amount= $_POST['amount'];

	if(empty($catagory)){
		echo "Please fill up the fields";
	}
	else{
		echo "Succrssfully saved!";
	}

	if(empty($phone)){
		echo "Please fill up the fields";
	}
	else{
		echo "Succrssfully saved!";
	}

	if(empty($amount)){
		echo "Please fill up the fields";
	}
	else{
		echo "Succrssfully saved!";
	}

}
?>