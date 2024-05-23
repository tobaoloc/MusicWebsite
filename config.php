<?php
session_start();
const URL = "http://webdev.local/";
const DBServerName = "localhost"; // or your server IP address
const DBUsername = "root"; // your MySQL username
const DBPassword = ""; // your MySQL password
const DBName = "webdev"; // your MySQL database name
ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);