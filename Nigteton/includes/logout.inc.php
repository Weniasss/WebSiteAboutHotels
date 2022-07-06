<?php

session_start();
session_unset();
session_destroy();

header("location: ../Hotteler.php?id=3&id2=1");
exit();
