<?php
session_start();
session_unset();  // remove all session variables
session_destroy(); // destroy the session
header("Location: Landing Page (Hanz-On)User.php"); // go back to home page
exit();
