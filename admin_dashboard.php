<?php
session_start();
if ($_SESSION['role'] !== 'admin') { header("Location: index.html"); exit; }
echo "<h1>Welcome, Admin!</h1>";
