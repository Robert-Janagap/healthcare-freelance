<?php
include 'inc/session.php';
$page = '';
$page_view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';


  switch ($page_view) {

    // case 'home':
    //   $page = 'landing_page.php';
    //   $title = 'Healthcare Provider';
    //   break;

     case 'information':
      $page = 'information.php';
      $title = 'Registration Form';
      break;

      default :
      $page = 'landing_page.php';
      $title = 'Healthcare Provider';
      break;
  }

  include 'theme.php';

?>