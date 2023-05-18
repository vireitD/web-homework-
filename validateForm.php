<?php           //Li Ka Wa 22028345S
session_start();
include 'db.php';// take function and the connection from db.php
$store = $model = 0;
$fname = $lname = $email = $mobile = "";
$storeErr = $modelErr = $fnameErr = $lnameErr = $emailErr = $mobileErr = "";
$sucess = true;//use to check user input sucessfully or not


if($_POST['store'] == 0){//when user dont input store
$sucess = false;
$storeErr ="you should choice the store!";//set error message
$_SESSION['storeErr']= $storeErr;//save error message
}


if(empty($_POST['model'])){//when user dont input model
$sucess = false;
$modelErr="you should choice the model!";
$_SESSION['modelErr']= $modelErr;
} 


if(empty($_POST['fname'])){// when user dont input First name
$sucess = false;
$fnameErr="you should input First name!";
$_SESSION['fnameErr']= $fnameErr;
} 

else if(!preg_match("/[a-zA-Z \s]/",$_POST['fname'])){//when user input wrong First name format
$sucess = false;
$fnameErr="your First name format is wrong and it only accept english";
$_SESSION['fnameErr']= $fnameErr;
}


if(empty($_POST['lname'])){// when user dont input Last name
$sucess = false;
$lnameErr="you should input Last name!";
$_SESSION['lnameErr']= $lnameErr;
} 

else if(!preg_match("/[a-zA-Z \s]/",$_POST['lname'])){//when user input wrong Last name format
$sucess = false;
$lnameErr="your Last name format is wrong and it only accept english";
$_SESSION['lnameErr']= $lnameErr;
}


if(empty($_POST['email'])){//when user dont input email
$sucess = false;
$emailErr ="you should input email!";
$_SESSION['emailErr']= $emailErr;
} 

else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){//when user input wrong email format
$sucess = false;
$emailErr ="your email format is wrong!";
$_SESSION['emailErr']= $emailErr;
}


if(empty($_POST['mobile'])){//when user dont input mobile
$sucess = false;
$mobileErr = "you should input phone number!";
$_SESSION['mobileErr']= $mobileErr;
} 

else if(!preg_match("/[0-9]/",$_POST['mobile']) || strlen($_POST['mobile']) != 8){//when user input wrong mobile format
$sucess = false;
$mobileErr = "you should input like 12345678 and it only accept number!";
$_SESSION['mobileErr']= $mobileErr;
}
else {
$mobile2 = $_POST['mobile'];
$sqlcheck = "SELECT * FROM reservation WHERE mobile = '$mobile2' ";
$resultcheck = $conn->query($sqlcheck);
$row1 = $resultcheck->fetch_assoc();
	if(isset($row1["mobile"]) && $row1["mobile"] = $mobile2){
	$sucess = false;
	$mobileErr = "this phone number is already registered";
	$_SESSION['mobileErr']= $mobileErr;
	}
}




if($sucess){//when all checking is pass and insert to database
$store = $_POST['store'];
$model = $_POST['model'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$sql1= "INSERT INTO reservation (store, model, fname, lname, email, mobile) VALUES ('$store','$model','$fname'
,'$lname','$email','$mobile')";
$result1= $GLOBALS['conn']->query($sql1);
echo "your form is sucessfully!";
} else if(!$sucess){// keep user input when checking are not all pass
	$store = $_POST['store'];
	$_SESSION['store1']= $store;
	$model = $_POST['model'];
	$_SESSION['model1']= $model;
	$fname = $_POST['fname'];
	$_SESSION['fname1']= $fname;
	$lname = $_POST['lname'];
	$_SESSION['lname1']= $lname;
	$email = $_POST['email'];
	$_SESSION['email1']= $email;
	$mobile = $_POST['mobile'];
	$_SESSION['mobile1']= $mobile;
	header('Location: reserve.php');//go back to reserve and let user input form
}



?>
