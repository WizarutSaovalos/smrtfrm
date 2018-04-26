<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	include "connect.php";

	$strSQL = "SELECT * FROM login WHERE username = '".$_SESSION['username']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    
    $strSQL1 = "SELECT * FROM profile WHERE username = '".$_SESSION['username']."' ";
	$objQuery1 = mysqli_query($objCon,$strSQL1);
    $objResult1 = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC);

?>
<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<form name="form1" method="post" action="save_profile.php">
  Edit Profile! <br>
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td> &nbsp;Username</td>
        <td>
          <?php echo $objResult["username"];?>
        </td>
      </tr>
      
      <tr>
        <td>&nbsp;ชื่อ</td>
        <td><input name="txtName" type="text" id="txtName" value="<?php echo $objResult1["name"];?>"></td>
      </tr>
      <tr>
        <td> &nbsp;นามสกุล</td>
        <td><input name="surname" type="text" id="surname" value="<?php echo $objResult1["surname"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;อาชีพ</td>
        <td>
        <input name="career" type="text" id="career" value="<?php echo $objResult1["career"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;อายุ</td>
        <td>
        <input name="age" type="text" id="age" value="<?php echo $objResult1["age"];?>">
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="Save">
</form>
</body>
</html>
<?php
	mysqli_close($objCon);
?>