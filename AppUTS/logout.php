<?php
session_start();
unset($_SESSION['MEMBER']);
//landing page
header('Location:http://localhost/utsphp/layoutit/AppUTS/index.php?hal=home');