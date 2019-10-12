<?php
error_reporting(1);
$sid=$_SESSION['sid'];
include_once('connection.php');

$r=mysqli_query($con,"select * from userinfo where user_name='$sid'");
echo "<table border='1' align='center'>";
$row=mysqli_fetch_object($r);
$p=$row->password;
$m=$row->mobile;
$e=$row->email;
echo "<tr height='40'>";
echo "<td>Your regId :</td>";
echo "<td>".$row->user_jd."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your username :</td>";
echo "<td>".$row->user_name."</td>";
echo "</tr>";


echo "<tr height='40'>";
echo "<td>Your Mobile :</td>";
echo "<td>$m</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Email </td>";
echo "<td>$e</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your gender is :</td>";
echo "<td>".$row->gender."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your hobbies are :</td>";
echo "<td>".$row->hobbies."</td>";
echo "</tr>";

echo "<tr height='40'>";
echo "<td>Your DOB is :</td>";
echo "<td>".$row->dob."</td>";
echo "</tr>";
 

echo "<tr height='40'>";
echo "<td>Your Pics  :</td>";
echo "<td><img alt='image not upload' src='userImages/$id/$file' height='80' width='80'/></td>";
echo "</tr>";
echo "</table>";
?>
