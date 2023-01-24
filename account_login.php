<?php  include 'connection.php'  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer_login</title>
    <style>
        *,::before,::after{margin: 0; box-sizing: border-box;}
        body{font-family: sans-serif;}
        .container-1 form{margin: 100px 400px; padding: 50px 160px;   box-shadow: 5px 6px 25px black;}
        .container-1 h1{font-size: 32px; font-family: sans-serif; line-height: 60px;}
        .container-1 label{font-size: 17px; line-height: 30px; margin-top: 20px;}
        .container-1 label input{ display: block; width: 300px; line-height: 35px; font-size: 16px;}
        .container-1 button{padding: 8px 18px; color: #fff; background: #00f; border: none;
                   position: relative; left: 120px; top: 7px; border-radius: 5px;}
    </style>
</head>
<body>
    <div class="container-1">
          <form method="post">
            <h1>Login To Your Account</h1>
            <label>Enter Userid or Account Number <input type="text" name="userid"></label>
            <label>Enter Password <input type="password" name="pass"></label>
            <button name="btnlogin">Login</button>
          </form>
    </div>
</body>
</html>
<?php  
if(isset($_POST['btnlogin']))
{
    session_start();
    $u=$_POST['userid'];
    $p=$_POST['pass'];

    $sql="select *from tblcustomer";
    $res=$con->query($sql);
    if($res->num_rows>0)
    {
        while($row=$res->fetch_assoc())
        {
            if($u==$row['Account_no'] && $p==$row['Password'])
            {
                $_SESSION['Name']=$row['Name'];
                header("location:net_banking.php");
            }
        }
    }
}
?>