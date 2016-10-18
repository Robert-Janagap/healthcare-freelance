<?php
	include'connect.php';
	// include 'session.php';
	$action = '';
  	$new_action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

  	switch ($new_action) {

  		case 'register':
  			register();
  			break;

      case 'information':
        information();
        break;
  	}

   function register(){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $date = date("d");
    $month = date("m");
    $year = date("y");

    $a_random = mt_rand(1,999);
    $b_random = mt_rand(1,999);

    $combo = $a_random*$b_random;

    $trim_combo = substr($combo, 0,5);

    $user_id = $date.''.$month.''.$year.'-'.$trim_combo;
    
    $signin = mysql_query("INSERT INTO personal_user SET fname='$fname', lname='$lname', username='$username', pass='$pass', user_id='$user_id' ")or die(mysql_error());

      if ($signin) {
        header('location:../index.php?page=information&id='.$user_id.' ');
      } else {
        echo mysql_error();
      }
   }

   function information(){

    if(isset($_POST['submit']))
        {
     if(!file_exists("upload"))
    {
      mkdir("upload");
    }
            
        $image_name = $_FILES['file']['name'];

        if (empty($image_name)) {
          $image_path = $_POST['org_img'];
        } else {
          $image_path = 'inc/upload/'.$image_name;
          move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_FILES["file"]["name"]);
        }

    $user_id = $_POST['user_id'];
    $job = $_POST['job'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $num = $_POST['num'];
    $summary = $_POST['summary'];
    $work = $_POST['work'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $school = $_POST['school'];
    $course = $_POST['course'];
    $license = $_POST['license'];

    $information = mysql_query("INSERT INTO personal_info SET title='$job', address='$address', city='$city', con_num='$num', image='$image_path', puser_id='$user_id' ")or die(mysql_error());

    $description = mysql_query("INSERT INTO word_description SET des='$summary', wdp_id='$user_id' ")or die(mysql_error());

    $history = mysql_query("INSERT INTO work_history SET history='$work', start='$start', endy='$end', whp_id='$user_id' ")or die(mysql_error());

    $background = mysql_query("INSERT INTO school_bg SET school='$school', course='$course', prc_num='$license', sp_id='$user_id' ")or die(mysql_error());

      if ($information||$description||$history||$background) {
        header('location:../index.php?page=information&id='.$user_id.' ');
      } else {
        echo mysql_error();
      }
    }
   }
?>