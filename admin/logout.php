<?php
session_start();

session_destroy();

echo "<script>window.open('index.php')</script>";
