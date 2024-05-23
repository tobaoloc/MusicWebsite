<?php
include "function.php";
session_destroy();
header("Location: " . getUrl());