<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposite & Withrawl</title>
    <style>
        *,::before,::after{
            margin: 0;
            box-sizing: border-box;
        }
        body{font-family: sans-serif; color: #000; font-size: 17px; text-align: center;}
        label{display: inline-block;}
        a{text-decoration: none;}
        
        .container-1{display: flex; margin: 110px 500px;}
        .container-1 form{background: #fff; box-shadow: 5px 5px 20px black; padding: 50px 50px; text-align: center;}
        .container-1 form h1{font-size: 35px; line-height: 60px;}
        .container-1 form h3{font-size: 16px; line-height: 32px;}
        .container-1 form input{display: block; line-height: 40px; margin-top: 5px;
             width: 400px; padding: 1px 7px; font-size: 17px;}
        .container-1 button{color: #fff;padding: 6px 17px; border: none; border-radius: 2px; background: red; margin-top: 10px;}
    </style>
</head>
<body>
    <div class="container-1">
        <form action="#" method="post">
            <h1>Deposite & Withdrawl</h1>
            <?php  
               if(isset($_POST['verify']))
               {
                $acc=$_POST['account'];
                $sql="select *from tblcustomer where Account_no='$acc'";
                $res=$con->query($sql);
                if($res->num_rows>0)
                {
                    while($row=$res->fetch_assoc())
                    {
            ?>
             <h3>Name: <?php echo $row['Name']?></h3>
             <h3>Account Number: <?php echo $row['Account_no']?></h3> <?php }}} ?>
            <input type="text" name="account" placeholder="Enter account Number" value="<?php if(isset($_POST['verify'])) echo $acc; ?>"> 
            <button name="verify">Verify</button>
            <input type="number" name="amount" placeholder="Enter Amount">
            <button name="btndeposite">Deposite</button> <button name="btnwithdraw">Withdraw</button>
        </form>
    </div>
</body>
</html>
<?php 
if(isset($_POST['btndeposite']))
{
    $acc=$_POST['account'];
    $amount=$_POST['amount'];   
    $sql="UPDATE tblcustomer SET Balance=Balance+$amount where Account_no='$acc'";
    if($con->query($sql))
    {
       echo $amount." "."credited into account number ".$acc; 
    }
    else{
        echo "error";
    }
}
else if(isset($_POST['btnwithdraw']))
{
    $acc=$_POST['account'];
    $amount=$_POST['amount'];
    $sql="UPDATE tblcustomer SET Balance=Balance-$amount where Account_no='$acc'";
    if($con->query($sql))
    {
       echo $amount." "."debited from account number ".$acc; 
    }
    else{
        echo "error";
    }
}
?>