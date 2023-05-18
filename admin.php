<!DOCTYPE html>
<html lang="en">   <!--Li Ka Wa 22028345S -->
<head> 
    <meta charset="utf-8" />     
    <title>admin</title>
    <style>

.form{
    height:600px;
    width:500px;
    background-color: rgba(255,255,255,0.1);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 13px;
    padding: 50px 35px;
    font-family: 'Poppins',sans-serif;
}

.form h1{
    text-align: center;
    font-size: 45px;
    font-weight: 500;
    line-height: 50px;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}

.input1{
    display: block;
    height: 40px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 5px;
   
    margin-top: 8px;
    font-size: 16px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
.Login{
    margin-top: 50px;
    width: 100%;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}

table{
    border-collapse: collapse;
    width: 100%;
    text-align: left;
    font-family: 'Poppins',sans-serif;
}

tr:nth-child(even){background-color: #f2f2f2}

.error {
	  color: #de3737
 }
    </style>    
</head>

<body>
<?php
session_start();
include 'db.php';// take function and the connection from db.php
$form = true;// $form is use to close the login form
$_SESSION['form'] = $form;
$user = "";//give $user a default value
$password = "";//give $password a default value
$userErr="";
if(isset($_POST['Login'])){//check when user click the submit button
    if($_POST['user'] == "admin" && $_POST['password'] == "pass"){// when the login successful
    $form = false;// close login form
    $_SESSION['form'] = $form;
    Search();// function Search in db.php
    database();// function database() in db.php
     
     



    } else if(!empty($_POST['user']) && !empty($_POST['password'])){// when user input wrong username or password
    $user = $_POST['user'];
    $password = $_POST['password'];
    $userErr ="you should input correct username and password!";
    $_SESSION['userErr']= $userErr;
   
    } else {//when the value is null after submit
    $userErr ="please input uesrname and password!";
    $_SESSION['userErr']= $userErr;
       
    }
}


if($_SESSION['form'] == true){// when $form is true the form will show, when $form is false the form will close
?>

<form class="form" method="post"> 
    <h1>SEHS4517 Admin Login</h1>
<label for="user">Username:</label>
<input class="input1" type="text" id="user"  name="user" value="<?php echo $user;?>"placeholder="please enter username"/>
<label for="password">Password:</label>
<input class="input1" type="password" id="password" name="password"  value="<?php echo $password;?>" placeholder="please enter password"/>
<input class="input1" type="submit" class="Login" name="Login" value="Login" />
<div class="error"><?php if(isset( $_SESSION['userErr'] )) {echo $_SESSION['userErr'];}?></div>
</from>

<?php
}
?>

</body>
</html>