<?php   
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>
    <style>
        *,::before,::after{margin: 0; box-sizing: border-box;}
        body{font-family: sans-serif;}
        .container-1{margin: 20px 38%;}
        .container-1 label{text-align: center; font-size: 16px; line-height: 20px;}
        .container-1 select{padding: 10px 12px; font-size: 17px; }

        .container-2{padding: 2px 1px;}
        .container-2 form{margin: 2px 300px; background-image: linear-gradient(green,green); padding: 30px 70px;}
        .container-2 form h1{text-align: center; font-size: 32px; line-height: 60px; color: #fff;}
        .container-2 form table{margin-top:40px;}
        .container-2 form table label{font-size: 18px; line-height: 30px; color: #fff; text-transform: capitalize;}
        .container-2 form table input{padding: 5px 8px; font-family: 18px;}

        .container-3 .child{width: 500px; text-align: center; background: blue; 
           margin: 100px 450px; padding: 10px 20px; box-shadow: 2px 2px 10px #000;}
        .container-3 .child p{font-size: 17px; line-height: 30px; color: #fff;}
        
        .container-2 .btnsubmit{padding: 8px 25px; color: #fff; background: #fff; color: #000; border: none;
    box-shadow: 3px 3px 10px #000; position: relative; left: 40%; top: 20px; border-radius: 8px;}
    </style>
</head>
<body>
    <div class="container-1">
        <label>Account type <select>
            <option>Current Account</option>
            <option>Saving Account</option>
            <option selected>--Select your Account type--</option>
        </select></label>
    </div>
    <div class="container-2">
        <form action="#" method="post" enctype="multipart/form-data">
            <h1></h1>
            <table>
                <tr>
                    <td><label>First Name</label></td>
                    <td><input type="text" name="fname"></td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td><label>Middle Name</label></td>
                    <td><input type="text" name="mdname"></td>
                    <td><input type="file" name="signimg"></td>
                </tr>
                <tr>
                    <td><label>Last Name</label></td>
                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <td><label>Father's Name</label></td>
                    <td><input type="text" name="father_name"></td>
                </tr>
                <tr>
                    <td><label>Mother's Name</label></td>
                    <td><input type="text" name="mother_name"></td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td><input type="text" name="gender"></td>
                </tr>
                <tr>
                    <td><label>Are you Phisically Diasable</label></td>
                    <td><input type="text" name="disability"></td>
                </tr>
                <tr>
                    <td><label>Aaddhar Number</label></td>
                    <td><input type="text" name="uid"></td>
                </tr>
                <tr>
                    <td><label>Do you have Pan</label></td>
                    <td><button>Yes</button> <button>No</button></td>
                    <td><input type="text" name="pan"></td>
                </tr>
                <tr>
                    <td><label>Mobile Number</label></td>
                    <td><input type="number" name="mbno"></td>
                </tr>
                <tr>
                    <td><label>Village</label></td>
                    <td><input type="text" name="village"></td>
                </tr>
                <tr>
                    <td><label>Post Office</label></td>
                    <td><input type="text" name="post"></td>
                </tr>
                <tr>
                    <td><label>Police Station</label></td>
                    <td><input type="text" name="ps"></td>
                </tr>
                <tr>
                    <td><label>District</label></td>
                    <td><input type="text" name="district"></td>
                </tr>
                <tr>
                    <td><label>State</label></td>
                    <td><input type="text" name="state"></td>
                </tr>
                <tr>
                    <td><label>Country</label></td>
                    <td><input type="text" name="country"></td>
                </tr>
            </table>
            <button name="btnsubmit" class="btnsubmit">Submit</button>
        </form>
    </div>
    <div class="container-3">
        <div class="child">
            <?php 
            if(isset($_POST['btnsubmit']))
            {
                $uid=$_POST['uid'];
                $sql3="select *from tblcustomer where Id='$uid'";
                $res=$con->query($sql3);
            if($res->num_rows>0)
            {
                while($row=$res->fetch_assoc())
                {
                  
            ?>
            <p>Account Number: <?php echo $row['Account_no'] ?> </p>
            <p>Password: <?php  echo $row['Password'] ?></p>
            <?php }}}?>

        </div>
    </div>
    <script>
          var contain1=document.querySelector(".container-1");
          var contain2=document.querySelector(".container-2");
          contain2.style.display="none";
          var select=document.querySelector(".container-1 select");
          select.addEventListener("change", (e)=>{
            e.preventDefault();
            let value=e.target.value;
            console.log(value);
            if(value==="Saving Account" || value==="Current Account")
            {
                document.querySelector("form h1").innerHTML=value;
                contain2.style.display="block";
            }
            else{
                contain2.style.display="none";
            }
          })
          document.querySelector(".btnsubmit").addEventListener("click", function(e){
            document.querySelector(".container-3").style.display="block";
          })
    </script>
</body>
</html>
<?php 
$i=12;
if(isset($_POST['btnsubmit']))
{
    $fname=$_POST['fname'];
    $img=$_FILES['image']['name'];
    $sign=$_FILES['signimg']['name'];
    $mdname=$_POST['mdname'];
    $lname=$_POST['lname'];
    $father=$_POST['father_name'];
    $mother=$_POST['mother_name'];
    $gender=$_POST['gender'];
    $disability=$_POST['disability'];
    $uid=$_POST['uid'];
    $pan=$_POST['pan'];
    $mb=$_POST['mbno'];
    $vill=$_POST['village'];
    $post=$_POST['post'];
    $ps=$_POST['ps'];
    $dist=$_POST['district'];
    $state=$_POST['state'];
    $country=$_POST['country'];

    $sql="insert into tblcustomer_info (First_Name,Middle_Name,Last_Name,Father_Name,Mother_Name,Gender,Uid_no,Pan_no
             , Mobile_no,Village,Post_Office,Police_station,District,State,Country,Disability,Image,Sign_img)
             values('$fname','$mdname','$lname','$father','$mother','$gender','$uid','$pan','$mb',
             '$vill','$post','$ps','$dist','$state','$country','$disability','$img','$sign')";
     $con->query($sql);
     
     $a=strrev($uid);
     echo $a;
     $pass=$mb;
     $name=$fname." ".$mdname." ".$lname;
     $sql2="insert into tblcustomer(Name,Id,Account_no,Password) values('$name','$uid','$a','$pass')";
     $con->query($sql2);
}


?>