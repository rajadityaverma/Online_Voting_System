<?php
 include("connect.php");
 $name = $_POST['name'];
 $mob = $_POST['mob'];
 $pass = $_POST['pass'];
 $cpass = $_POST['cpass'];
 $add = $_POST['add'];
 $image = $_FILES['image']['name'] ;
 $tmp_name = $_FILES['image']['tmp_name'];
 $role = $_POST['role'];

 if($pass!=$cpass){
    echo'
    <script>
        alert("Password do not match!");
        window.location ="../routes/register.html";
    </script>    
    ';
}
 else{
    move_uploaded_file($tmp_name,"../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user(name,mobile,address,password,photo,role,status,votes
    ) VALUES('$name','$mob','$add','$pass','$image','$role',0,0)");
    if($insert){
        echo'
        <script>
            alert("Registration successfull!");
            window.location ="../";
        </script>    
        ';
    }
    else{
        echo'
        <script>
            alert("Some Error Occured!");
            window.location ="../routes/register.html";
        </script>    
        ';
    } 
    
 }
 ?>