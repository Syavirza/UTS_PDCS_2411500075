<?php 
session_start(); 

$_SESSION = []; // kosongkan semua session
session_destroy(); // hancurkan session

header("location: login.php"); // arahkan ke login.php
