<?php
//** init session
session_start();

//** load config
include ('./inc/config.php');

//** check session
if (!isset ($_SESSION['ac_time']) || !isset ($_SESSION['ac_user'])) {
  header("Location: $ac_dir");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <title>Atom Chat</title>
    <meta charset="UTF-8" />
    <meta name="language" content="en-GB" />
    <meta name="description" content="Atom Chat free PHP chat script" />
    <meta name="keywords" content="Atom Chat, free PHP chat scripts" />
    <meta name="robots" content="noodp, noydir" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo $ac_www . $ac_dir; ?>favicon.png" type="image/png" />
    <link rel="stylesheet" href="<?php echo $ac_www . $ac_inc; ?>style.css" type="text/css" />
  </head>
  <body>
<?php include ($ac_hdr); ?>
    <object data="<?php echo $ac_www . $ac_chp; ?>" type="text/html">Failed to render object data!</object>
    <div id="ac_menu">
      <form action="<?php echo $ac_www . $ac_chf; ?>" method="POST" id="ac_chat">
        <div id="ac_char">Text <span id="ac_count"></span></div>
        <div>
          <textarea rows="4" cols="40" name="ac_text" maxlength="256" title="Type here to enter your message" onkeyup="ac_count('ac_text');"></textarea>
        </div>
        <div>
          <input type="hidden" name="ac_user" value="<?php echo $_SESSION['ac_user']; ?>" />
          <input type="submit" name="ac_quit" value="Quit" title="Click here to quit the current session" />
          <input type="submit" name="ac_save" value="Save" title="Click here to download and save the current session" />
          <input type="submit" name="ac_push" value="Push" title="Click here to manually update the current session" />
          <input type="submit" name="ac_post" value="Post" title="Click here to post your message" />
        </div>
      </form>
<?php include ($ac_ftr); ?>
    </div>
    <script type="text/javascript">
    //** character counter
    var ac_cmax = 256;
    var ac_cdiv = "ac_count";

    //** init counter
    document.getElementById(ac_cdiv).innerHTML = "(" + ac_cmax + ")";

    //** count characters
    function ac_count(ac_token, ac_counter) {
      var ac_count, ac_counter, ac_form = "";

      if (ac_token == "ac_text") {
        ac_count   = ac_cmax;
        ac_counter = ac_cdiv;
        ac_form    = document.forms.ac_chat.ac_text.value;
      } else {
        alert("Invalid counter!");
      }

      var ac_ucount  = ac_form;
      var ac_ulength = ac_ucount.length;

      //** check maximimum characters
      if (ac_ulength > ac_count) {
        ac_ucount = ac_ucount.substring(0, ac_count);
        ac_form   = ac_ucount;
        return false;
      }

      //** update counter
      document.getElementById(ac_counter).innerHTML = "(" + (ac_count - ac_ulength) + ")";
    }
    </script>
  </body>
</html>
