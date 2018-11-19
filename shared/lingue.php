<?php

  if(isset($_GET['lang'])){
    if($_GET['lang']=="ita"){
      $_SESSION['lingua']="it";
    }
    if($_GET['lang']=="en"){
      $_SESSION['lingua']="en";
    }
    if($_GET['lang']=="cn"){
      $_SESSION['lingua']="cn";
    }
    header("Location: ".$_SERVER['PHP_SELF']);
  }
  //session_start();
  $lingua = $_SESSION['lingua'];
?>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php
      if($lingua=="it"){
        echo("Italiano");
      }
      if($lingua=="en"){
        echo("English");
      }
      if($lingua=="cn"){
        echo("中文(中国)");
      }
     ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="?lang=ita">Italiano</a></li>
    <li><a href="?lang=en">English</a></li>
    <li><a href="?lang=cn">中文(中国)</a></li>
  </ul>
</div>
