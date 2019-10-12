<?php
include_once('connection.php');
error_reporting(1);
$sid=$_SESSION['sid'];

if($_POST['reg'])
{
	$y=$_POST['y'];
$m=$_POST['m'];
$d=$_POST['d'];
$dob=$y."-".$m."-".$d;
$ch=$_POST['ch'];
$hobbies=implode(",",$ch);
$imgpath=$_FILES['file']['name'];
$un=$sid;
$pwd1=$_POST['pwd'];
$mob1=$_POST['mob'];
$imgpath=$_FILES['file']['name'];
$usernamelength= strlen($un);
$passwordlength= strlen($pwd1);
$mobilelength= strlen($mob1);

	
	if($_POST['mob']=="" || $_POST['eid']=="" )
	{
	$err="Please enter all required fields";
	}
	else if($mobilelength!=10){
		$err="Invalid mobile";
	}
			
	else
	{
	    
		 $bool=mysqli_query($con,"UPDATE userinfo SET mobile='{$_POST['mob']}',email='{$_POST['eid']}',gender='{$_POST['gen']}', image='$imgpath' WHERE user_name='{$sid}'");
		if(!$bool)
		{	
			$err="Changes unsucessful";
		}
		else{
			mkdir("userImages/$un");
		move_uploaded_file($_FILES["file"]["tmp_name"],"userImages/$un/".$_FILES["file"]["name"]);
		
	    $err="Changes successful";
		}
		 
		
	}
}

echo "Your Pics  :";
echo "<img alt='image not upload' align='center' src='userImages/$id/$file' height='80' width='80'/>";
?>

<body>
<head>
	<style>
	input[type=text]
	{
	width:200px;
	height:35px;
	}
	</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center">
  <font color="#FF0000"><?php echo $err; ?></font>
  
  <tr>
    <td height="47">Enter Your Mobile (*)</td>
    <td><input type="text" name="mob"/></td>
  </tr>
  <tr>
    <td height="39">Enter Your Email (*)</td>
    <td><input type="email" name="eid"/></td>
  </tr>
  <tr>
    <td height="33">Select Your Gender </td>
    <td>
		Male<input type="radio" name="gen" value="m"/>
		Female<input type="radio" name="gen" value="f"/>
	</td>
  </tr>
  <tr>
    <td height="41">Lunch preference </td>
    <td>
		Canteen (default)<input type="checkbox" name="ch[]" value="cricket"/>
		Tiffin<input type="checkbox" name="ch[]" value="football"/>
		Not Applicable<input type="checkbox" name="ch[]" value="reading"/>
	</td>
  </tr>
  <tr>
    <td height="38">Select Your DOB </td>
    <td>
		<select name="y">
			<option value="">Year</option>
			<?php
			for($i=1900;$i<=2013;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		<select name="m">
			<option value="">Month</option>
			<?php
			for($i=1;$i<=12;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
		<select name="d">
			<option value="">Date</option>
			<?php
			for($i=1;$i<=31;$i++)
			{
			echo "<option value='$i'>$i</option>";
			}
			?>
		</select>
	</td>
  </tr>
  <tr>
    <td height="55">Upload Your Pics</td>
    <td>
	<input type="file" name="file"/>
	</td>
  </tr> 
  <tr>
    <td align="center" colspan="2">
	<input type="submit" name="reg" value="Apply Changes"/>
	<input type="reset"  value="Reset"/>
	</td>
  </tr>
  
</table>

</body>
</form>
</html>