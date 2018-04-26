<?php

    include "connect.php";

    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $em = $_POST["email"];
    $sta = $_POST["status"];

    $sql="INSERT INTO `login` (`username`, `password`, `email`, `status`) VALUE ('$user','$pass','$em','$sta')";
    $query=mysqli_query($objCon,$sql);

    $strSQL2 = "INSERT INTO `profile` (`username`) VALUE ('$user') ";
	$objQuery2 = mysqli_query($objCon,$strSQL2);
    $objResult1 = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC);

    if($objResult["status"] != "ADMIN")
			{
				header("location:login.php");
			}


?>