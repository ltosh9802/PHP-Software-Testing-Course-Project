<?php
include_once('connection.php');
error_reporting(1);

if($_POST['reg'])
{
	$y=$_POST['y'];
$m=$_POST['m'];
$d=$_POST['d'];
$dob=$y."-".$m."-".$d;
$ch=$_POST['ch'];
$hobbies=implode(",",$ch);
$imgpath=$_FILES['file']['name'];
$un=$_POST['un'];
$pwd1=$_POST['pwd'];
$mob1=$_POST['mob'];
$usernamelength= strlen($un);
$passwordlength= strlen($pwd1);
$mobilelength= strlen($mob1);

	
	if($_POST['un']=="" || $_POST['pwd']=="" || $_POST['mob']=="" || $_POST['eid']=="" )
	{
	$err="Please enter all required fields";
	}
	else if($usernamelength<6){
					$err="Invalid Username";
			}
			else if($passwordlength<6){
					$err="Invalid password";
			}
			else if($mobilelength!=10){
					$err="Invalid mobile";
			}
			
	else
	{
	$r=	mysqli_query($con,"SELECT * FROM userinfo WHERE (user_name='{$un}')");
	$t=mysqli_num_rows($r);
		if($t==1)
		{
		$err="user aleready exists choose another";
		}
		else
		{

		$bool = mysqli_query($con,"INSERT INTO userinfo (user_name,password,mobile,email,gender,hobbies,dob,image) VALUES('{$_POST['un']}','{$_POST['pwd']}','{$_POST['mob']}','{$_POST['eid']}','{$_POST['gen']}','$hobbies','$dob','$imgpath')");
		//m1ysqli_query($con,"INSERT INTO userinfo (user_jd,user_name,password,mobile,email,gender,hobbies,dob,image) VALUES(,'{$_POST['un']}','{$_POST['pwd']}','{$_POST['mob']}','{$_POST['eid']}','{$_POST['gen']}','$hobbies','$dob','$imgpath')");		
		if(!$bool)
		{
			
			echo $err;
		}
		mkdir("userImages/$un");
		move_uploaded_file($_FILES["file"]["tmp_name"],"userImages/$un/".$_FILES["file"]["name"]);
		$_SESSION['sname']=$_POST['un'];
		//header('location:index.php?chk=5');
		echo "<script>window.location='index.php?chk=5'</script>";
		
		}
	}
}

?>
<style>
	table{padding:5px;border-radius:5px}
	td{padding:10px}
</style>
<form method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center">
  <font color="#FF0000"><?php echo $err; ?></font>
  
  <tr>
    <td width="204" height="47">Enter Your User Name (*) </td>
    <td width="218"><input type="text" name="un"/></td>
  </tr>
  <tr>
    <td height="39">Enter Your Password (*)</td>
    <td><input type="password" name="pwd"/></td>
  </tr>
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
    <td height="30">I accept term & condition</td>
    <td>
	<input type="checkbox" name="checklist"/>
	</td>
  </tr>
  <tr>
    <td align="center" colspan="2">
	<input type="submit" name="reg" value="Register"/>
	<input type="reset"  value="Reset"/>
	</td>
  </tr>
</table>
</form>