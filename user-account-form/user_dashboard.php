<?php
session_start();
if ($_SESSION['role'] !== 'user') { header("Location: index.html"); exit; }
echo "<h1>Welcome, User!</h1>";
