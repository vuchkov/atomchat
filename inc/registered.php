<?php
//** deny direct access
$ac_dat = 'n';

if ($ac_dat == 'n') {
  header('Location: ../');
  exit;
}
//** registered users are auto-added below
?>
