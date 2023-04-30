<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
    
    if($userdata['status']==0){
        $status = '<b style="color:red">Not Voted</br>';
    }else{
        $status = '<b style="color:green">Voted</br>';
    }
?>
<html>
    <head><title>
        Voting India - Dashboard
    </title> 
    <!-- <link rel="stylesheet" href="../CSS/dashboard.css"> -->
</head>
    <body>
        <style>
            body{
                background-image: url('../CSS/dash.jpg');
                background-size: 1000px 1000px;
            }
            #backbtn{
                padding: 5px;
                font-size: 15px;
                color: white;
                font-style: normal;
                background: #3498db;
                border-radius: 5px;
                height: 40px;
                width: 70px;
                float:left;
                margin-left:50px;
                margin-top:30px;
                cursor: pointer;
            }
            #logoutbtn{
                padding: 10px;
                font-size: 15px;
                color: white;
                background: #3498db;
                font-style: normal;
                border-radius: 5px;
                height: 40px;
                width: 70px;
                float:right;
                margin-right:50px;
                margin-top:30px;
                cursor: pointer;
            }
            
            #Profile{
                background-image:url('../css/flag.jpg');
                background-size: 550px 390px;
                padding:20px;
                width:500px;
                margin-left:20px;
                margin-top:50px;
                float:left;
            }
            #Group{
                background: grey;
                padding:20px;
                width: 50%;
                margin-left:25px;
                margin-top:50px;
                float:right;
                background-image:url('../css/flag.jpg');
                background-size: cover;
            }
            img{
                border: 2px solid black;
                /* float:left; */
            }
            #headerSection{
                min-width:100%;
                height:100px;
                margin-top: -20px;
                margin-right: 0px;
                margin-left: -10px;
                padding: 10px;
                font-family: Cursive;
                background:#2f3542;
                /* font-weight: bold;
                text-decoration:wavy;
                text-align:center; */
                

            }
            h1{
                margin-top: 30px;
                text-align:center;
                font-weight:bold;
                color:white;
                font-style:italic;
            }
            #votebtn{
                padding: 5px;
                font-size: 15px;
                color: white;
                font-style: normal;
                background: green;
                border-radius: 5px;
                height: 40px;
                width: 70px;
                cursor: pointer;

            }
            #voted{
                padding: 5px;
                font-size: 15px;
                color: white;
                font-style: normal;
                background: red;
                border-radius: 5px;
                height: 40px;
                width: 70px;
    
            }
            #killer{
                color:Blue;
                font-style:italic;
                font-size:20px;
            }
            #miller{
                color:black;
                font-style:italic;
                font-size:20px;
            }
        </style>
        <div id="mainSection">
            <center>
          <div id="headerSection">
        <a href="../"><button id="backbtn">  Back</button></a>
        <a href="logout.php"><button id="logoutbtn">  Logout</button></a>
        <h1>Online Voting System</h1>
        </div>
          </center>
        <div id="Profile">
        <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="150"></center><br><br>
        <div id="miller">
        <b>Name: </b><?php echo $userdata['name']?><br><br>
        <b>Mobile: </b><?php echo $userdata['mobile']?><br><br>
        <b>Address: </b><?php echo $userdata['address']?><br><br>
        <b>Status: </b><?php echo $status?><br><br>
        </div>
        </div>

        <div id="Group">
        <?php
          if($_SESSION['groupsdata']){
            for($i=0;$i<count($groupsdata);$i++){
              ?>
              <div>
                <img style ="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                <div id="killer">
                    <b>Group Name :</b><?php echo $groupsdata[$i]['name']?><br><br>
                   <b>Votes :</b><?php echo $groupsdata[$i]['votes']?><br><br>
                   </div>
                   <form action="../api/vote.php" method="POST">
                    <input type="hidden" name="gvotes" value="<?php  echo $groupsdata[$i]['votes']?>">
                    <input type="hidden" name="gid" value="<?php  echo $groupsdata[$i]['id']?>">
                    <?php 
                    if($_SESSION['userdata']['status']==0){
                        ?>
                        <input type="submit" name="votebtn" value="Vote" id="votebtn">
                        <?php
                    }
                    else{
                        ?>
                        <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                        <?php
                    }
                    ?>
                </form>
              </div>
              <hr>
              <?php  
            }
          }else{

          }
        ?>
        </div>    
    
    </body>
</html> 