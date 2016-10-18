<?php

    include 'inc/connect.php';

    $error='';
    $sala='';

    $_SESSION['user_type'] = "";

    if(isset($_POST['submit'])){

        $email=$_POST['username'];
        $pass=$_POST['pass'];
    
        if ($email==''||$pass=='') {
            $sala = "<span style='color:red;'>Form must have a value.</span>";
        }else{

            $sql_query = mysql_query("SELECT * FROM personal_user WHERE username='$email' AND pass='$pass' ");

            $s = mysql_num_rows($sql_query);
            $row  = mysql_fetch_array($sql_query);

            if ($s==0) {
                $error = "<span style='color:red;'>Username or Password is not Registered</span>";
            }else{
                session_start();
                $_SESSION['userID'] = $row['cu_id'];
                header('Location: index.php');
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- search -->
    <script src="js/jquery-fastLiveFilter-master/jquery.fastLiveFilter.js"></script>
        <script>
            $(function() {
                $('#search_input').fastLiveFilter('#search_list');
            });
        </script>
</head>
<body>
    <header>
        <div class="container flex">
            <div class="logo">
                <a href="http://localhost/healthcarefreelance/">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <nav>
            <?php
            if ($_SESSION['userID'] = $row['cu_id']) {
            echo'
                <ul class="flex">
                    <li><a href="index.php">Healthcare Provider</a></li>
                    <li><a class="open-modal2">Sign-up</a></li>
                    <li><a class="open-modal">Sign-in</a></li>
                </ul>';
            }else{
                echo'
                <ul class="flex">
                    <li><a href="">Healthcare Provider</a></li>
                    <li><a href="logout.php">Jam</a></li>
                </ul>';
            }
            ?>
            </nav>
        </div>
    </header>

    <div class="overlay"></div>
    <div class="modal">
        <div class="close_btn">X</div>
        <img src="img/logo.png" alt="">
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" class="sign-input">
            <input type="password" name="pass" placeholder="password" class="sign-input">
            <button type="submit" name="submit" class="btn btn_primary">Login</button>
        </form>
        <div class="signup_msg">
            <p>Doesn't have account? <a class="open-modal2">sign-up</a></p>
        </div>
    </div>

    <div class="modal2">
        <div class="close_btn">X</div>
        <img src="img/logo.png" alt="">
        <form action="inc/process.php?action=register" method="POST">
            <div class="sign-up_input">
                <label for="">First name</label>
                <input class="sign-input" type="text" name="fname" required>
            </div>
            <div class="sign-up_input">
                <label for="">Last name</label>
                <input class="sign-input" type="text" name="lname" required>
            </div>
            <div class="sign-up_input">
                <label for="">Username</label>
                <input class="sign-input" type="text" name="username" required>
            </div>
            <div class="sign-up_input">
                <label for="">Password</label>
                <input class="sign-input" type="password" name="pass" required>
            </div>
            <div class="sign-up_input">
                <span class="" style="display: none;">Not matched</span>
                <label for="">Confirm password</label>
                <input class="sign-input" type="password" name="con_pass">
            </div>
            <button type="submit" name="submit" class="btn full btn_primary">Register now</button>
        </form>
        <div class="signup_msg">
            <p>Already have account? <a class="open-modal">sign-in</a></p>
        </div>
    </div>