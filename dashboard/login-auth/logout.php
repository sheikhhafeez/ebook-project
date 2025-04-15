<?php
session_start();
session_destroy();
header("Location:../website/view.php");
?>
