<?php
session_start();
session_destroy();
header('location: http://localhost/drill1/login.php');
exit();