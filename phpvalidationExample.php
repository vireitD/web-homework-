<?php

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";

if (empty($_POST["name"])) {
    $nameErr = "Name is required!";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $emailErr = "Email is required!";
}else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format!";
    }
}

if (empty($_POST["gender"])) {
    $genderErr = "Gender is required!";
} else {
    $gender = $_POST["gender"];
}

?>

<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <h2>PHP Form Validation Example 1.3</h2>
        <p><span class="error">* required field.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name: <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
            E-mail: <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
            Gender: 
            <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender =="female") {echo "checked";}?> >Female
            <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender =="male") {echo "checked";}?> >Male
            <span class="error">* <?php echo $genderErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="submit">
        </form>
    </body>
</html>