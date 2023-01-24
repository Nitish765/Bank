<?php  include 'connection.php'  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <style>
        *,::before,::after{margin: 0; box-sizing: border-box; font-family: sans-serif;}
        .container-1{
            display: flex;
            margin: 100px 400px;
            background-color: #fff;
            text-align: center;
            padding: 25px 9%;
            box-shadow: 5px 5px 20px black;
        }
        .container-1 form{text-align: center;}
        .container-1 form h1{color: #f00; font-size: 32px; line-height: 60px;}
        .container-1 form h2{font-size: 22px; line-height: 40px;}
        .container-1 form label{line-height: 50px;}
        .container-1 form input{display: block; line-height: 50px; width: 400px; padding: 2px 7px; font-size: 20px;}
        .container-1 form button{margin-top: 10px; display: inline-block; border: none;
             padding: 7px 15px; color: #fff; background: red; font-size: 15px; border-radius: 4px;}
        .container-1 .btnpay{display: block; float: right; margin-top: 30px; background-color: green;}
    </style>
</head>
<body>
    <div class="container-1">
        <form method="post" >
            <h1>Make Payment</h1>
            <h2>From</h2>
            <?php
                if(isset($_POST['btnverify1']))
                {
                   $sender_acc=$_POST['sender_acc'];
                   $a=$sender_acc;
               
                   $sql="select *from tblcustomer where Account_no='$sender_acc'";
                   $res=$con->query($sql);
                   if($res->num_rows>0)
                   {
                    while($row=$res->fetch_assoc())
                    {
             ?>
            <p>Customer: <?php echo $row['Name'] ?></p>
            <p>Account Number: <?php echo $row['Account_no'] ?></p>
            <?php }}
             $sender_acc=$a;
        } ?>
            <label><input type="text" name="sender_acc" placeholder="Account Number" value="<?php if(isset($_POST['btnverify1'])) echo $sender_acc ?>"></label> <button name="btnverify1" class="btnverify1">Verify</button>
            <label><input type="number" name="amount" placeholder="Enter Amount"></label>
            <h2>To</h2>
            <?php
                if(isset($_POST['btnverify2']))
                {
                   $receiver_acc=$_POST['receiver_acc'];
                   $a=$receiver_acc;
               
                   $sql="select *from tblcustomer where Account_no='$receiver_acc'";
                   $res=$con->query($sql);
                   if($res->num_rows>0)
                   {
                    while($row=$res->fetch_assoc())
                    {
             ?>
            <p >Customer: <?php echo $row['Name'] ?></p>
            <p>Account Number: <?php echo $row['Account_no'] ?></p>
            <?php }}
             $receiver_acc=$a;
        } ?>
            <lable><input type="text" name="receiver_acc" placeholder="Account Number" value="<?php if(isset($_POST['btnverify2'])) echo $receiver_acc ?>"></lable> <button name="btnverify2" class="btnverify2">Verify</button>
            <button name="btnpay" class="btnpay">Pay</button>
        </form>
    </div>
    <script>
        // document.querySelector(".btnverify1").addEventListener("click", (e)=>{
        //     e.preventDefault();
        // })
        // document.querySelector(".btnverify2").addEventListener("click", (e)=>{
        //     e.preventDefault();
        // })
        // document.querySelector(".btnpay").addEventListener("click", (e)=>{
        //     e.preventDefault();
        // })
    </script>
</body>
</html>
<?php  
if(isset($_POST['btnpay']))
{
    $sender_acc=$_POST['sender_acc'];
    $receiver_acc=$_POST['receiver_acc'];
    $amount=$_POST['amount'];
    $sql1="UPDATE tblcustomer set Balance=Balance-$amount where Account_no='$sender_acc'";;
    $sql2="UPDATE tblcustomer set Balance=Balance+$amount where Account_no='$receiver_acc'";
    $con->query($sql1);
    $con->query($sql2);
    echo $amount." is debited from Account Number ".$sender_acc." and credited to Account Number".$receiver_acc;
}
?>