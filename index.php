<?php session_start();
error_reporting(1);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mail Server Project</title>
<script language="JavaScript1.1">
		
		</script>
		<style>
			a:hover{color:#00FF66;}
			a{font-size:18px;margin-left:5%;}
			table,td{padding:5px;broder-radius:5px}
		</style>
</head>

<body>
<?php include('ads/header.php');?>
<table width="70%" border="1" align="center">
  <tr>
    <td height="135" colspan="2">
	<img src="slide image/titleimage.jpg" name="slide" border="0" width="100%" height="200"></td>
  </tr>
  <tr>
    <td height="38" colspan="2">
		<a href="index.php">HOME</a>
		<a href="index.php?chk=about">ABOUT US</a>
		<a href="index.php?chk=login">LOGIN</a>
		<a href="index.php?chk=registraion">REGISTER NOW!</a>
		<a href="index.php?chk=contact">OUR TEAM</a>	</td>

  </tr>
  <tr>
    <td height="613" valign="top" style="padding:10px">

	<?php
	@$chk=$_REQUEST['chk'];
	if($chk=="")
	{
	?>
	<h3 align="center">Mailing Server</h3>
	<P>
 Mailing server is programmed by which you can send emails to your friends, who are registered with that server.
It allows a user to transfer text and data like picture, video, mp3, etc. However, it has some limitations for the size of the attachment, but you can change it for your server and as per business needs.

In mailing server, a user can register herself/himself. After registration, they can login with their existing user id and password.

The mailing server allows the user to customize their profile.<BR>
Mailing server is also a very secure system. It provides you security as you needed your profile is protected with a password.
You can change the password when you feel insecure with the old password. There is also the password recovery system in case you forgot your password you can recover your profile by verifying your alternate email or phone number.
	<br>
	Some functions of this mailserver are:
    <pre>	
    Compose an email.
    Send an email
    Receive an email
    Saving an email in the form of draft
    Showing the detail of the received mail
    Saving the email ids in contact list
    Secured by password
    Recovery of the password
	</pre>
	</P>
	<?php
	}
	if($chk=="registraion")
	{
	include_once('regis.php');
	}
	if($chk=="login")
	{
	include_once('login.php');
	}

	if($chk=="about")
	{
	include_once('aboutus.php');
	}
	if($chk=="contact")
	{
	include_once('contactus.php');
	}
	if($chk=="7")
	{
	include_once('latestupdDisp.php');
	}
	if($chk=="about")
	{
	include_once('about.php');
	}
	
	
	?>	</td>
    
  </tr>
  <tr>
    <td height="47" colspan="2">
  </tr>
</table>
<?php include('ads/header.php');?>
</body>
</html>
