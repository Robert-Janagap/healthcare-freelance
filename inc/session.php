<?php

	// Establishing Connection with Server by passing server_name, user_id and password as a parameter

	$con = mysql_connect('localhost','root','');
	mysql_select_db('healthcare',$con);
	//include('log_process.php');
	session_start();
	// Storing Session
	$login_user=$_SESSION['userID'];
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=mysql_query("SELECT * FROM personal_user WHERE pu_id='$login_user' ");

	$row = mysql_fetch_assoc($ses_sql);
	$user_id = $row['pu_id'];
	$fname =$row['fname'];
	$lname =$row['lname'];
	$username =$row['username'];
	$header = 'header2.php';
	$register = '';
//session_destroy();
	if(!$login_user){
		$header = 'header.php';
		//mysql_close($con); // Closing Connection
	}
	elseif (!isset($user_id)) {
		mysql_close($con); // Closing Connection
		header('Location: index.php?page=information'); // Redirecting To Home 
	}

?>