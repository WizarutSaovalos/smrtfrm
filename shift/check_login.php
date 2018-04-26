<?php
	session_start();
	include "connect.php";


	$strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST['user'])."' 
	and password = '".mysqli_real_escape_string($objCon,$_POST['pass'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else if($objResult["status"] == "ปัจจัย")
			{

			}
			else
			{
				header("location:indexag.php");
			}
	}
	mysqli_close($objCon);
?>