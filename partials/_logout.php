<?php
session_start();
echo "you can logout now";
session_destroy();
header("Location:index.php");
?>