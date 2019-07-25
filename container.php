<?php

  switch($do){
    case "buttons":
        include "buttons.php";
        break;

    case "cards":
        include "cards.php";
        break;

    case "utilities-color":
        include "utilities-color.php";
        break;

    case "utilities-border":
        include "utilities-border.php";
        break;

    case "utilities-animation":
        include "utilities-animation.php";
        break;

    case "utilities-other":
        include "utilities-other.php";
        break;

    case "login":
        include "login.php";
        break;

    case "register":
        include "register.php";
        break;

    case "forgot-password":
        include "forgot-password.php";
        break;

    case "blank":
        include "blank.php";
        break;

    case "404":
        include "404.php";
        break;

    case "charts":
        include "charts.php";
        break;

    case "tables":
        include "tables.php";
        break;
    
    case "member":
        include "member.php";
        break;
        
    case "admin":
        include "admin.php";
        break;

    default:
        
        break;
  }
    if(!empty($_GET['repo'])){
      switch($_GET['repo']){
          case "items":
          include "item_sales.php";
          break;
          case "sales":
          include "dept_sales.php";
          break;
          case "season":
          include "season_sales.php";
          break;
      }
  }
   if(empty($_GET['do']) && empty($_GET['repo'])){
    include "maincontent.php";}
  

?>