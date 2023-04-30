<?php
    session_start();
    include("connect.php");

    $mob = $_POST['idno'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    $check = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mob' AND password='$pass' AND role='$role' ");

    if(mysqli_num_rows($check)>0){
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
    
        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;
        //$_SESSION['data'] = $data;
        echo '
            <script>
                window.location = "../routes/dashboard.php";
            </script>
            ';
    }
    else{
        echo '
            <script>
                alert("Invalid credentials!");
                window.location = "../";
            </script>';
    }
    
?>