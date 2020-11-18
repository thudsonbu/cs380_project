<?php
require '../session/sessionConfig.php';

unset($_SESSION["email"]);
unset($_SESSION["first"]);
unset($_SESSION["last"]);
unset($_SESSION["id"]);

header("Location:index.php");
?>