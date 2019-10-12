<?php
include_once('connection.php');
@$to=$_POST['to'];
@$sub=$_POST['sub'];
@$msg=$_POST['msg'];
$file=$_FILES['file']['name'];
$tolen= strlen($to);

$id=$_SESSION['sid'];
if(@$_REQUEST['send'])
{


    if($to=="" || $sub=="" || $msg=="")
    {
        $err= "fill the related data first";
    }
    else if($tolen<6){
        $err="Invalid Username";
    }


    else
    {
        $d=mysqli_query($con,"SELECT * FROM userinfo where user_name='$to'");
        $row=mysqli_num_rows($d);
        if($row==1)
        {

            if($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/gif")
            {
                //write upload code
                $bool = mysqli_query($con,"INSERT INTO usermail (rec_id,sen_id,sub,msg,attachement,recDT) VALUES ('$to','$id','$sub','$msg','$file',sysdate())");

                mkdir("userDocuments/$to/");
                move_uploaded_file($_FILES["file"]["tmp_name"], "userDocuments/$to/" . $_FILES["file"]["name"]);
                if(!$bool)
                {

                    echo $err;

                }
                $err= "message sent...";
            }
            else
            {
                echo "Error !!, Only jpeg and gif image allowed";
            }

        }
        else
        {
            $sub=$sub."--"."msg failed";
            mysqli_query($con,"INSERT INTO usermail  ('mail_id', 'rec_id', 'sen_id', 'sub', 'msg', 'attachement', 'recDT') VALUES ('','$id','$id','$sub','$msg','$file',sysdate())");
            $err= "message failed...Invalid username/password combination";

        }
    }
}


if(@$_REQUEST['save'])
{
    if($sub=="" || $msg=="")
    {
        $err= "<font color='red'>fill subject and msg first</font>";
    }

    else
    {
        $query="INSERT INTO draft(user_id,sub,attach,msg,date) values('$id','$sub','$file','$msg',sysdate())";
        mysqli_query($con,$query);
        $err= "message saved...";
    }
}


?>
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
    <table width="506" border="1">
        <?php echo @$err; ?>
        <tr>
            <th width="213" height="35" scope="row">To</th>
            <td width="277">
                <input type="text" name="to" />	</td>
        </tr>
        <tr>
            <th height="36" scope="row">Cc</th>
            <td><input type="text" name="cc"/></td>
        </tr>
        <tr>
            <th height="36" scope="row">Subject</th>
            <td><input type="text" name="sub" /></td>
        </tr>
        <tr>
            <th height="36" scope="row">upload your file</th>
            <td><input type="file" name="file" id="file"/></td>
        </tr>
        <tr>
            <th height="52" scope="row">Msg</th>
            <td><textarea rows="8" cols="40" name="msg"></textarea></td>
        </tr>
        <tr>
            <th height="35" colspan="2" scope="row">
                <input type="submit" name="send" value="Send"/>
                <input type="submit" name="save" value="Save"/>
                <input type="reset" value="Cancel"/>	</th>
        </tr>
    </table>
</body>
</form>
</html>
