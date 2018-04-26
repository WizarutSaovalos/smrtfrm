<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}

    include "connect.php";
    
	$strSQL = "UPDATE profile SET surname = '".trim($_POST['surname'])."' 
	,name = '".trim($_POST['txtName'])."',career = '".trim($_POST['career'])."',age = '".trim($_POST['age'])."' WHERE username = '".$_SESSION["username"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	
	echo "Save Completed!<br>";		
	
	if($_SESSION["status"] == "ADMIN")
	{
		echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
	}
	else
	{
		echo "<br> Go to <a href='user_page.php'>User page</a>";
	}
	
	mysqli_close($objCon);
?>