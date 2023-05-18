 
<!DOCTYPE html>
<html lang="en">    <!--Li Ka Wa 22028345S-->
<head>
    <meta charset="utf-8" />
    <title>Reserve and Pick Up</title>
    <style>
    
.a {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
  
}
 .input1 {
	 
	 width: 100%;
	 border: 0;
	 border-bottom: 3px solid #9b9b9b;
	 outline: 0;
	 font-size: 1.3rem;
	 
	 padding: 7px 0;
	 background: transparent;
	 transition: border-color 0.2s;
}
 .input1::placeholder {
	 color: transparent;
}
 .input1:placeholder-shown ~ .label {
	 font-size: 1.3rem;
	 cursor: text;
	 top: 20px;
}
 .label {
	 position: absolute;
	 top: 0px;
	 display: block;
	 transition: 0.2s;
	 font-size: 1rem;
	 
}
 .input1:focus {
	 padding-bottom: 6px;
	 font-weight: 700;
	 border-width: 3px;
	 border-image: linear-gradient(to right, #11998e, #38ef7d);
	 border-image-slice: 1;
}
 .input1:focus ~ .label {
	position:absolute;
	 top: 0px;
	 display: block;
	 transition: 0.2s;
	 font-size: 1rem;
	 color: #11998e;
	
}
/* reset input */
 .input1:required, .input1:invalid {
	 box-shadow: none;
}
/* demo */
 body {
	 font-family: 'Poppins', sans-serif;
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
	 
	 font-size: 1.3rem;
	 
}
 .radio {
	 margin: 0.5rem;
}
 .radio input[type="radio"] {
	 position: absolute;
	 opacity: 0;
}
 .radio input[type="radio"] + .radio-label:before {
	 content: '';
	 background: #f4f4f4;
	 border-radius: 100%;
	 border: 1px solid #b4b4b4;
	 display: inline-block;
	 width: 0.8em;
	 height: 0.8em;
	 position: relative;
	 top: 0.1em;
	 margin-right: 1em;
	 vertical-align: top;
	 cursor: pointer;
	 text-align: center;
	 transition: all 250ms ease;
}
 .radio input[type="radio"]:checked + .radio-label:before {
	 background-color: #11998e;
	 box-shadow: inset 0 0 0 4px #f4f4f4;
}
 .radio input[type="radio"]:focus + .radio-label:before {
	 outline: none;
	 border-color: #11998e;
}
 

 .radio input[type="radio"] + .radio-label:empty:before {
	 margin-right: 0;
}
 .button{
    bottom:-20px;
    border: none;
    outline: none;
	width: 50%;
    height: 30px;
    font-size: 22px;
    border-radius: 40px;
    text-align: center;
    box-shadow: 0 6px 20px -5px rgba(0,0,0,0.4);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}
.button:hover {
transition: 0.2s;
color: #11998e;
}
select {
	 height: 30px;
	 border: 1;
	 width: 100%;
	 cursor: pointer;
	 border-radius: 5px;
	 font-size:1em;
}
 select:hover {
 transition: 0.2s;
 color: #11998e;
 }

 .error {
	  color: #de3737
 }
    </style>
</head>
<body>
<?php
session_start();//use to keep the user input value
?>
<form method="post" action="validateForm.php">
<h1>SEHS4517 Reserve and Pick Up</h1>
<img width="200" height="250" src="images.png"/><?php date_default_timezone_set("Asia/Hong_Kong"); echo "Today is " . date("Y-m-d h:i:s a");?>
<p>select store:</p>

<select name="store" id="store">
	<option value="0"></option>
    <option value="1" <?php if (isset( $_SESSION['store1'] ) && $_SESSION['store1'] == 1) {echo "selected";} ?> >IFC Mall</option>
    <option value="2" <?php if (isset( $_SESSION['store1'] ) && $_SESSION['store1'] == 2) {echo "selected";} ?> >Festival Walk</option>
    <option value="3" <?php if (isset( $_SESSION['store1'] ) && $_SESSION['store1'] == 3) {echo "selected";} ?> >Hysan Place</option>
    <option value="4" <?php if (isset( $_SESSION['store1'] ) && $_SESSION['store1'] == 4) {echo "selected";} ?> >APM</option>
</select>
<div class="error"><?php if(isset( $_SESSION['storeErr'] )) {echo $_SESSION['storeErr'];}?></div>
<p>select model:</p>
<div class="radio">
   <input type="radio" name="model" id="radio-1" value="1" <?php if (isset( $_SESSION['model1'] ) && $_SESSION['model1'] == 1) {echo "checked";} ?> />
   <label for="radio-1" class="radio-label">16GB</label>
   </div>
   <div class="radio">
   <input type="radio" name="model" id="radio-2" value="2" <?php if(isset( $_SESSION['model1'] ) && $_SESSION['model1'] == 2) {echo "checked";} ?> />
   <label for="radio-2" class="radio-label">32GB</label>
   </div>
   <div class="radio">
   <input type="radio" name="model" id="radio-3" value="3" <?php if(isset( $_SESSION['model1'] ) && $_SESSION['model1'] == 3) {echo "checked";} ?> />
   <label for="radio-3" class="radio-label">64GB</label>
   </div>
   <div class="radio">
   <input type="radio" name="model" id="radio-4" value="4" <?php if(isset( $_SESSION['model1'] ) && $_SESSION['model1'] == 4) {echo "checked";} ?> />
   <label for="radio-4" class="radio-label">128GB</label>
   </div>
   <div class="error"><?php if(isset( $_SESSION['modelErr'] )) {echo $_SESSION['modelErr'];}?></div>
<p>Enter your contect:</p>
  
    <div class="a">
    <input class="input1" type="text" id="fname" name="fname" maxlength="20" placeholder="First Name:" value="<?php if(isset( $_SESSION['fname1'] )) {echo $_SESSION['fname1'];} ?>"/>
	<label for="fname" class="label">First Name:</label>
    </div>
	<div class="error"><?php if(isset( $_SESSION['fnameErr'] )) {echo $_SESSION['fnameErr'];}?></div>
	
	<div class="a">
    <input class="input1"type="text" name="lname"  maxlength="20" placeholder="Last Name:" value="<?php if(isset( $_SESSION['lname1'] )) {echo $_SESSION['lname1'];} ?>"/></br>
	<label for="lname" class="label">Last Name:</label>
	</div>
	<div class="error"><?php if(isset( $_SESSION['lnameErr'] )) {echo $_SESSION['lnameErr'];}?></div>
	
	<div class="a">
    <input class="input1" type="text" name="email" placeholder="email:" value="<?php if(isset( $_SESSION['email1'] )) {echo $_SESSION['email1'];} ?>"/></br>
	<label for="email" class="label">email:</label>
	</div>
	<div class="error"><?php if(isset( $_SESSION['emailErr'] )) {echo $_SESSION['emailErr'];}?></div>
	
	<div class="a">
    <input class="input1" type="text" name="mobile"  maxlength="8" placeholder="mobile:" value="<?php if(isset( $_SESSION['mobile1'] )) {echo $_SESSION['mobile1'];} ?>"/></br>
	<label for="mobile" class="label">mobile:</label>
    </div>
	<div class="error"><?php if(isset( $_SESSION['mobileErr'] )) {echo $_SESSION['mobileErr'];}?></div>
<input class="button" type="reset" value="reset" onClick="window.location.reload();"><input class="button" type="submit" name="submit" value="submit">
</form>
<script> function reset(){// use to reload the page so that it can reset the input
window.location.reload();
}
</script>
<?php session_destroy();?>

</body>
</html>