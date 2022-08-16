<?php
session_start();
include "sessions-file.php";
if(isset($_SESSION[$authToken]))
{

    unset($_SESSION[$authToken]);

echo "<script>location.href='index.php'</script>";
}

?>