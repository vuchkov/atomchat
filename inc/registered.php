<?php
//** load config
include ('./config.php');

//** deny direct access
if (($_SERVER['HTTP_REFERER'] == '') || 
    ($_SERVER['HTTP_HOST'] != $ac_dom)) {
  header('Location: ../');
  exit;
}

//** registered users are auto-added below
?>
