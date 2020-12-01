<?php
require '../session/sessionConfig.php';

unset($_SESSION["email"]);
unset($_SESSION["first"]);
unset($_SESSION["last"]);
unset($_SESSION["id"]);
session_destroy();
header("Location:../index.php");

?>